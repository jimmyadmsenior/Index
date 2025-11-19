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

        // TODOS OS PRODUTOS DO CATÁLOGO (baseado no insert_produtos.sql)
        $produtosCatalogo = [
            // SMARTPHONES APPLE
            ['id' => 1, 'nome' => 'iPhone 17 Pro', 'modelo' => 'iPhone 17 Pro', 'marca' => 'Apple', 'preco' => 12999.00, 'descricao' => 'O smartphone mais avançado da Apple, com titânio aeroespacial, chip A19 Pro, câmera profissional e design inovador.', 'imagem' => '/media/iPhone 17 Pro.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone 17 Pro representa o ápice da inovação Apple, construído em titânio aeroespacial premium e alimentado pelo revolucionário chip A19 Pro. Oferece performance incomparável, eficiência energética superior e recursos de IA avançados.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 2, 'nome' => 'iPhone 15 Pro Max', 'modelo' => 'iPhone 15 Pro Max', 'marca' => 'Apple', 'preco' => 7899.00, 'descricao' => 'iPhone 15 Pro Max com chip A17 Pro, sistema de câmera profissional e design em titânio premium.', 'imagem' => '/media/iphone15promax.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone 15 Pro Max combina tela Super Retina XDR de 6,7", chip A17 Pro de 3nm, câmeras profissionais de 48MP e construção em titânio. Oferece até 29 horas de reprodução de vídeo e recursos Pro para criadores de conteúdo.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 3, 'nome' => 'iPhone 15 Pro', 'modelo' => 'iPhone 15 Pro', 'marca' => 'Apple', 'preco' => 6899.00, 'descricao' => 'iPhone 15 Pro com chip A17 Pro e câmera profissional de 48MP.', 'imagem' => '/media/iphone15pro.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone 15 Pro oferece o poderoso chip A17 Pro, câmera principal de 48MP com zoom óptico 3x, Dynamic Island e construção premium em titânio. Ideal para profissionais que exigem o melhor em fotografia móvel.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 4, 'nome' => 'iPhone 15 Plus', 'modelo' => 'iPhone 15 Plus', 'marca' => 'Apple', 'preco' => 5899.00, 'descricao' => 'iPhone 15 Plus com tela de 6,7 polegadas e câmera principal de 48MP.', 'imagem' => '/media/iphone15plus.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone 15 Plus oferece uma tela grande Super Retina XDR de 6,7", chip A16 Bionic, câmera de 48MP com zoom óptico 2x e bateria de longa duração. Perfeito para quem quer uma tela maior com excelente autonomia.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 5, 'nome' => 'iPhone 15', 'modelo' => 'iPhone 15', 'marca' => 'Apple', 'preco' => 4899.00, 'descricao' => 'iPhone 15 com chip A16 Bionic e nova câmera principal de 48MP.', 'imagem' => '/media/iphone15.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone 15 traz o chip A16 Bionic, Dynamic Island, câmera principal de 48MP e USB-C. Com design em alumínio colorido e vidro traseiro infundido com cor, oferece performance premium em um pacote acessível.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 6, 'nome' => 'iPhone 14 Pro Max', 'modelo' => 'iPhone 14 Pro Max', 'marca' => 'Apple', 'preco' => 6499.00, 'descricao' => 'iPhone 14 Pro Max com chip A16 Bionic e Dynamic Island.', 'imagem' => '/media/iphone14promax.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone 14 Pro Max introduziu o revolucionário Dynamic Island, câmera de 48MP, chip A16 Bionic e tela Super Retina XDR de 6,7" sempre ativa. Oferece performance profissional com bateria que dura o dia todo.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 7, 'nome' => 'iPhone 14 Pro', 'modelo' => 'iPhone 14 Pro', 'marca' => 'Apple', 'preco' => 5999.00, 'descricao' => 'Tecnologia de ponta com câmera profissional e chip A16 Bionic Pro para desempenho excepcional.', 'imagem' => '/media/iPhone 14 Pro.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone 14 Pro revoluciona a experiência mobile com o Dynamic Island, câmera Pro de 48MP, chip A16 Bionic e tela Super Retina XDR sempre ativa. Design premium em aço inoxidável com acabamento polido.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 8, 'nome' => 'iPhone 14 Plus', 'modelo' => 'iPhone 14 Plus', 'marca' => 'Apple', 'preco' => 4999.00, 'descricao' => 'iPhone 14 Plus com tela grande e bateria de longa duração.', 'imagem' => '/media/iphone14plus.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone 14 Plus oferece uma experiência de tela grande com 6,7", chip A15 Bionic, sistema de câmera dupla avançado e a melhor bateria já vista em um iPhone. Ideal para entretenimento e produtividade.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 9, 'nome' => 'iPhone 14', 'modelo' => 'iPhone 14', 'marca' => 'Apple', 'preco' => 4499.00, 'descricao' => 'A tecnologia se redefine a cada escolha com performance excepcional.', 'imagem' => '/media/Iphone_14_Capa_Homepage.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone 14 traz melhorias significativas com chip A15 Bionic, sistema de câmera dupla aprimorado, Emergency SOS via satélite e design durável em alumínio. Oferece performance confiável para o uso diário.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 10, 'nome' => 'iPhone 13', 'modelo' => 'iPhone 13', 'marca' => 'Apple', 'preco' => 3899.00, 'descricao' => 'iPhone 13 com chip A15 Bionic e sistema de câmera dupla avançado.', 'imagem' => '/media/iphone13.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone 13 oferece chip A15 Bionic ultrarrápido, sistema de câmera dupla avançado com modo Cinema, tela Super Retina XDR mais brilhante e bateria que dura o dia todo. Excelente custo-benefício.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 11, 'nome' => 'iPhone SE (3ª geração)', 'modelo' => 'iPhone SE 3ª gen', 'marca' => 'Apple', 'preco' => 2899.00, 'descricao' => 'iPhone SE com chip A15 Bionic no design clássico.', 'imagem' => '/media/iphonese3.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O iPhone SE combina o design clássico com botão Home e Touch ID com o poderoso chip A15 Bionic. Oferece performance premium em formato compacto, ideal para quem prefere telas menores e preço acessível.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],

            // SMARTPHONES SAMSUNG
            ['id' => 12, 'nome' => 'Galaxy S24 Ultra', 'modelo' => 'Galaxy S24 Ultra', 'marca' => 'Samsung', 'preco' => 6999.00, 'descricao' => 'Galaxy S24 Ultra com S Pen integrada e câmeras profissionais.', 'imagem' => '/media/galaxys24ultra.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy S24 Ultra é o flagship definitivo da Samsung, com tela Dynamic AMOLED 2X de 6,8", processador Snapdragon 8 Gen 3, câmera de 200MP, S Pen integrada e recursos de IA Galaxy AI para máxima produtividade.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 13, 'nome' => 'Galaxy S24+', 'modelo' => 'Galaxy S24+', 'marca' => 'Samsung', 'preco' => 5499.00, 'descricao' => 'Galaxy S24+ com tela grande e performance premium.', 'imagem' => '/media/galaxys24plus.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy S24+ oferece tela Dynamic AMOLED 2X de 6,7", processador Snapdragon 8 Gen 3, câmera tripla de 50MP, bateria de 4.900mAh e recursos Galaxy AI. Perfeito equilíbrio entre tamanho, performance e autonomia.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 14, 'nome' => 'Galaxy S24', 'modelo' => 'Galaxy S24', 'marca' => 'Samsung', 'preco' => 4299.00, 'descricao' => 'Galaxy S24 compacto com tecnologia avançada.', 'imagem' => '/media/galaxys24.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy S24 compacto oferece tela Dynamic AMOLED 2X de 6,2", processador Snapdragon 8 Gen 3, sistema de câmera tripla inteligente e recursos Galaxy AI em formato ergonômico e portátil.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 15, 'nome' => 'Galaxy S23 Ultra', 'modelo' => 'Galaxy S23 Ultra', 'marca' => 'Samsung', 'preco' => 5999.00, 'descricao' => 'Galaxy S23 Ultra com S Pen e câmera de 200MP.', 'imagem' => '/media/galaxys23ultra.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy S23 Ultra revoluciona a fotografia mobile com câmera de 200MP, processador Snapdragon 8 Gen 2, S Pen integrada, tela Dynamic AMOLED 2X de 6,8" e design premium em alumínio Armor.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 16, 'nome' => 'Galaxy S23+', 'modelo' => 'Galaxy S23+', 'marca' => 'Samsung', 'preco' => 4799.00, 'descricao' => 'Galaxy S23+ com design premium e performance avançada.', 'imagem' => '/media/galaxys23plus.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy S23+ combina tela Dynamic AMOLED 2X de 6,6", processador Snapdragon 8 Gen 2, câmera de 50MP com IA, design em vidro e alumínio premium, oferecendo experiência flagship acessível.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 17, 'nome' => 'Galaxy S23', 'modelo' => 'Galaxy S23', 'marca' => 'Samsung', 'preco' => 3899.00, 'descricao' => 'Galaxy S23 com câmera noturna aprimorada.', 'imagem' => '/media/galaxys23.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy S23 oferece tela Dynamic AMOLED 2X de 6,1", processador Snapdragon 8 Gen 2, câmera de 50MP com estabilização ótica e design premium em vidro Gorilla Glass Victus 2. Perfeito equilíbrio entre performance e portabilidade.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 18, 'nome' => 'Galaxy S23 FE', 'modelo' => 'Galaxy S23 FE', 'marca' => 'Samsung', 'preco' => 3299.00, 'descricao' => 'Galaxy S23 FE com recursos premium a preço acessível.', 'imagem' => '/media/galaxys23fe.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy S23 FE oferece experiência flagship acessível com tela Dynamic AMOLED 2X, processador Snapdragon 8 Gen 1, câmera de 50MP e design durável. Ideal para quem quer tecnologia Samsung premium por menos.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 19, 'nome' => 'Galaxy Z Fold 5', 'modelo' => 'Galaxy Z Fold 5', 'marca' => 'Samsung', 'preco' => 9999.00, 'descricao' => 'Smartphone dobrável com tela interna de 7,6 polegadas.', 'imagem' => '/media/galaxyfold5.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy Z Fold 5 redefine a produtividade móvel com tela dobrável de 7,6", processador Snapdragon 8 Gen 2, S Pen compatível e design ultra-fino quando fechado. O futuro dos smartphones dobráveis.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 20, 'nome' => 'Galaxy Z Flip 5', 'modelo' => 'Galaxy Z Flip 5', 'marca' => 'Samsung', 'preco' => 5999.00, 'descricao' => 'Smartphone dobrável compacto com design inovador.', 'imagem' => '/media/galaxyflip5.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy Z Flip 5 combina estilo e inovação com design dobrável compacto, tela externa maior, processador Snapdragon 8 Gen 2 e câmera dupla de 12MP. Perfeito para quem quer se destacar.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 21, 'nome' => 'Galaxy A55', 'modelo' => 'Galaxy A55', 'marca' => 'Samsung', 'preco' => 2299.00, 'descricao' => 'Galaxy A55 com ótima relação custo-benefício.', 'imagem' => '/media/galaxya55.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy A55 oferece tela Super AMOLED de 6,6", processador Exynos 1480, câmera tripla de 50MP e design resistente com IP67. Excelente custo-benefício com recursos premium.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 22, 'nome' => 'Galaxy A35', 'modelo' => 'Galaxy A35', 'marca' => 'Samsung', 'preco' => 1799.00, 'descricao' => 'Galaxy A35 com recursos essenciais e design moderno.', 'imagem' => '/media/galaxya35.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy A35 traz tela Super AMOLED de 6,6", processador Exynos 1380, câmera tripla de 50MP e bateria de 5.000mAh. Design moderno com recursos essenciais para o dia a dia.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 23, 'nome' => 'Galaxy A15', 'modelo' => 'Galaxy A15', 'marca' => 'Samsung', 'preco' => 1299.00, 'descricao' => 'Galaxy A15 com tela grande e bateria duradoura.', 'imagem' => '/media/galaxya15.png', 'categoria' => 'Smartphones', 'descricao_modelo' => 'O Galaxy A15 oferece tela Super AMOLED de 6,5", processador MediaTek Dimensity 6100+, câmera tripla de 50MP e bateria de 5.000mAh. Entrada acessível no ecossistema Galaxy.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],

            // FONES DE OUVIDO APPLE
            ['id' => 24, 'nome' => 'AirPods Pro (2ª geração)', 'modelo' => 'AirPods Pro 2', 'marca' => 'Apple', 'preco' => 2299.00, 'descricao' => 'AirPods Pro com cancelamento ativo de ruído de próxima geração.', 'imagem' => '/media/airpodspro2.png', 'categoria' => 'Fones de Ouvido', 'descricao_modelo' => 'Os AirPods Pro (2ª geração) oferecem cancelamento ativo de ruído 2x melhor, áudio espacial personalizado, chip H2, até 6h de reprodução e estojo MagSafe com localização precisa.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 25, 'nome' => 'AirPods (3ª geração)', 'modelo' => 'AirPods 3', 'marca' => 'Apple', 'preco' => 1799.00, 'descricao' => 'AirPods com áudio espacial e design ergonômico.', 'imagem' => '/media/airpods3.png', 'categoria' => 'Fones de Ouvido', 'descricao_modelo' => 'Os AirPods (3ª geração) trazem áudio espacial, design ergonômico resistente à água, até 6h de reprodução, estojo MagSafe e integração perfeita com todos os dispositivos Apple.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 26, 'nome' => 'AirPods (2ª geração)', 'modelo' => 'AirPods 2', 'marca' => 'Apple', 'preco' => 1299.00, 'descricao' => 'AirPods clássicos com qualidade de som excepcional.', 'imagem' => '/media/airpods2.png', 'categoria' => 'Fones de Ouvido', 'descricao_modelo' => 'Os AirPods (2ª geração) oferecem som de alta qualidade, conectividade automática, até 5h de reprodução, estojo com carregamento rápido e a praticidade do ecossistema Apple.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 27, 'nome' => 'AirPods Max', 'modelo' => 'AirPods Max', 'marca' => 'Apple', 'preco' => 4999.00, 'descricao' => 'Conecte-se ao que importa — som premium, design elegante e tecnologia Apple.', 'imagem' => '/media/hero.jpg', 'categoria' => 'Fones de Ouvido', 'descricao_modelo' => 'Os AirPods Max oferecem som Hi-Fi com drivers dinâmicos de 40mm, cancelamento ativo de ruído computacional, áudio espacial e design premium em alumínio com almofadas ultra-macias.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 28, 'nome' => 'EarPods com conector Lightning', 'modelo' => 'EarPods Lightning', 'marca' => 'Apple', 'preco' => 199.00, 'descricao' => 'EarPods com fio e conector Lightning para iPhone.', 'imagem' => '/media/earpods.png', 'categoria' => 'Fones de Ouvido', 'descricao_modelo' => 'Os EarPods com Lightning oferecem som cristalino, design ergonômico universal, microfone integrado e conectividade direta com dispositivos Lightning sem necessidade de carregamento.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],

            // FONES DE OUVIDO SAMSUNG
            ['id' => 29, 'nome' => 'Galaxy Buds2 Pro', 'modelo' => 'Galaxy Buds2 Pro', 'marca' => 'Samsung', 'preco' => 1299.00, 'descricao' => 'Galaxy Buds2 Pro com cancelamento inteligente de ruído.', 'imagem' => '/media/galaxybuds2pro.png', 'categoria' => 'Fones de Ouvido', 'descricao_modelo' => 'Os Galaxy Buds2 Pro oferecem cancelamento inteligente de ruído, som de estúdio, resistência à água IPX7, até 8h de reprodução e integração perfeita com dispositivos Galaxy.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 30, 'nome' => 'Galaxy Buds2', 'modelo' => 'Galaxy Buds2', 'marca' => 'Samsung', 'preco' => 899.00, 'descricao' => 'Galaxy Buds2 com som de alta qualidade e design compacto.', 'imagem' => '/media/galaxybuds2.png', 'categoria' => 'Fones de Ouvido', 'descricao_modelo' => 'Os Galaxy Buds2 combinam cancelamento ativo de ruído, som equilibrado, design compacto e confortável, até 7,5h de reprodução e estojo compacto para máxima portabilidade.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 31, 'nome' => 'Galaxy Buds FE', 'modelo' => 'Galaxy Buds FE', 'marca' => 'Samsung', 'preco' => 599.00, 'descricao' => 'Galaxy Buds FE com recursos essenciais e ótimo custo-benefício.', 'imagem' => '/media/galaxybudsfe.png', 'categoria' => 'Fones de Ouvido', 'descricao_modelo' => 'Os Galaxy Buds FE oferecem cancelamento ativo de ruído, som balanceado, até 8,5h de reprodução, design ergonômico e recursos essenciais Galaxy com excelente custo-benefício.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 32, 'nome' => 'Galaxy Buds Live', 'modelo' => 'Galaxy Buds Live', 'marca' => 'Samsung', 'preco' => 799.00, 'descricao' => 'Galaxy Buds Live com design único em formato de feijão.', 'imagem' => '/media/galaxybudslive.png', 'categoria' => 'Fones de Ouvido', 'descricao_modelo' => 'Os Galaxy Buds Live têm design único em formato de feijão, cancelamento ativo de ruído aberto, drivers de 12mm, até 8h de reprodução e integração Samsung seamless.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],

            // TABLETS APPLE
            ['id' => 33, 'nome' => 'iPad Pro 13" (M4, 2024)', 'modelo' => 'iPad Pro 13 M4', 'marca' => 'Apple', 'preco' => 9999.00, 'descricao' => 'iPad Pro de 13 polegadas com chip M4 e tela Tandem OLED.', 'imagem' => '/media/ipadpro13m4.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O iPad Pro de 13" revoluciona a computação móvel com chip M4 ultra-rápido, tela Tandem OLED Ultra Retina XDR, suporte ao Apple Pencil Pro e design incrivelmente fino. Poder de desktop em formato portátil.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 34, 'nome' => 'iPad Pro 11" (M4, 2024)', 'modelo' => 'iPad Pro 11 M4', 'marca' => 'Apple', 'preco' => 7999.00, 'descricao' => 'iPad Pro de 11 polegadas com chip M4 ultra-rápido.', 'imagem' => '/media/ipadpro11m4.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O iPad Pro de 11" com chip M4 oferece performance desktop, tela Tandem OLED, compatibilidade com Magic Keyboard e Apple Pencil Pro. Ideal para profissionais criativos e produtividade avançada.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 35, 'nome' => 'iPad Air 13" (M2, 2024)', 'modelo' => 'iPad Air 13 M2', 'marca' => 'Apple', 'preco' => 6499.00, 'descricao' => 'iPad Air de 13 polegadas com chip M2 e design fino.', 'imagem' => '/media/ipadair13m2.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O iPad Air de 13" combina tela Liquid Retina grande, chip M2 poderoso, design fino e leve com suporte ao Apple Pencil e Magic Keyboard. Performance excepcional em tela maior.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 36, 'nome' => 'iPad Air 11" (M2, 2024)', 'modelo' => 'iPad Air 11 M2', 'marca' => 'Apple', 'preco' => 4999.00, 'descricao' => 'iPad Air de 11 polegadas com performance do chip M2.', 'imagem' => '/media/ipadair11m2.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O iPad Air de 11" oferece chip M2, tela Liquid Retina, design ultrafino, suporte ao Apple Pencil e Magic Keyboard. Equilíbrio perfeito entre performance e portabilidade.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 37, 'nome' => 'iPad 10ª geração', 'modelo' => 'iPad 10', 'marca' => 'Apple', 'preco' => 3499.00, 'descricao' => 'iPad com tela de 10,9 polegadas e design colorido.', 'imagem' => '/media/ipad10.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O iPad de 10ª geração traz design renovado, tela Liquid Retina de 10,9", chip A14 Bionic, cores vibrantes e suporte ao Apple Pencil (1ª geração). iPad versátil para todos.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 38, 'nome' => 'iPad mini 6ª geração', 'modelo' => 'iPad mini 6', 'marca' => 'Apple', 'preco' => 4199.00, 'descricao' => 'iPad mini portátil com chip A15 Bionic.', 'imagem' => '/media/ipadmini6.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O iPad mini combina portabilidade máxima com chip A15 Bionic potente, tela Liquid Retina de 8,3", suporte ao Apple Pencil (2ª geração) e design compacto. Poder total em suas mãos.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],

            // TABLETS SAMSUNG
            ['id' => 39, 'nome' => 'Galaxy Tab S9 Ultra', 'modelo' => 'Galaxy Tab S9 Ultra', 'marca' => 'Samsung', 'preco' => 7999.00, 'descricao' => 'Galaxy Tab S9 Ultra com tela gigante de 14,6 polegadas.', 'imagem' => '/media/galaxytabs9ultra.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O Galaxy Tab S9 Ultra oferece tela Dynamic AMOLED 2X de 14,6", processador Snapdragon 8 Gen 2, S Pen incluída, até 16GB de RAM e design premium. Perfeito para produtividade e criatividade profissional.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 40, 'nome' => 'Galaxy Tab S9+', 'modelo' => 'Galaxy Tab S9+', 'marca' => 'Samsung', 'preco' => 5999.00, 'descricao' => 'Galaxy Tab S9+ com tela de 12,4 polegadas e S Pen.', 'imagem' => '/media/galaxytabs9plus.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O Galaxy Tab S9+ combina tela Dynamic AMOLED 2X de 12,4", processador poderoso, S Pen incluída e design premium. Ideal para trabalho criativo e entretenimento de alta qualidade.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 41, 'nome' => 'Galaxy Tab S9', 'modelo' => 'Galaxy Tab S9', 'marca' => 'Samsung', 'preco' => 4499.00, 'descricao' => 'Galaxy Tab S9 compacto com tela de 11 polegadas.', 'imagem' => '/media/galaxytabs9.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O Galaxy Tab S9 oferece tela Dynamic AMOLED 2X de 11", performance robusta, S Pen incluída e portabilidade premium. Equilíbrio perfeito entre produtividade e mobilidade.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 42, 'nome' => 'Galaxy Tab S9 FE+', 'modelo' => 'Galaxy Tab S9 FE+', 'marca' => 'Samsung', 'preco' => 3299.00, 'descricao' => 'Galaxy Tab S9 FE+ com recursos premium acessíveis.', 'imagem' => '/media/galaxytabs9feplus.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O Galaxy Tab S9 FE+ oferece experiência premium acessível com tela grande, S Pen incluída, performance sólida e design moderno. Ideal para estudantes e profissionais iniciantes.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 43, 'nome' => 'Galaxy Tab S9 FE', 'modelo' => 'Galaxy Tab S9 FE', 'marca' => 'Samsung', 'preco' => 2499.00, 'descricao' => 'Galaxy Tab S9 FE ideal para uso diário.', 'imagem' => '/media/galaxytabs9fe.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O Galaxy Tab S9 FE traz recursos essenciais da linha S com S Pen incluída, performance confiável e design elegante. Perfeito para entretenimento e tarefas do dia a dia.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 44, 'nome' => 'Galaxy Tab A9+', 'modelo' => 'Galaxy Tab A9+', 'marca' => 'Samsung', 'preco' => 1599.00, 'descricao' => 'Galaxy Tab A9+ para entretenimento familiar.', 'imagem' => '/media/galaxytaba9plus.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O Galaxy Tab A9+ oferece tela grande, bateria duradoura, desempenho confiável e recursos familiares. Ideal para entretenimento, estudos e uso compartilhado em casa.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 45, 'nome' => 'Galaxy Tab A9', 'modelo' => 'Galaxy Tab A9', 'marca' => 'Samsung', 'preco' => 1199.00, 'descricao' => 'Galaxy Tab A9 compacto e acessível.', 'imagem' => '/media/galaxytaba9.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O Galaxy Tab A9 combina portabilidade, performance essencial e preço acessível. Perfeito para navegação, leitura, streaming e tarefas básicas do dia a dia.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 46, 'nome' => 'Samsung Galaxy Tab S6', 'modelo' => 'Galaxy Tab S6', 'marca' => 'Samsung', 'preco' => 1999.00, 'descricao' => 'Produtividade em suas mãos com design premium e S Pen.', 'imagem' => '/media/Samsung Galaxy Tab S6.png', 'categoria' => 'Tablets', 'descricao_modelo' => 'O Galaxy Tab S6 oferece tela Super AMOLED, S Pen incluída, design ultrafino e performance robusta. Combinação perfeita de produtividade profissional e entretenimento premium.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],

            // RELÓGIOS APPLE
            ['id' => 47, 'nome' => 'Apple Watch Series 9 (41mm, 45mm)', 'modelo' => 'Apple Watch S9', 'marca' => 'Apple', 'preco' => 3299.00, 'descricao' => 'Apple Watch Series 9 com chip S9 e tela sempre ativa mais brilhante.', 'imagem' => '/media/watchs9.png', 'categoria' => 'Relógios', 'descricao_modelo' => 'O Apple Watch Series 9 traz chip S9 revolucionário, tela Retina sempre ativa 2x mais brilhante, gesto duplo toque, monitoramento avançado de saúde e novos recursos de bem-estar e fitness.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 48, 'nome' => 'Apple Watch SE (2022)', 'modelo' => 'Apple Watch SE', 'marca' => 'Apple', 'preco' => 2299.00, 'descricao' => 'Apple Watch SE com recursos essenciais para saúde e fitness.', 'imagem' => '/media/watchse.png', 'categoria' => 'Relógios', 'descricao_modelo' => 'O Apple Watch SE oferece recursos essenciais do Apple Watch com chip S8, detecção de batimentos irregulares, SOS de emergência e resistência à água. Entrada perfeita no ecossistema Apple Watch.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 49, 'nome' => 'Apple Watch Ultra 2', 'modelo' => 'Apple Watch Ultra 2', 'marca' => 'Apple', 'preco' => 6999.00, 'descricao' => 'Apple Watch Ultra 2 para aventuras extremas.', 'imagem' => '/media/watchultra2.png', 'categoria' => 'Relógios', 'descricao_modelo' => 'O Apple Watch Ultra 2 é construído para resistir aos ambientes mais extremos, com caixa de titânio, tela sempre ativa mais brilhante, bateria de 72h e recursos especializados para aventuras.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 50, 'nome' => 'Apple Watch Series 8', 'modelo' => 'Apple Watch Series 8', 'marca' => 'Apple', 'preco' => 2999.00, 'descricao' => 'O futuro no seu pulso com monitoramento avançado de temperatura.', 'imagem' => '/media/Watch_Series8.png', 'categoria' => 'Relógios', 'descricao_modelo' => 'O Apple Watch Series 8 introduz sensor de temperatura, detecção avançada de acidentes, monitoramento de ovulação, chip S8 rápido e tela Retina sempre ativa resistente a rachaduras.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],

            // RELÓGIOS SAMSUNG
            ['id' => 51, 'nome' => 'Galaxy Watch 6 Classic', 'modelo' => 'Galaxy Watch 6 Classic', 'marca' => 'Samsung', 'preco' => 2299.00, 'descricao' => 'Galaxy Watch 6 Classic com moldura giratória e design premium.', 'imagem' => '/media/galaxywatch6classic.png', 'categoria' => 'Relógios', 'descricao_modelo' => 'O Galaxy Watch 6 Classic combina moldura giratória icônica, monitoramento avançado de saúde, bateria duradoura e design premium em aço inoxidável. Elegância e funcionalidade em perfeita harmonia.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 52, 'nome' => 'Galaxy Watch 6', 'modelo' => 'Galaxy Watch 6', 'marca' => 'Samsung', 'preco' => 1899.00, 'descricao' => 'Galaxy Watch 6 com monitoramento avançado de saúde.', 'imagem' => '/media/galaxywatch6.png', 'categoria' => 'Relógios', 'descricao_modelo' => 'O Galaxy Watch 6 oferece monitoramento completo de saúde, sensor BioActive aprimorado, análise avançada de sono, design elegante e integração perfeita com o ecossistema Galaxy.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 53, 'nome' => 'Galaxy Watch 5 Pro', 'modelo' => 'Galaxy Watch 5 Pro', 'marca' => 'Samsung', 'preco' => 2799.00, 'descricao' => 'Galaxy Watch 5 Pro com caixa em titânio e bateria extendida.', 'imagem' => '/media/galaxywatch5pro.png', 'categoria' => 'Relógios', 'descricao_modelo' => 'O Galaxy Watch 5 Pro apresenta construção em titânio durável, bateria de maior capacidade, recursos avançados para atividades ao ar livre e roteamento GPX para aventureiros.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 54, 'nome' => 'Galaxy Watch 5', 'modelo' => 'Galaxy Watch 5', 'marca' => 'Samsung', 'preco' => 1699.00, 'descricao' => 'Galaxy Watch 5 com carregamento rápido e design moderno.', 'imagem' => '/media/galaxywatch5.png', 'categoria' => 'Relógios', 'descricao_modelo' => 'O Galaxy Watch 5 traz carregamento mais rápido, design refinado, monitoramento completo de saúde, resistência aprimorada e recursos inteligentes para acompanhar seu estilo de vida ativo.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],

            // NOTEBOOKS APPLE
            ['id' => 55, 'nome' => 'MacBook Air 15" (M3, 2024)', 'modelo' => 'MacBook Air 15 M3', 'marca' => 'Apple', 'preco' => 12999.00, 'descricao' => 'MacBook Air de 15 polegadas com chip M3 e tela Liquid Retina.', 'imagem' => '/media/macbookair15m3.png', 'categoria' => 'Notebooks', 'descricao_modelo' => 'O MacBook Air de 15" combina tela Liquid Retina ampla, chip M3 ultraeficiente, design fino e leve, até 18h de bateria e performance silenciosa. Ideal para produtividade e criatividade em tela grande.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 56, 'nome' => 'MacBook Air 13" (M3, 2024)', 'modelo' => 'MacBook Air 13 M3', 'marca' => 'Apple', 'preco' => 9999.00, 'descricao' => 'MacBook Air de 13 polegadas com chip M3 ultra-eficiente.', 'imagem' => '/media/macbookair13m3.png', 'categoria' => 'Notebooks', 'descricao_modelo' => 'O MacBook Air de 13" oferece chip M3 poderoso, design icônico ultrafino, tela Liquid Retina brilhante, até 18h de bateria e operação completamente silenciosa. Portabilidade e performance em equilíbrio perfeito.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 57, 'nome' => 'MacBook Pro 14" (M3, 2023)', 'modelo' => 'MacBook Pro 14 M3', 'marca' => 'Apple', 'preco' => 16999.00, 'descricao' => 'MacBook Pro de 14 polegadas com chip M3 Pro para profissionais.', 'imagem' => '/media/macbookpro14m3.png', 'categoria' => 'Notebooks', 'descricao_modelo' => 'O MacBook Pro de 14" oferece chip M3 Pro/Max, tela Liquid Retina XDR, sistema de câmeras avançado, portas Thunderbolt 4, MagSafe 3 e performance profissional para criadores exigentes.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],
            ['id' => 58, 'nome' => 'MacBook Pro 16" (M3, 2023)', 'modelo' => 'MacBook Pro 16 M3', 'marca' => 'Apple', 'preco' => 21999.00, 'descricao' => 'MacBook Pro de 16 polegadas com máximo desempenho M3 Max.', 'imagem' => '/media/macbookpro16m3.png', 'categoria' => 'Notebooks', 'descricao_modelo' => 'O MacBook Pro de 16" representa o máximo em performance com chip M3 Max, tela Liquid Retina XDR de 16", até 128GB de memória unificada e recursos profissionais para workflows mais exigentes.', 'descricao_marca' => 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado que conecta todos os seus dispositivos perfeitamente.'],

            // NOTEBOOKS SAMSUNG
            ['id' => 59, 'nome' => 'Galaxy Book4 Ultra', 'modelo' => 'Galaxy Book4 Ultra', 'marca' => 'Samsung', 'preco' => 12999.00, 'descricao' => 'Galaxy Book4 Ultra com performance extrema para criadores.', 'imagem' => '/media/galaxybook4ultra.png', 'categoria' => 'Notebooks', 'descricao_modelo' => 'O Galaxy Book4 Ultra oferece processadores Intel Core Ultra, tela Dynamic AMOLED 2X, placa de vídeo dedicada, até 32GB de RAM e recursos de IA para criadores e profissionais exigentes.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 60, 'nome' => 'Galaxy Book4 Pro 360', 'modelo' => 'Galaxy Book4 Pro 360', 'marca' => 'Samsung', 'preco' => 8999.00, 'descricao' => 'Galaxy Book4 Pro 360 conversível com S Pen incluída.', 'imagem' => '/media/galaxybook4pro360.png', 'categoria' => 'Notebooks', 'descricao_modelo' => 'O Galaxy Book4 Pro 360 combina versatilidade 2-em-1, tela touchscreen Dynamic AMOLED 2X, S Pen incluída, dobradiça 360° e performance robusta para trabalho e criatividade.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 61, 'nome' => 'Galaxy Book4 Pro', 'modelo' => 'Galaxy Book4 Pro', 'marca' => 'Samsung', 'preco' => 6999.00, 'descricao' => 'Galaxy Book4 Pro com tela AMOLED e design premium.', 'imagem' => '/media/galaxybook4pro.png', 'categoria' => 'Notebooks', 'descricao_modelo' => 'O Galaxy Book4 Pro apresenta tela Dynamic AMOLED 2X vibrante, processadores Intel Core de 13ª geração, design ultrafino em metal e integração perfeita com dispositivos Galaxy.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 62, 'nome' => 'Galaxy Book4 360', 'modelo' => 'Galaxy Book4 360', 'marca' => 'Samsung', 'preco' => 5499.00, 'descricao' => 'Galaxy Book4 360 conversível para uso versátil.', 'imagem' => '/media/galaxybook4360.png', 'categoria' => 'Notebooks', 'descricao_modelo' => 'O Galaxy Book4 360 oferece flexibilidade 2-em-1, tela touchscreen, S Pen compatível, design conversível e performance confiável para estudantes e profissionais versáteis.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.'],
            ['id' => 63, 'nome' => 'Galaxy Book4', 'modelo' => 'Galaxy Book4', 'marca' => 'Samsung', 'preco' => 3999.00, 'descricao' => 'Performance profissional com design elegante e conectividade avançada.', 'imagem' => '/media/GalaxyBook4_Homepage.png', 'categoria' => 'Notebooks', 'descricao_modelo' => 'O Galaxy Book4 combina performance essencial, design moderno, tela Full HD, conectividade completa e integração Galaxy para produtividade diária eficiente e confiável.', 'descricao_marca' => 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado, tecnologia de ponta e funcionalidades inteligentes.']
        ];

        foreach ($produtosCatalogo as $produtoData) {
            Produto::updateOrCreate(
                ['id' => $produtoData['id']],
                [
                    'nome' => $produtoData['nome'],
                    'modelo' => $produtoData['modelo'],
                    'marca' => $produtoData['marca'],
                    'preco' => $produtoData['preco'],
                    'descricao' => $produtoData['descricao'],
                    'descricao_modelo' => $produtoData['descricao_modelo'] ?? 'Informações detalhadas sobre o modelo ' . $produtoData['nome'] . '. Especificações técnicas avançadas, design inovador e recursos que definem este produto como referência em sua categoria.',
                    'descricao_marca' => $produtoData['descricao_marca'] ?? ($produtoData['marca'] === 'Apple' ? 'A Apple é sinônimo de inovação e qualidade premium. Fundada em 1976, revoluciona constantemente a tecnologia com design elegante, performance excepcional e ecossistema integrado.' : 'A Samsung é líder mundial em tecnologia, inovando há mais de 80 anos. Pioneira em displays, semicondutores e smartphones, oferece produtos que combinam design sofisticado e tecnologia de ponta.'),
                    'imagem' => $produtoData['imagem'],
                    'categoria_id' => $idsCategorias[$produtoData['categoria']],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
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
