<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class SeedProdutos extends Command
{
    protected $signature = 'produtos:seed';
    protected $description = 'Adiciona produtos essenciais ao banco de dados';

    public function handle()
    {
        $this->info('Iniciando a inserção de TODOS os produtos do catálogo...');

        // Criar categoria se não existir
        $categorias = [
            'Smartphones' => 'Smartphones e dispositivos móveis',
            'Fones de Ouvido' => 'Fones e dispositivos de áudio',
            'Tablets' => 'Tablets e dispositivos portáteis',
            'Relógios' => 'Relógios inteligentes e wearables',
            'Notebooks' => 'Notebooks e laptops'
        ];

        $idsCategorias = [];
        foreach ($categorias as $nome => $descricao) {
            $categoria = Categoria::firstOrCreate(
                ['nome' => $nome],
                ['descricao' => $descricao]
            );
            $idsCategorias[$nome] = $categoria->id;
        }

        // TODOS OS PRODUTOS DO CATÁLOGO (baseado no insert_produtos.sql)
        $produtosCatalogo = [
            // SMARTPHONES APPLE
            ['id' => 1, 'nome' => 'iPhone 17 Pro', 'modelo' => 'iPhone 17 Pro', 'marca' => 'Apple', 'preco' => 12999.00, 'descricao' => 'O smartphone mais avançado da Apple, com titânio aeroespacial, chip A19 Pro, câmera profissional e design inovador.', 'imagem' => '/media/iPhone 17 Pro.png', 'categoria' => 'Smartphones'],
            ['id' => 2, 'nome' => 'iPhone 15 Pro Max', 'modelo' => 'iPhone 15 Pro Max', 'marca' => 'Apple', 'preco' => 7899.00, 'descricao' => 'iPhone 15 Pro Max com chip A17 Pro, sistema de câmera profissional e design em titânio premium.', 'imagem' => '/media/iphone15promax.png', 'categoria' => 'Smartphones'],
            ['id' => 3, 'nome' => 'iPhone 15 Pro', 'modelo' => 'iPhone 15 Pro', 'marca' => 'Apple', 'preco' => 6899.00, 'descricao' => 'iPhone 15 Pro com chip A17 Pro e câmera profissional de 48MP.', 'imagem' => '/media/iphone15pro.png', 'categoria' => 'Smartphones'],
            ['id' => 4, 'nome' => 'iPhone 15 Plus', 'modelo' => 'iPhone 15 Plus', 'marca' => 'Apple', 'preco' => 5899.00, 'descricao' => 'iPhone 15 Plus com tela de 6,7 polegadas e câmera principal de 48MP.', 'imagem' => '/media/iphone15plus.png', 'categoria' => 'Smartphones'],
            ['id' => 5, 'nome' => 'iPhone 15', 'modelo' => 'iPhone 15', 'marca' => 'Apple', 'preco' => 4899.00, 'descricao' => 'iPhone 15 com chip A16 Bionic e nova câmera principal de 48MP.', 'imagem' => '/media/iphone15.png', 'categoria' => 'Smartphones'],
            ['id' => 6, 'nome' => 'iPhone 14 Pro Max', 'modelo' => 'iPhone 14 Pro Max', 'marca' => 'Apple', 'preco' => 6499.00, 'descricao' => 'iPhone 14 Pro Max com chip A16 Bionic e Dynamic Island.', 'imagem' => '/media/iphone14promax.png', 'categoria' => 'Smartphones'],
            ['id' => 7, 'nome' => 'iPhone 14 Pro', 'modelo' => 'iPhone 14 Pro', 'marca' => 'Apple', 'preco' => 5999.00, 'descricao' => 'Tecnologia de ponta com câmera profissional.', 'imagem' => '/media/iPhone 14 Pro.png', 'categoria' => 'Smartphones'],
            ['id' => 8, 'nome' => 'iPhone 14 Plus', 'modelo' => 'iPhone 14 Plus', 'marca' => 'Apple', 'preco' => 4999.00, 'descricao' => 'iPhone 14 Plus com tela grande e bateria de longa duração.', 'imagem' => '/media/iphone14plus.png', 'categoria' => 'Smartphones'],
            ['id' => 9, 'nome' => 'iPhone 14', 'modelo' => 'iPhone 14', 'marca' => 'Apple', 'preco' => 4499.00, 'descricao' => 'A tecnologia se redefine a cada escolha.', 'imagem' => '/media/Iphone_14_Capa_Homepage.png', 'categoria' => 'Smartphones'],
            ['id' => 10, 'nome' => 'iPhone 13', 'modelo' => 'iPhone 13', 'marca' => 'Apple', 'preco' => 3899.00, 'descricao' => 'iPhone 13 com chip A15 Bionic e sistema de câmera dupla avançado.', 'imagem' => '/media/iphone13.png', 'categoria' => 'Smartphones'],
            ['id' => 11, 'nome' => 'iPhone SE (3ª geração)', 'modelo' => 'iPhone SE 3ª gen', 'marca' => 'Apple', 'preco' => 2899.00, 'descricao' => 'iPhone SE com chip A15 Bionic no design clássico.', 'imagem' => '/media/iphonese3.png', 'categoria' => 'Smartphones'],

            // SMARTPHONES SAMSUNG
            ['id' => 12, 'nome' => 'Galaxy S24 Ultra', 'modelo' => 'Galaxy S24 Ultra', 'marca' => 'Samsung', 'preco' => 6999.00, 'descricao' => 'Galaxy S24 Ultra com S Pen integrada e câmeras profissionais.', 'imagem' => '/media/galaxys24ultra.png', 'categoria' => 'Smartphones'],
            ['id' => 13, 'nome' => 'Galaxy S24+', 'modelo' => 'Galaxy S24+', 'marca' => 'Samsung', 'preco' => 5499.00, 'descricao' => 'Galaxy S24+ com tela grande e performance premium.', 'imagem' => '/media/galaxys24plus.png', 'categoria' => 'Smartphones'],
            ['id' => 14, 'nome' => 'Galaxy S24', 'modelo' => 'Galaxy S24', 'marca' => 'Samsung', 'preco' => 4299.00, 'descricao' => 'Galaxy S24 compacto com tecnologia avançada.', 'imagem' => '/media/galaxys24.png', 'categoria' => 'Smartphones'],
            ['id' => 15, 'nome' => 'Galaxy S23 Ultra', 'modelo' => 'Galaxy S23 Ultra', 'marca' => 'Samsung', 'preco' => 5999.00, 'descricao' => 'Galaxy S23 Ultra com S Pen e câmera de 200MP.', 'imagem' => '/media/galaxys23ultra.png', 'categoria' => 'Smartphones'],
            ['id' => 16, 'nome' => 'Galaxy S23+', 'modelo' => 'Galaxy S23+', 'marca' => 'Samsung', 'preco' => 4799.00, 'descricao' => 'Galaxy S23+ com design premium e performance avançada.', 'imagem' => '/media/galaxys23plus.png', 'categoria' => 'Smartphones'],
            ['id' => 17, 'nome' => 'Galaxy S23', 'modelo' => 'Galaxy S23', 'marca' => 'Samsung', 'preco' => 3899.00, 'descricao' => 'Galaxy S23 com câmera noturna aprimorada.', 'imagem' => '/media/galaxys23.png', 'categoria' => 'Smartphones'],
            ['id' => 18, 'nome' => 'Galaxy S23 FE', 'modelo' => 'Galaxy S23 FE', 'marca' => 'Samsung', 'preco' => 3299.00, 'descricao' => 'Galaxy S23 FE com recursos premium a preço acessível.', 'imagem' => '/media/galaxys23fe.png', 'categoria' => 'Smartphones'],
            ['id' => 19, 'nome' => 'Galaxy Z Fold 5', 'modelo' => 'Galaxy Z Fold 5', 'marca' => 'Samsung', 'preco' => 9999.00, 'descricao' => 'Smartphone dobrável com tela interna de 7,6 polegadas.', 'imagem' => '/media/galaxyfold5.png', 'categoria' => 'Smartphones'],
            ['id' => 20, 'nome' => 'Galaxy Z Flip 5', 'modelo' => 'Galaxy Z Flip 5', 'marca' => 'Samsung', 'preco' => 5999.00, 'descricao' => 'Smartphone dobrável compacto com design inovador.', 'imagem' => '/media/galaxyflip5.png', 'categoria' => 'Smartphones'],
            ['id' => 21, 'nome' => 'Galaxy A55', 'modelo' => 'Galaxy A55', 'marca' => 'Samsung', 'preco' => 2299.00, 'descricao' => 'Galaxy A55 com ótima relação custo-benefício.', 'imagem' => '/media/galaxya55.png', 'categoria' => 'Smartphones'],
            ['id' => 22, 'nome' => 'Galaxy A35', 'modelo' => 'Galaxy A35', 'marca' => 'Samsung', 'preco' => 1799.00, 'descricao' => 'Galaxy A35 com recursos essenciais e design moderno.', 'imagem' => '/media/galaxya35.png', 'categoria' => 'Smartphones'],
            ['id' => 23, 'nome' => 'Galaxy A15', 'modelo' => 'Galaxy A15', 'marca' => 'Samsung', 'preco' => 1299.00, 'descricao' => 'Galaxy A15 com tela grande e bateria duradoura.', 'imagem' => '/media/galaxya15.png', 'categoria' => 'Smartphones'],

            // FONES DE OUVIDO APPLE
            ['id' => 24, 'nome' => 'AirPods Pro (2ª geração)', 'modelo' => 'AirPods Pro 2', 'marca' => 'Apple', 'preco' => 2299.00, 'descricao' => 'AirPods Pro com cancelamento ativo de ruído de próxima geração.', 'imagem' => '/media/airpodspro2.png', 'categoria' => 'Fones de Ouvido'],
            ['id' => 25, 'nome' => 'AirPods (3ª geração)', 'modelo' => 'AirPods 3', 'marca' => 'Apple', 'preco' => 1799.00, 'descricao' => 'AirPods com áudio espacial e design ergonômico.', 'imagem' => '/media/airpods3.png', 'categoria' => 'Fones de Ouvido'],
            ['id' => 26, 'nome' => 'AirPods (2ª geração)', 'modelo' => 'AirPods 2', 'marca' => 'Apple', 'preco' => 1299.00, 'descricao' => 'AirPods clássicos com qualidade de som excepcional.', 'imagem' => '/media/airpods2.png', 'categoria' => 'Fones de Ouvido'],
            ['id' => 27, 'nome' => 'AirPods Max', 'modelo' => 'AirPods Max', 'marca' => 'Apple', 'preco' => 4999.00, 'descricao' => 'Conecte-se ao que importa — som premium, design elegante e tecnologia Apple.', 'imagem' => '/media/hero.jpg', 'categoria' => 'Fones de Ouvido'],
            ['id' => 28, 'nome' => 'EarPods com conector Lightning', 'modelo' => 'EarPods Lightning', 'marca' => 'Apple', 'preco' => 199.00, 'descricao' => 'EarPods com fio e conector Lightning para iPhone.', 'imagem' => '/media/earpods.png', 'categoria' => 'Fones de Ouvido'],

            // FONES DE OUVIDO SAMSUNG
            ['id' => 29, 'nome' => 'Galaxy Buds2 Pro', 'modelo' => 'Galaxy Buds2 Pro', 'marca' => 'Samsung', 'preco' => 1299.00, 'descricao' => 'Galaxy Buds2 Pro com cancelamento inteligente de ruído.', 'imagem' => '/media/galaxybuds2pro.png', 'categoria' => 'Fones de Ouvido'],
            ['id' => 30, 'nome' => 'Galaxy Buds2', 'modelo' => 'Galaxy Buds2', 'marca' => 'Samsung', 'preco' => 899.00, 'descricao' => 'Galaxy Buds2 com som de alta qualidade e design compacto.', 'imagem' => '/media/galaxybuds2.png', 'categoria' => 'Fones de Ouvido'],
            ['id' => 31, 'nome' => 'Galaxy Buds FE', 'modelo' => 'Galaxy Buds FE', 'marca' => 'Samsung', 'preco' => 599.00, 'descricao' => 'Galaxy Buds FE com recursos essenciais e ótimo custo-benefício.', 'imagem' => '/media/galaxybudsfe.png', 'categoria' => 'Fones de Ouvido'],
            ['id' => 32, 'nome' => 'Galaxy Buds Live', 'modelo' => 'Galaxy Buds Live', 'marca' => 'Samsung', 'preco' => 799.00, 'descricao' => 'Galaxy Buds Live com design único em formato de feijão.', 'imagem' => '/media/galaxybudslive.png', 'categoria' => 'Fones de Ouvido'],

            // TABLETS APPLE
            ['id' => 33, 'nome' => 'iPad Pro 13" (M4, 2024)', 'modelo' => 'iPad Pro 13 M4', 'marca' => 'Apple', 'preco' => 9999.00, 'descricao' => 'iPad Pro de 13 polegadas com chip M4 e tela Tandem OLED.', 'imagem' => '/media/ipadpro13m4.png', 'categoria' => 'Tablets'],
            ['id' => 34, 'nome' => 'iPad Pro 11" (M4, 2024)', 'modelo' => 'iPad Pro 11 M4', 'marca' => 'Apple', 'preco' => 7999.00, 'descricao' => 'iPad Pro de 11 polegadas com chip M4 ultra-rápido.', 'imagem' => '/media/ipadpro11m4.png', 'categoria' => 'Tablets'],
            ['id' => 35, 'nome' => 'iPad Air 13" (M2, 2024)', 'modelo' => 'iPad Air 13 M2', 'marca' => 'Apple', 'preco' => 6499.00, 'descricao' => 'iPad Air de 13 polegadas com chip M2 e design fino.', 'imagem' => '/media/ipadair13m2.png', 'categoria' => 'Tablets'],
            ['id' => 36, 'nome' => 'iPad Air 11" (M2, 2024)', 'modelo' => 'iPad Air 11 M2', 'marca' => 'Apple', 'preco' => 4999.00, 'descricao' => 'iPad Air de 11 polegadas com performance do chip M2.', 'imagem' => '/media/ipadair11m2.png', 'categoria' => 'Tablets'],
            ['id' => 37, 'nome' => 'iPad 10ª geração', 'modelo' => 'iPad 10', 'marca' => 'Apple', 'preco' => 3499.00, 'descricao' => 'iPad com tela de 10,9 polegadas e design colorido.', 'imagem' => '/media/ipad10.png', 'categoria' => 'Tablets'],
            ['id' => 38, 'nome' => 'iPad mini 6ª geração', 'modelo' => 'iPad mini 6', 'marca' => 'Apple', 'preco' => 4199.00, 'descricao' => 'iPad mini portátil com chip A15 Bionic.', 'imagem' => '/media/ipadmini6.png', 'categoria' => 'Tablets'],

            // TABLETS SAMSUNG
            ['id' => 39, 'nome' => 'Galaxy Tab S9 Ultra', 'modelo' => 'Galaxy Tab S9 Ultra', 'marca' => 'Samsung', 'preco' => 7999.00, 'descricao' => 'Galaxy Tab S9 Ultra com tela gigante de 14,6 polegadas.', 'imagem' => '/media/galaxytabs9ultra.png', 'categoria' => 'Tablets'],
            ['id' => 40, 'nome' => 'Galaxy Tab S9+', 'modelo' => 'Galaxy Tab S9+', 'marca' => 'Samsung', 'preco' => 5999.00, 'descricao' => 'Galaxy Tab S9+ com tela de 12,4 polegadas e S Pen.', 'imagem' => '/media/galaxytabs9plus.png', 'categoria' => 'Tablets'],
            ['id' => 41, 'nome' => 'Galaxy Tab S9', 'modelo' => 'Galaxy Tab S9', 'marca' => 'Samsung', 'preco' => 4499.00, 'descricao' => 'Galaxy Tab S9 compacto com tela de 11 polegadas.', 'imagem' => '/media/galaxytabs9.png', 'categoria' => 'Tablets'],
            ['id' => 42, 'nome' => 'Galaxy Tab S9 FE+', 'modelo' => 'Galaxy Tab S9 FE+', 'marca' => 'Samsung', 'preco' => 3299.00, 'descricao' => 'Galaxy Tab S9 FE+ com recursos premium acessíveis.', 'imagem' => '/media/galaxytabs9feplus.png', 'categoria' => 'Tablets'],
            ['id' => 43, 'nome' => 'Galaxy Tab S9 FE', 'modelo' => 'Galaxy Tab S9 FE', 'marca' => 'Samsung', 'preco' => 2499.00, 'descricao' => 'Galaxy Tab S9 FE ideal para uso diário.', 'imagem' => '/media/galaxytabs9fe.png', 'categoria' => 'Tablets'],
            ['id' => 44, 'nome' => 'Galaxy Tab A9+', 'modelo' => 'Galaxy Tab A9+', 'marca' => 'Samsung', 'preco' => 1599.00, 'descricao' => 'Galaxy Tab A9+ para entretenimento familiar.', 'imagem' => '/media/galaxytaba9plus.png', 'categoria' => 'Tablets'],
            ['id' => 45, 'nome' => 'Galaxy Tab A9', 'modelo' => 'Galaxy Tab A9', 'marca' => 'Samsung', 'preco' => 1199.00, 'descricao' => 'Galaxy Tab A9 compacto e acessível.', 'imagem' => '/media/galaxytaba9.png', 'categoria' => 'Tablets'],
            ['id' => 46, 'nome' => 'Samsung Galaxy Tab S6', 'modelo' => 'Galaxy Tab S6', 'marca' => 'Samsung', 'preco' => 1999.00, 'descricao' => 'Produtividade em suas mãos.', 'imagem' => '/media/Samsung Galaxy Tab S6.png', 'categoria' => 'Tablets'],

            // RELÓGIOS APPLE
            ['id' => 47, 'nome' => 'Apple Watch Series 9 (41mm, 45mm)', 'modelo' => 'Apple Watch S9', 'marca' => 'Apple', 'preco' => 3299.00, 'descricao' => 'Apple Watch Series 9 com chip S9 e tela sempre ativa mais brilhante.', 'imagem' => '/media/watchs9.png', 'categoria' => 'Relógios'],
            ['id' => 48, 'nome' => 'Apple Watch SE (2022)', 'modelo' => 'Apple Watch SE', 'marca' => 'Apple', 'preco' => 2299.00, 'descricao' => 'Apple Watch SE com recursos essenciais para saúde e fitness.', 'imagem' => '/media/watchse.png', 'categoria' => 'Relógios'],
            ['id' => 49, 'nome' => 'Apple Watch Ultra 2', 'modelo' => 'Apple Watch Ultra 2', 'marca' => 'Apple', 'preco' => 6999.00, 'descricao' => 'Apple Watch Ultra 2 para aventuras extremas.', 'imagem' => '/media/watchultra2.png', 'categoria' => 'Relógios'],
            ['id' => 50, 'nome' => 'Apple Watch Series 8', 'modelo' => 'Apple Watch Series 8', 'marca' => 'Apple', 'preco' => 2999.00, 'descricao' => 'O futuro no seu pulso.', 'imagem' => '/media/Watch_Series8.png', 'categoria' => 'Relógios'],

            // RELÓGIOS SAMSUNG
            ['id' => 51, 'nome' => 'Galaxy Watch 6 Classic', 'modelo' => 'Galaxy Watch 6 Classic', 'marca' => 'Samsung', 'preco' => 2299.00, 'descricao' => 'Galaxy Watch 6 Classic com moldura giratória e design premium.', 'imagem' => '/media/galaxywatch6classic.png', 'categoria' => 'Relógios'],
            ['id' => 52, 'nome' => 'Galaxy Watch 6', 'modelo' => 'Galaxy Watch 6', 'marca' => 'Samsung', 'preco' => 1899.00, 'descricao' => 'Galaxy Watch 6 com monitoramento avançado de saúde.', 'imagem' => '/media/galaxywatch6.png', 'categoria' => 'Relógios'],
            ['id' => 53, 'nome' => 'Galaxy Watch 5 Pro', 'modelo' => 'Galaxy Watch 5 Pro', 'marca' => 'Samsung', 'preco' => 2799.00, 'descricao' => 'Galaxy Watch 5 Pro com caixa em titânio e bateria extendida.', 'imagem' => '/media/galaxywatch5pro.png', 'categoria' => 'Relógios'],
            ['id' => 54, 'nome' => 'Galaxy Watch 5', 'modelo' => 'Galaxy Watch 5', 'marca' => 'Samsung', 'preco' => 1699.00, 'descricao' => 'Galaxy Watch 5 com carregamento rápido e design moderno.', 'imagem' => '/media/galaxywatch5.png', 'categoria' => 'Relógios'],

            // NOTEBOOKS APPLE
            ['id' => 55, 'nome' => 'MacBook Air 15" (M3, 2024)', 'modelo' => 'MacBook Air 15 M3', 'marca' => 'Apple', 'preco' => 12999.00, 'descricao' => 'MacBook Air de 15 polegadas com chip M3 e tela Liquid Retina.', 'imagem' => '/media/macbookair15m3.png', 'categoria' => 'Notebooks'],
            ['id' => 56, 'nome' => 'MacBook Air 13" (M3, 2024)', 'modelo' => 'MacBook Air 13 M3', 'marca' => 'Apple', 'preco' => 9999.00, 'descricao' => 'MacBook Air de 13 polegadas com chip M3 ultra-eficiente.', 'imagem' => '/media/macbookair13m3.png', 'categoria' => 'Notebooks'],
            ['id' => 57, 'nome' => 'MacBook Pro 14" (M3, 2023)', 'modelo' => 'MacBook Pro 14 M3', 'marca' => 'Apple', 'preco' => 16999.00, 'descricao' => 'MacBook Pro de 14 polegadas com chip M3 Pro para profissionais.', 'imagem' => '/media/macbookpro14m3.png', 'categoria' => 'Notebooks'],
            ['id' => 58, 'nome' => 'MacBook Pro 16" (M3, 2023)', 'modelo' => 'MacBook Pro 16 M3', 'marca' => 'Apple', 'preco' => 21999.00, 'descricao' => 'MacBook Pro de 16 polegadas com máximo desempenho M3 Max.', 'imagem' => '/media/macbookpro16m3.png', 'categoria' => 'Notebooks'],

            // NOTEBOOKS SAMSUNG
            ['id' => 59, 'nome' => 'Galaxy Book4 Ultra', 'modelo' => 'Galaxy Book4 Ultra', 'marca' => 'Samsung', 'preco' => 12999.00, 'descricao' => 'Galaxy Book4 Ultra com performance extrema para criadores.', 'imagem' => '/media/galaxybook4ultra.png', 'categoria' => 'Notebooks'],
            ['id' => 60, 'nome' => 'Galaxy Book4 Pro 360', 'modelo' => 'Galaxy Book4 Pro 360', 'marca' => 'Samsung', 'preco' => 8999.00, 'descricao' => 'Galaxy Book4 Pro 360 conversível com S Pen incluída.', 'imagem' => '/media/galaxybook4pro360.png', 'categoria' => 'Notebooks'],
            ['id' => 61, 'nome' => 'Galaxy Book4 Pro', 'modelo' => 'Galaxy Book4 Pro', 'marca' => 'Samsung', 'preco' => 6999.00, 'descricao' => 'Galaxy Book4 Pro com tela AMOLED e design premium.', 'imagem' => '/media/galaxybook4pro.png', 'categoria' => 'Notebooks'],
            ['id' => 62, 'nome' => 'Galaxy Book4 360', 'modelo' => 'Galaxy Book4 360', 'marca' => 'Samsung', 'preco' => 5499.00, 'descricao' => 'Galaxy Book4 360 conversível para uso versátil.', 'imagem' => '/media/galaxybook4360.png', 'categoria' => 'Notebooks'],
            ['id' => 63, 'nome' => 'Galaxy Book4', 'modelo' => 'Galaxy Book4', 'marca' => 'Samsung', 'preco' => 3999.00, 'descricao' => 'Performance profissional.', 'imagem' => '/media/GalaxyBook4_Homepage.png', 'categoria' => 'Notebooks']
        ];

        foreach ($produtosCatalogo as $produtoData) {
            $produto = Produto::updateOrCreate(
                ['id' => $produtoData['id']],
                [
                    'nome' => $produtoData['nome'],
                    'modelo' => $produtoData['modelo'],
                    'marca' => $produtoData['marca'],
                    'preco' => $produtoData['preco'],
                    'descricao' => $produtoData['descricao'],
                    'imagem' => $produtoData['imagem'],
                    'categoria_id' => $idsCategorias[$produtoData['categoria']],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );

            if ($produto->wasRecentlyCreated) {
                $this->info("Produto criado: {$produto->nome} (ID: {$produto->id})");
            } else {
                $this->info("Produto atualizado: {$produto->nome} (ID: {$produto->id})");
            }
        }

        $this->info('✅ TODOS os produtos do catálogo inseridos/atualizados com sucesso!');
        $this->info('🛒 Total de produtos no catálogo: ' . count($produtosCatalogo));
        $this->info('🚀 Agora o site tem o catálogo completo!');
        
        return 0;
    }
}