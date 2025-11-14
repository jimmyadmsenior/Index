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

        // Usando sintaxe MySQL para extrair mês
        $vendas_por_mes = Pedido::select(
                DB::raw('MONTH(created_at) as mes'),
                DB::raw('SUM(valor_total) as total')
            )
            ->where('created_at', '>=', now()->startOfYear())
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('mes')
            ->get();

        return view('admin.dashboard', compact('stats', 'pedidos_recentes', 'vendas_por_mes'));
    }

    public function pedidos(Request $request)
    {
        $query = Pedido::with('user');

        // Filtro por status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filtro por método de pagamento
        if ($request->filled('pagamento')) {
            $query->where('metodo_pagamento', $request->pagamento);
        }

        // Filtro por data inicial
        if ($request->filled('data_inicio')) {
            $query->whereDate('created_at', '>=', $request->data_inicio);
        }

        // Filtro por data final
        if ($request->filled('data_fim')) {
            $query->whereDate('created_at', '<=', $request->data_fim);
        }

        $pedidos = $query->latest()->paginate(20);

        $stats = [
            'total_pedidos' => \App\Models\Pedido::count(),
            'pedidos_filtrados' => $query->count(),
        ];

        return view('admin.pedidos', compact('pedidos', 'stats'));
    }

    public function usuarios()
    {
        $usuarios = User::withCount('pedidos')
            ->latest()
            ->paginate(20);

        $estatisticas = [
            'total' => User::count(),
            'ativos' => User::whereDate('updated_at', '>=', now()->subDays(30))->count(),
            'novos_mes' => User::whereMonth('created_at', now()->month)->count(),
            'com_pedidos' => User::has('pedidos')->count(),
        ];

        return view('admin.usuarios', compact('usuarios', 'estatisticas'));
    }

    public function produtos()
    {
        $produtos = Produto::with('categoria')
            ->latest()
            ->paginate(20);

        $categorias = Categoria::all();

        $estatisticas = [
            'total' => Produto::count(),
            'ativos' => Produto::where('disponivel', true)->count(),
            'estoque_baixo' => Produto::where('estoque', '<', 10)->count(),
            'sem_estoque' => Produto::where('estoque', 0)->count(),
        ];

        return view('admin.produtos', compact('produtos', 'categorias', 'estatisticas'));
    }

    public function atualizarStatusPedido(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:processando,enviado,entregue,cancelado'
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update(['status' => $request->status]);

        return back()->with('success', 'Status atualizado com sucesso!');
    }

    public function logs()
    {
        $logDirectory = storage_path('logs');
        $arquivos_log = [];
        
        if (is_dir($logDirectory)) {
            $arquivos_log = glob($logDirectory . '/*.log');
        }
        
        $logFile = storage_path('logs/laravel.log');
        $logs = [];

        if (file_exists($logFile)) {
            $content = file_get_contents($logFile);
            $lines = array_reverse(explode("\n", $content));
            $logs = array_slice($lines, 0, 100); // Últimas 100 linhas
        }

        return view('admin.logs', compact('logs', 'arquivos_log'));
    }

    /**
     * Exclui um usuário do sistema.
     */
    public function excluirUsuario($id)
    {
        try {
            $usuario = User::findOrFail($id);
            
            // Verifica se o usuário tem pedidos
            if ($usuario->pedidos()->count() > 0) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Não é possível excluir usuário com pedidos associados.'
                ], 400);
            }
            
            $usuario->delete();
            
            return response()->json([
                'success' => true, 
                'message' => 'Usuário excluído com sucesso!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'message' => 'Erro ao excluir usuário: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Limpa o arquivo de log principal do sistema.
     */
    public function limparLogs(Request $request)
    {
        $logFile = storage_path('logs/laravel.log');
        if (file_exists($logFile)) {
            file_put_contents($logFile, '');
        }
        return response()->json(['success' => true, 'message' => 'Logs limpos com sucesso!']);
    }
}