<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LogController extends Controller
{
    public function exportCsv()
    {
        $logPath = storage_path('logs/laravel.log');
        if (!file_exists($logPath)) {
            return Response::make('Arquivo de log não encontrado.', 404);
        }
        $lines = file($logPath);
        $csvHeader = ['Linha', 'Conteúdo'];
        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, $csvHeader);
        foreach ($lines as $i => $line) {
            fputcsv($handle, [$i + 1, trim($line)]);
        }
        rewind($handle);
        $csvContent = stream_get_contents($handle);
        fclose($handle);
        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="relatorio_logs.csv"',
        ]);
    }
}
