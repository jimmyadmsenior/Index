<?php
// Arquivo: create_database.php
// Script para criar o banco de dados e todas as tabelas necessárias

// Configurações de conexão (sem selecionar o banco de dados)
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';

// Cria a conexão sem selecionar o banco de dados
$conn = new mysqli($db_host, $db_user, $db_password);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Nome do banco de dados
$db_name = 'tech_store';

// Criar o banco de dados se não existir
$sql = "CREATE DATABASE IF NOT EXISTS $db_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso ou já existente.<br>";
} else {
    die("Erro ao criar banco de dados: " . $conn->error);
}

// Seleciona o banco de dados
$conn->select_db($db_name);

// Array para armazenar todas as consultas SQL
$tables = [];

// Tabela de Marcas
$tables[] = "CREATE TABLE IF NOT EXISTS marcas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    logo VARCHAR(255),
    descricao TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Tabela de Categorias
$tables[] = "CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    descricao TEXT,
    icone VARCHAR(255),
    slug VARCHAR(50) NOT NULL UNIQUE,
    categoria_pai_id INT NULL,
    FOREIGN KEY (categoria_pai_id) REFERENCES categorias(id) ON DELETE SET NULL
)";

// Tabela de Produtos
$tables[] = "CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo_sku VARCHAR(50) NOT NULL UNIQUE,
    nome VARCHAR(100) NOT NULL,
    descricao_curta VARCHAR(255),
    descricao_completa TEXT,
    preco DECIMAL(10,2) NOT NULL,
    preco_promocional DECIMAL(10,2),
    estoque INT NOT NULL DEFAULT 0,
    id_categoria INT NOT NULL,
    id_marca INT NOT NULL,
    imagem_principal VARCHAR(255),
    slug VARCHAR(100) NOT NULL UNIQUE,
    destaque BOOLEAN DEFAULT FALSE,
    lancamento BOOLEAN DEFAULT FALSE,
    status ENUM('ativo', 'inativo', 'promocao') DEFAULT 'ativo',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id),
    FOREIGN KEY (id_marca) REFERENCES marcas(id)
)";

// Tabela de Imagens dos Produtos
$tables[] = "CREATE TABLE IF NOT EXISTS imagens_produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    url VARCHAR(255) NOT NULL,
    ordem INT DEFAULT 0,
    FOREIGN KEY (id_produto) REFERENCES produtos(id) ON DELETE CASCADE
)";

// Tabela de Especificações Técnicas
$tables[] = "CREATE TABLE IF NOT EXISTS especificacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    tipo_campo ENUM('texto', 'numero', 'boolean', 'lista') DEFAULT 'texto',
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL
)";

// Tabela de Valores das Especificações por Produto
$tables[] = "CREATE TABLE IF NOT EXISTS produto_especificacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    id_especificacao INT NOT NULL,
    valor TEXT NOT NULL,
    FOREIGN KEY (id_produto) REFERENCES produtos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_especificacao) REFERENCES especificacoes(id) ON DELETE CASCADE,
    UNIQUE KEY (id_produto, id_especificacao)
)";

// Tabela de Usuários
$tables[] = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    tipo ENUM('cliente', 'administrador') DEFAULT 'cliente',
    status ENUM('ativo', 'inativo') DEFAULT 'ativo',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ultimo_acesso TIMESTAMP NULL
)";

// Tabela de Endereços
$tables[] = "CREATE TABLE IF NOT EXISTS enderecos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    cep VARCHAR(10) NOT NULL,
    logradouro VARCHAR(100) NOT NULL,
    numero VARCHAR(20) NOT NULL,
    complemento VARCHAR(100),
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado VARCHAR(2) NOT NULL,
    tipo ENUM('entrega', 'cobranca', 'ambos') DEFAULT 'entrega',
    padrao BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
)";

// Tabela de Pedidos
$tables[] = "CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    codigo_pedido VARCHAR(20) NOT NULL UNIQUE,
    status ENUM('aguardando_pagamento', 'pago', 'em_preparacao', 'enviado', 'entregue', 'cancelado') DEFAULT 'aguardando_pagamento',
    valor_total DECIMAL(10,2) NOT NULL,
    valor_frete DECIMAL(10,2) NOT NULL,
    id_endereco_entrega INT NOT NULL,
    metodo_pagamento VARCHAR(50) NOT NULL,
    codigo_rastreio VARCHAR(50),
    observacoes TEXT,
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_endereco_entrega) REFERENCES enderecos(id)
)";

// Tabela de Itens do Pedido
$tables[] = "CREATE TABLE IF NOT EXISTS itens_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_produto) REFERENCES produtos(id)
)";

// Tabela de Avaliações de Produtos
$tables[] = "CREATE TABLE IF NOT EXISTS avaliacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    id_usuario INT NOT NULL,
    nota INT NOT NULL CHECK (nota BETWEEN 1 AND 5),
    comentario TEXT,
    status ENUM('aprovada', 'pendente', 'reprovada') DEFAULT 'pendente',
    data_avaliacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_produto) REFERENCES produtos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
)";

// Tabela de Configurações do Site
$tables[] = "CREATE TABLE IF NOT EXISTS configuracoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chave VARCHAR(50) NOT NULL UNIQUE,
    valor TEXT NOT NULL,
    descricao VARCHAR(255),
    tipo ENUM('texto', 'numero', 'boolean', 'json') DEFAULT 'texto'
)";

// Executa as consultas SQL
foreach ($tables as $sql) {
    if ($conn->query($sql) === TRUE) {
        echo "Tabela criada com sucesso: " . substr($sql, 0, 50) . "...<br>";
    } else {
        echo "Erro ao criar tabela: " . $conn->error . "<br>";
        echo "SQL: $sql <br><br>";
    }
}

// Inserir dados iniciais - Categorias
$insert_categorias = "INSERT IGNORE INTO categorias (nome, descricao, slug) VALUES 
('Smartphones', 'Telefones celulares de última geração', 'smartphones'),
('Tablets', 'Tablets para produtividade e entretenimento', 'tablets'),
('Fones', 'Fones de ouvido com e sem fio', 'fones'),
('Relógios', 'Smartwatches e relógios inteligentes', 'relogios'),
('Notebooks', 'Computadores portáteis de alta performance', 'notebooks')";

if ($conn->query($insert_categorias) === TRUE) {
    echo "Categorias básicas inseridas com sucesso.<br>";
} else {
    echo "Erro ao inserir categorias: " . $conn->error . "<br>";
}

// Inserir dados iniciais - Marcas
$insert_marcas = "INSERT IGNORE INTO marcas (nome, descricao) VALUES 
('Apple', 'Produtos da linha Apple, incluindo iPhone, iPad, MacBook e acessórios'),
('Samsung', 'Produtos da linha Samsung, incluindo Galaxy, tablets e acessórios')";

if ($conn->query($insert_marcas) === TRUE) {
    echo "Marcas inseridas com sucesso.<br>";
} else {
    echo "Erro ao inserir marcas: " . $conn->error . "<br>";
}

// Inserir especificações para Smartphones
$insert_especificacoes_smartphone = "INSERT IGNORE INTO especificacoes (nome, tipo_campo, categoria_id) VALUES 
('Sistema Operacional', 'texto', (SELECT id FROM categorias WHERE slug = 'smartphones')),
('Memória RAM', 'texto', (SELECT id FROM categorias WHERE slug = 'smartphones')),
('Armazenamento', 'texto', (SELECT id FROM categorias WHERE slug = 'smartphones')),
('Tamanho da Tela', 'texto', (SELECT id FROM categorias WHERE slug = 'smartphones')),
('Resolução', 'texto', (SELECT id FROM categorias WHERE slug = 'smartphones')),
('Processador', 'texto', (SELECT id FROM categorias WHERE slug = 'smartphones')),
('Câmera Traseira', 'texto', (SELECT id FROM categorias WHERE slug = 'smartphones')),
('Câmera Frontal', 'texto', (SELECT id FROM categorias WHERE slug = 'smartphones')),
('Bateria', 'texto', (SELECT id FROM categorias WHERE slug = 'smartphones')),
('Resistência à Água', 'texto', (SELECT id FROM categorias WHERE slug = 'smartphones'))";

if ($conn->query($insert_especificacoes_smartphone) === TRUE) {
    echo "Especificações para smartphones inseridas com sucesso.<br>";
} else {
    echo "Erro ao inserir especificações para smartphones: " . $conn->error . "<br>";
}

// Inserir especificações para Tablets
$insert_especificacoes_tablet = "INSERT IGNORE INTO especificacoes (nome, tipo_campo, categoria_id) VALUES 
('Sistema Operacional', 'texto', (SELECT id FROM categorias WHERE slug = 'tablets')),
('Memória RAM', 'texto', (SELECT id FROM categorias WHERE slug = 'tablets')),
('Armazenamento', 'texto', (SELECT id FROM categorias WHERE slug = 'tablets')),
('Tamanho da Tela', 'texto', (SELECT id FROM categorias WHERE slug = 'tablets')),
('Resolução', 'texto', (SELECT id FROM categorias WHERE slug = 'tablets')),
('Processador', 'texto', (SELECT id FROM categorias WHERE slug = 'tablets')),
('Câmera Traseira', 'texto', (SELECT id FROM categorias WHERE slug = 'tablets')),
('Câmera Frontal', 'texto', (SELECT id FROM categorias WHERE slug = 'tablets')),
('Bateria', 'texto', (SELECT id FROM categorias WHERE slug = 'tablets')),
('Conectividade', 'texto', (SELECT id FROM categorias WHERE slug = 'tablets'))";

if ($conn->query($insert_especificacoes_tablet) === TRUE) {
    echo "Especificações para tablets inseridas com sucesso.<br>";
} else {
    echo "Erro ao inserir especificações para tablets: " . $conn->error . "<br>";
}

echo "<br>Configuração do banco de dados concluída com sucesso!";

// Fecha a conexão
$conn->close();
?>