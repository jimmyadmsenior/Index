<?php
// Arquivo: models/Product.php
// Classe para gerenciar os produtos

class Product {
    private $conn;
    
    // Propriedades do produto
    public $id;
    public $codigo_sku;
    public $nome;
    public $descricao_curta;
    public $descricao_completa;
    public $preco;
    public $preco_promocional;
    public $estoque;
    public $id_categoria;
    public $id_marca;
    public $imagem_principal;
    public $slug;
    public $destaque;
    public $lancamento;
    public $status;
    
    // Construtor
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Obter todos os produtos
    public function getAll($limit = 10, $offset = 0, $orderBy = 'id', $orderDir = 'DESC') {
        $query = "SELECT p.*, c.nome as categoria_nome, m.nome as marca_nome 
                  FROM produtos p
                  LEFT JOIN categorias c ON p.id_categoria = c.id
                  LEFT JOIN marcas m ON p.id_marca = m.id
                  ORDER BY p.$orderBy $orderDir
                  LIMIT ? OFFSET ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $limit, $offset);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Buscar produto por ID
    public function getById($id) {
        $query = "SELECT p.*, c.nome as categoria_nome, m.nome as marca_nome 
                  FROM produtos p
                  LEFT JOIN categorias c ON p.id_categoria = c.id
                  LEFT JOIN marcas m ON p.id_marca = m.id
                  WHERE p.id = ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->codigo_sku = $row['codigo_sku'];
            $this->nome = $row['nome'];
            $this->descricao_curta = $row['descricao_curta'];
            $this->descricao_completa = $row['descricao_completa'];
            $this->preco = $row['preco'];
            $this->preco_promocional = $row['preco_promocional'];
            $this->estoque = $row['estoque'];
            $this->id_categoria = $row['id_categoria'];
            $this->id_marca = $row['id_marca'];
            $this->imagem_principal = $row['imagem_principal'];
            $this->slug = $row['slug'];
            $this->destaque = $row['destaque'];
            $this->lancamento = $row['lancamento'];
            $this->status = $row['status'];
            
            return true;
        }
        
        return false;
    }
    
    // Buscar produto por slug
    public function getBySlug($slug) {
        $query = "SELECT p.*, c.nome as categoria_nome, m.nome as marca_nome 
                  FROM produtos p
                  LEFT JOIN categorias c ON p.id_categoria = c.id
                  LEFT JOIN marcas m ON p.id_marca = m.id
                  WHERE p.slug = ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $slug);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->codigo_sku = $row['codigo_sku'];
            $this->nome = $row['nome'];
            $this->descricao_curta = $row['descricao_curta'];
            $this->descricao_completa = $row['descricao_completa'];
            $this->preco = $row['preco'];
            $this->preco_promocional = $row['preco_promocional'];
            $this->estoque = $row['estoque'];
            $this->id_categoria = $row['id_categoria'];
            $this->id_marca = $row['id_marca'];
            $this->imagem_principal = $row['imagem_principal'];
            $this->slug = $row['slug'];
            $this->destaque = $row['destaque'];
            $this->lancamento = $row['lancamento'];
            $this->status = $row['status'];
            
            return true;
        }
        
        return false;
    }
    
    // Obter produtos por categoria
    public function getByCategory($category_id, $limit = 10, $offset = 0) {
        $query = "SELECT p.*, c.nome as categoria_nome, m.nome as marca_nome 
                  FROM produtos p
                  LEFT JOIN categorias c ON p.id_categoria = c.id
                  LEFT JOIN marcas m ON p.id_marca = m.id
                  WHERE p.id_categoria = ?
                  ORDER BY p.id DESC
                  LIMIT ? OFFSET ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iii', $category_id, $limit, $offset);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Obter produtos por marca
    public function getByBrand($brand_id, $limit = 10, $offset = 0) {
        $query = "SELECT p.*, c.nome as categoria_nome, m.nome as marca_nome 
                  FROM produtos p
                  LEFT JOIN categorias c ON p.id_categoria = c.id
                  LEFT JOIN marcas m ON p.id_marca = m.id
                  WHERE p.id_marca = ?
                  ORDER BY p.id DESC
                  LIMIT ? OFFSET ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iii', $brand_id, $limit, $offset);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Obter produtos em destaque
    public function getFeatured($limit = 8) {
        $query = "SELECT p.*, c.nome as categoria_nome, m.nome as marca_nome 
                  FROM produtos p
                  LEFT JOIN categorias c ON p.id_categoria = c.id
                  LEFT JOIN marcas m ON p.id_marca = m.id
                  WHERE p.destaque = 1 AND p.status = 'ativo'
                  ORDER BY RAND()
                  LIMIT ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $limit);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Obter produtos em promoção
    public function getOnSale($limit = 8) {
        $query = "SELECT p.*, c.nome as categoria_nome, m.nome as marca_nome 
                  FROM produtos p
                  LEFT JOIN categorias c ON p.id_categoria = c.id
                  LEFT JOIN marcas m ON p.id_marca = m.id
                  WHERE p.preco_promocional > 0 AND p.status = 'ativo'
                  ORDER BY (p.preco - p.preco_promocional) / p.preco DESC
                  LIMIT ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $limit);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Obter novos lançamentos
    public function getNewReleases($limit = 8) {
        $query = "SELECT p.*, c.nome as categoria_nome, m.nome as marca_nome 
                  FROM produtos p
                  LEFT JOIN categorias c ON p.id_categoria = c.id
                  LEFT JOIN marcas m ON p.id_marca = m.id
                  WHERE p.lancamento = 1 AND p.status = 'ativo'
                  ORDER BY p.data_cadastro DESC
                  LIMIT ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $limit);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Pesquisar produtos
    public function search($keyword, $limit = 10, $offset = 0) {
        $keyword = "%$keyword%";
        
        $query = "SELECT p.*, c.nome as categoria_nome, m.nome as marca_nome 
                  FROM produtos p
                  LEFT JOIN categorias c ON p.id_categoria = c.id
                  LEFT JOIN marcas m ON p.id_marca = m.id
                  WHERE (p.nome LIKE ? OR p.descricao_curta LIKE ? OR p.descricao_completa LIKE ?)
                  AND p.status = 'ativo'
                  ORDER BY p.nome ASC
                  LIMIT ? OFFSET ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssii', $keyword, $keyword, $keyword, $limit, $offset);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Criar novo produto
    public function create() {
        // Gerar slug baseado no nome
        $this->slug = $this->generateSlug($this->nome);
        
        $query = "INSERT INTO produtos 
                  (codigo_sku, nome, descricao_curta, descricao_completa, preco, 
                   preco_promocional, estoque, id_categoria, id_marca, 
                   imagem_principal, slug, destaque, lancamento, status) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                  
        $stmt = $this->conn->prepare($query);
        
        // Sanitizar dados
        $this->codigo_sku = htmlspecialchars(strip_tags($this->codigo_sku));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao_curta = htmlspecialchars(strip_tags($this->descricao_curta));
        $this->descricao_completa = $this->descricao_completa; // Pode conter HTML
        $this->preco = (float)$this->preco;
        $this->preco_promocional = $this->preco_promocional ? (float)$this->preco_promocional : null;
        $this->estoque = (int)$this->estoque;
        $this->id_categoria = (int)$this->id_categoria;
        $this->id_marca = (int)$this->id_marca;
        $this->imagem_principal = htmlspecialchars(strip_tags($this->imagem_principal));
        $this->destaque = $this->destaque ? 1 : 0;
        $this->lancamento = $this->lancamento ? 1 : 0;
        
        $stmt->bind_param('ssssddiiississ', 
            $this->codigo_sku, 
            $this->nome, 
            $this->descricao_curta, 
            $this->descricao_completa, 
            $this->preco, 
            $this->preco_promocional, 
            $this->estoque, 
            $this->id_categoria, 
            $this->id_marca, 
            $this->imagem_principal, 
            $this->slug, 
            $this->destaque, 
            $this->lancamento, 
            $this->status
        );
        
        if ($stmt->execute()) {
            $this->id = $this->conn->insert_id;
            return true;
        }
        
        return false;
    }
    
    // Atualizar produto
    public function update() {
        // Se o nome foi alterado, atualizar o slug
        if ($this->nome) {
            $this->slug = $this->generateSlug($this->nome, $this->id);
        }
        
        $query = "UPDATE produtos SET 
                  codigo_sku = ?, 
                  nome = ?, 
                  descricao_curta = ?, 
                  descricao_completa = ?, 
                  preco = ?, 
                  preco_promocional = ?, 
                  estoque = ?, 
                  id_categoria = ?, 
                  id_marca = ?, 
                  imagem_principal = ?, 
                  slug = ?, 
                  destaque = ?, 
                  lancamento = ?, 
                  status = ? 
                  WHERE id = ?";
                  
        $stmt = $this->conn->prepare($query);
        
        // Sanitizar dados
        $this->codigo_sku = htmlspecialchars(strip_tags($this->codigo_sku));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao_curta = htmlspecialchars(strip_tags($this->descricao_curta));
        $this->descricao_completa = $this->descricao_completa; // Pode conter HTML
        $this->preco = (float)$this->preco;
        $this->preco_promocional = $this->preco_promocional ? (float)$this->preco_promocional : null;
        $this->estoque = (int)$this->estoque;
        $this->id_categoria = (int)$this->id_categoria;
        $this->id_marca = (int)$this->id_marca;
        $this->imagem_principal = htmlspecialchars(strip_tags($this->imagem_principal));
        $this->destaque = $this->destaque ? 1 : 0;
        $this->lancamento = $this->lancamento ? 1 : 0;
        
        $stmt->bind_param('ssssddiiissiisi', 
            $this->codigo_sku, 
            $this->nome, 
            $this->descricao_curta, 
            $this->descricao_completa, 
            $this->preco, 
            $this->preco_promocional, 
            $this->estoque, 
            $this->id_categoria, 
            $this->id_marca, 
            $this->imagem_principal, 
            $this->slug, 
            $this->destaque, 
            $this->lancamento, 
            $this->status,
            $this->id
        );
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    // Deletar produto
    public function delete() {
        $query = "DELETE FROM produtos WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    // Gerar slug único
    private function generateSlug($text, $exclude_id = null) {
        // Converter para minúsculas e remover acentos
        $text = $this->removeAccents($text);
        
        // Substituir espaços e caracteres especiais por hífen
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        
        // Remover caracteres indesejados
        $text = preg_replace('~[^-\w]+~', '', $text);
        
        // Remover hífens duplicados
        $text = preg_replace('~-+~', '-', $text);
        
        // Remover hífens do início e fim
        $text = trim($text, '-');
        
        // Converter para minúsculas
        $text = strtolower($text);
        
        // Se estiver vazio, use 'produto'
        if (empty($text)) {
            $text = 'produto';
        }
        
        // Verificar se o slug já existe
        $original_slug = $text;
        $counter = 1;
        
        while ($this->slugExists($text, $exclude_id)) {
            $text = $original_slug . '-' . $counter;
            $counter++;
        }
        
        return $text;
    }
    
    // Verificar se o slug já existe
    private function slugExists($slug, $exclude_id = null) {
        $query = "SELECT id FROM produtos WHERE slug = ?";
        
        if ($exclude_id) {
            $query .= " AND id != ?";
        }
        
        $stmt = $this->conn->prepare($query);
        
        if ($exclude_id) {
            $stmt->bind_param('si', $slug, $exclude_id);
        } else {
            $stmt->bind_param('s', $slug);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->num_rows > 0;
    }
    
    // Remover acentos
    private function removeAccents($string) {
        if (!preg_match('/[\x80-\xff]/', $string)) {
            return $string;
        }

        $chars = [
            // Decomposições para latim-1 Supplement
            chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
            chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
            chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
            chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
            chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
            chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
            chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
            chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
            chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
            chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
            chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
            chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
            chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
            chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
            chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
            chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
            chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
            chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
            chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
            chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
            chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
            chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
            chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
            chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
            chr(195).chr(185) => 'u', chr(195).chr(186) => 'u',
            chr(195).chr(187) => 'u', chr(195).chr(188) => 'u',
            chr(195).chr(189) => 'y', chr(195).chr(191) => 'y',
        ];

        return strtr($string, $chars);
    }
    
    // Obter as especificações do produto
    public function getSpecifications() {
        $query = "SELECT ps.id, e.nome, ps.valor 
                  FROM produto_especificacoes ps
                  JOIN especificacoes e ON ps.id_especificacao = e.id
                  WHERE ps.id_produto = ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Adicionar especificação ao produto
    public function addSpecification($spec_id, $value) {
        $query = "INSERT INTO produto_especificacoes (id_produto, id_especificacao, valor) 
                  VALUES (?, ?, ?)
                  ON DUPLICATE KEY UPDATE valor = ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iiss', $this->id, $spec_id, $value, $value);
        
        return $stmt->execute();
    }
    
    // Obter imagens do produto
    public function getImages() {
        $query = "SELECT id, url, ordem 
                  FROM imagens_produto 
                  WHERE id_produto = ? 
                  ORDER BY ordem ASC";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Adicionar imagem ao produto
    public function addImage($url, $order = 0) {
        $query = "INSERT INTO imagens_produto (id_produto, url, ordem) 
                  VALUES (?, ?, ?)";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('isi', $this->id, $url, $order);
        
        return $stmt->execute();
    }
    
    // Remover imagem do produto
    public function removeImage($image_id) {
        $query = "DELETE FROM imagens_produto 
                  WHERE id = ? AND id_produto = ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $image_id, $this->id);
        
        return $stmt->execute();
    }
    
    // Obter avaliações do produto
    public function getReviews() {
        $query = "SELECT a.*, u.nome as nome_usuario
                  FROM avaliacoes a
                  JOIN usuarios u ON a.id_usuario = u.id
                  WHERE a.id_produto = ? AND a.status = 'aprovada'
                  ORDER BY a.data_avaliacao DESC";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Obter média de avaliações
    public function getAverageRating() {
        $query = "SELECT AVG(nota) as media, COUNT(*) as total
                  FROM avaliacoes 
                  WHERE id_produto = ? AND status = 'aprovada'";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    // Atualizar estoque do produto
    public function updateStock($quantity) {
        $this->estoque += $quantity;
        
        $query = "UPDATE produtos SET estoque = ? WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $this->estoque, $this->id);
        
        return $stmt->execute();
    }
    
    // Verificar se o produto tem estoque disponível
    public function hasStock($quantity = 1) {
        return $this->estoque >= $quantity;
    }
}
