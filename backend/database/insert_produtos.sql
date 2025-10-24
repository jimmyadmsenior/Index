-- Inserir produtos de exemplo para teste
INSERT IGNORE INTO `produtos` (`id`, `nome`, `modelo`, `marca`, `preco`, `descricao`, `imagem`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 14', 'iPhone 14', 'Apple', 4999.00, 'A tecnologia se redefine a cada escolha', '/media/Iphone_14_Capa_Homepage.png', 1, NOW(), NOW()),
(2, 'iPhone 14 Pro', 'iPhone 14 Pro', 'Apple', 5999.00, 'Tecnologia de ponta com câmera profissional', '/media/Iphone_14_Pro_Capa_Homepage.png', 1, NOW(), NOW()),
(3, 'Apple Watch Series 8', 'Series 8', 'Apple', 2999.00, 'O futuro no seu pulso', '/media/Watch_Series8.png', 1, NOW(), NOW()),
(4, 'Samsung Galaxy Tab S6', 'Galaxy Tab S6', 'Samsung', 1999.00, 'Produtividade em suas mãos', '/media/Samsung Galaxy Tab S6.png', 1, NOW(), NOW()),
(5, 'Galaxy Book 4', 'Galaxy Book 4', 'Samsung', 3999.00, 'Performance profissional', '/media/GalaxyBook4_Homepage.png', 1, NOW(), NOW());