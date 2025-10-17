<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        $stats = [
            'total_pedidos' => Pedido::count(),
            'pedidos_hoje' => Pedido::whereDate('created_at', today())->count(),
            'receita_total' => Pedido::sum('valor_total'),
            'receita_mensal' => Pedido::where('created_at', '>=', now()->startOfMonth())->sum('valor_total'),
            'total_usuarios' => User::count(),
            'usuarios_ativos' => User::whereDate('updated_at', '>=', now()->subDays(30))->count(),
            'total_produtos' => Produto::count(),
            'produtos_ativos' => Produto::where('disponivel', true)->count(),
        ];

        $pedidos_recentes = Pedido::with('user')
            ->latest()
            ->take(10)
            ->get();

        // Correção para SQLite - usar strftime ao invés de MONTH()
        $vendas_por_mes = Pedido::select(
                DB::raw('CAST(strftime("%m", created_at) AS INTEGER) as mes'),
                DB::raw('SUM(valor_total) as total')
            )
            ->where('created_at', '>=', now()->startOfYear())
            ->groupBy(DB::raw('strftime("%m", created_at)'))
            ->orderBy('mes')
            ->get();

        return view('admin.dashboard', compact('stats', 'pedidos_recentes', 'vendas_por_mes'));
    }

    public function pedidos()
    {
        $pedidos = Pedido::with('user')
            ->latest()
            ->paginate(20);

        return view('admin.pedidos', compact('pedidos'));
    }

    public function usuarios()
    {
        $usuarios = User::withCount('pedidos')
            ->latest()
            ->paginate(20);

        return view('admin.usuarios', compact('usuarios'));
    }

    public function produtos()
    {
        $produtos = Produto::with('categoria')
            ->latest()
            ->paginate(20);

        return view('admin.produtos', compact('produtos'));
    }

    public function updatePedidoStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:processando,enviado,entregue,cancelado'
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status atualizado com sucesso!'
        ]);
    }

    public function logs()
    {
        $logFile = storage_path('logs/laravel.log');
        $logs = [];

        if (file_exists($logFile)) {
            $content = file_get_contents($logFile);
            $lines = array_reverse(explode("\n", $content));
            $logs = array_slice($lines, 0, 100); // Últimas 100 linhas
        }

        return view('admin.logs', compact('logs'));
    }
}