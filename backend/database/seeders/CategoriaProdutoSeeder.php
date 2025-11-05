<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Produto;

class CategoriaProdutoSeeder extends Seeder
{
    /**
     * Executa o seeder do banco de dados.
     */
    public function run(): void
    {
        // Categorias
        $categorias = [
            'Smartphones',
            'Fones de Ouvido',
            'Tablets',
            'Relógios',
            'Notebooks',
        ];

        $idsCategorias = [];
        foreach ($categorias as $cat) {
            $categoria = Categoria::create(['nome' => $cat]);
            $idsCategorias[$cat] = $categoria->id;
        }

        // Produtos (exemplo para Smartphones Apple, adicione os outros seguindo o padrão)
        $produtos = [
            // Smartphones Apple
            ['nome' => 'iPhone 17 Pro', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            ['nome' => 'iPhone 15 Pro Max', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            ['nome' => 'iPhone 15 Pro', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            ['nome' => 'iPhone 15 Plus', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            ['nome' => 'iPhone 15', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            ['nome' => 'iPhone 14 Pro Max', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            ['nome' => 'iPhone 14 Pro', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            ['nome' => 'iPhone 14 Plus', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            ['nome' => 'iPhone 14', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            ['nome' => 'iPhone 13', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            ['nome' => 'iPhone SE (3ª geração)', 'marca' => 'Apple', 'categoria' => 'Smartphones'],
            // Smartphones Samsung
            ['nome' => 'Galaxy S24 Ultra', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy S24+', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy S24', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy S23 Ultra', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy S23+', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy S23', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy S23 FE', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy Z Fold 5', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy Z Flip 5', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy A55', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy A35', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            ['nome' => 'Galaxy A15', 'marca' => 'Samsung', 'categoria' => 'Smartphones'],
            // Fones de Ouvido Apple
            ['nome' => 'AirPods Pro (2ª geração)', 'marca' => 'Apple', 'categoria' => 'Fones de Ouvido'],
            ['nome' => 'AirPods (3ª geração)', 'marca' => 'Apple', 'categoria' => 'Fones de Ouvido'],
            ['nome' => 'AirPods (2ª geração)', 'marca' => 'Apple', 'categoria' => 'Fones de Ouvido'],
            ['nome' => 'AirPods Max', 'marca' => 'Apple', 'categoria' => 'Fones de Ouvido'],
            ['nome' => 'EarPods com conector Lightning', 'marca' => 'Apple', 'categoria' => 'Fones de Ouvido'],
            // Fones de Ouvido Samsung
            ['nome' => 'Galaxy Buds2 Pro', 'marca' => 'Samsung', 'categoria' => 'Fones de Ouvido'],
            ['nome' => 'Galaxy Buds2', 'marca' => 'Samsung', 'categoria' => 'Fones de Ouvido'],
            ['nome' => 'Galaxy Buds FE', 'marca' => 'Samsung', 'categoria' => 'Fones de Ouvido'],
            ['nome' => 'Galaxy Buds Live', 'marca' => 'Samsung', 'categoria' => 'Fones de Ouvido'],
            // Tablets Apple
            ['nome' => 'iPad Pro 13" (M4, 2024)', 'marca' => 'Apple', 'categoria' => 'Tablets'],
            ['nome' => 'iPad Pro 11" (M4, 2024)', 'marca' => 'Apple', 'categoria' => 'Tablets'],
            ['nome' => 'iPad Air 13" (M2, 2024)', 'marca' => 'Apple', 'categoria' => 'Tablets'],
            ['nome' => 'iPad Air 11" (M2, 2024)', 'marca' => 'Apple', 'categoria' => 'Tablets'],
            ['nome' => 'iPad 10ª geração', 'marca' => 'Apple', 'categoria' => 'Tablets'],
            ['nome' => 'iPad mini 6ª geração', 'marca' => 'Apple', 'categoria' => 'Tablets'],
            // Tablets Samsung
            ['nome' => 'Galaxy Tab S9 Ultra', 'marca' => 'Samsung', 'categoria' => 'Tablets'],
            ['nome' => 'Galaxy Tab S9+', 'marca' => 'Samsung', 'categoria' => 'Tablets'],
            ['nome' => 'Galaxy Tab S9', 'marca' => 'Samsung', 'categoria' => 'Tablets'],
            ['nome' => 'Galaxy Tab S9 FE+', 'marca' => 'Samsung', 'categoria' => 'Tablets'],
            ['nome' => 'Galaxy Tab S9 FE', 'marca' => 'Samsung', 'categoria' => 'Tablets'],
            ['nome' => 'Galaxy Tab A9+', 'marca' => 'Samsung', 'categoria' => 'Tablets'],
            ['nome' => 'Galaxy Tab A9', 'marca' => 'Samsung', 'categoria' => 'Tablets'],
            ['nome' => 'Samsung Galaxy Tab S6', 'marca' => 'Samsung', 'categoria' => 'Tablets'], // Corrigido para bater com o nome do Blade
            // Relógios Apple
            ['nome' => 'Apple Watch Series 9 (41mm, 45mm)', 'marca' => 'Apple', 'categoria' => 'Relógios'],
            ['nome' => 'Apple Watch SE (2022)', 'marca' => 'Apple', 'categoria' => 'Relógios'],
            ['nome' => 'Apple Watch Ultra 2', 'marca' => 'Apple', 'categoria' => 'Relógios'],
            ['nome' => 'Apple Watch Series 8', 'marca' => 'Apple', 'categoria' => 'Relógios'], // Adicionado
            // Relógios Samsung
            ['nome' => 'Galaxy Watch 6 Classic', 'marca' => 'Samsung', 'categoria' => 'Relógios'],
            ['nome' => 'Galaxy Watch 6', 'marca' => 'Samsung', 'categoria' => 'Relógios'],
            ['nome' => 'Galaxy Watch 5 Pro', 'marca' => 'Samsung', 'categoria' => 'Relógios'],
            ['nome' => 'Galaxy Watch 5', 'marca' => 'Samsung', 'categoria' => 'Relógios'],
            // Notebooks Apple
            ['nome' => 'MacBook Air 15" (M3, 2024)', 'marca' => 'Apple', 'categoria' => 'Notebooks'],
            ['nome' => 'MacBook Air 13" (M3, 2024)', 'marca' => 'Apple', 'categoria' => 'Notebooks'],
            ['nome' => 'MacBook Pro 14" (M3, 2023)', 'marca' => 'Apple', 'categoria' => 'Notebooks'],
            ['nome' => 'MacBook Pro 16" (M3, 2023)', 'marca' => 'Apple', 'categoria' => 'Notebooks'],
            // Notebooks Samsung
            ['nome' => 'Galaxy Book4 Ultra', 'marca' => 'Samsung', 'categoria' => 'Notebooks'],
            ['nome' => 'Galaxy Book4 Pro 360', 'marca' => 'Samsung', 'categoria' => 'Notebooks'],
            ['nome' => 'Galaxy Book4 Pro', 'marca' => 'Samsung', 'categoria' => 'Notebooks'],
            ['nome' => 'Galaxy Book4 360', 'marca' => 'Samsung', 'categoria' => 'Notebooks'],
            ['nome' => 'Galaxy Book4', 'marca' => 'Samsung', 'categoria' => 'Notebooks'],
        ];

        foreach ($produtos as $produto) {
            // Gerar dados realistas baseados na categoria e marca
            $preco = $this->gerarPrecoRealista($produto['marca'], $produto['categoria']);
            $estoque = rand(5, 50);
            $cores = $this->gerarCores($produto['marca']);
            
            Produto::create([
                'nome' => $produto['nome'],
                'marca' => $produto['marca'],
                'categoria_id' => $idsCategorias[$produto['categoria']],
                'descricao' => $produto['descricao'] ?? 'Descrição do produto ' . $produto['nome'],
                'imagem' => $produto['imagem'] ?? 'default.png',
                'preco' => $produto['preco'] ?? $preco,
                'modelo' => $produto['modelo'] ?? 'Modelo ' . $produto['nome'],
                'estoque' => $estoque,
                'ativo' => true,
                'especificacoes' => $this->gerarEspecificacoes($produto['categoria']),
                'peso' => $this->gerarPeso($produto['categoria']),
                'cor' => $cores[array_rand($cores)],
                'garantia_meses' => $produto['marca'] === 'Apple' ? 12 : 24,
            ]);
        }
    }

    private function gerarPrecoRealista($marca, $categoria)
    {
        $precos = [
            'Apple' => [
                'Smartphones' => [3500, 8000],
                'Fones de Ouvido' => [800, 5000],
                'Tablets' => [2500, 12000],
                'Relógios' => [2500, 8000],
                'Notebooks' => [8000, 25000]
            ],
            'Samsung' => [
                'Smartphones' => [1500, 6000],
                'Fones de Ouvido' => [300, 1200],
                'Tablets' => [1200, 8000],
                'Relógios' => [800, 3000],
                'Notebooks' => [3000, 15000]
            ]
        ];
        
        $range = $precos[$marca][$categoria] ?? [500, 3000];
        return rand($range[0], $range[1]);
    }

    private function gerarCores($marca)
    {
        if ($marca === 'Apple') {
            return ['Preto Espacial', 'Branco', 'Azul', 'Rosa', 'Roxo'];
        }
        return ['Preto', 'Branco', 'Azul', 'Verde', 'Rosa', 'Cinza'];
    }

    private function gerarEspecificacoes($categoria)
    {
        $specs = [
            'Smartphones' => 'Tela Super Retina, Câmera Profissional, 5G, Face ID, Resistente à água',
            'Fones de Ouvido' => 'Cancelamento ativo de ruído, Áudio espacial, Bateria de longa duração',
            'Tablets' => 'Tela Liquid Retina, Processador avançado, Apple Pencil compatível',
            'Relógios' => 'GPS, Monitor cardíaco, À prova d\'água, Bateria de 18h',
            'Notebooks' => 'Processador de alta performance, Tela Retina, Bateria de longa duração'
        ];
        
        return $specs[$categoria] ?? 'Especificações técnicas avançadas';
    }

    private function gerarPeso($categoria)
    {
        $pesos = [
            'Smartphones' => [0.150, 0.250],
            'Fones de Ouvido' => [0.050, 0.600],
            'Tablets' => [0.400, 0.800],
            'Relógios' => [0.030, 0.080],
            'Notebooks' => [1.200, 2.500]
        ];
        
        $range = $pesos[$categoria] ?? [0.100, 1.000];
        return round(rand($range[0] * 1000, $range[1] * 1000) / 1000, 3);
    }
}
