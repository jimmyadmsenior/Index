<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Produto;

class CategoriaProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

        $categoriasIds = [];
        foreach ($categorias as $cat) {
            $categoria = Categoria::create(['nome' => $cat]);
            $categoriasIds[$cat] = $categoria->id;
        }

        // Produtos (exemplo para Smartphones Apple, adicione os outros seguindo o padrão)
        $produtos = [
            // Smartphones Apple
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
            // Relógios Apple
            ['nome' => 'Apple Watch Series 9 (41mm, 45mm)', 'marca' => 'Apple', 'categoria' => 'Relógios'],
            ['nome' => 'Apple Watch SE (2022)', 'marca' => 'Apple', 'categoria' => 'Relógios'],
            ['nome' => 'Apple Watch Ultra 2', 'marca' => 'Apple', 'categoria' => 'Relógios'],
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
            Produto::create([
                'nome' => $produto['nome'],
                'marca' => $produto['marca'],
                'categoria_id' => $categoriasIds[$produto['categoria']],
            ]);
        }
    }
}
