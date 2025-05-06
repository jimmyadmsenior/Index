<?php
// Arquivo: models/Order.php
// Classe para gerenciar os pedidos

class Order {
    private $conn;
    
    // Propriedades do pedido
    public $id;
    public $id_usuario;
    public $codigo_pedido;
    public $status;
    public $valor_total;
    public $valor_frete;
    public $id_endereco_entrega;
    public $metodo_pagamento;
    public $codigo_rastreio;
    public $observacoes;
    public $data_pedido;
    public $data_atualizacao;
    
    // Construtor
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Criar novo pedido
    public function create() {
        // Gerar código único de pedido
        $this->codigo_pedido = $this->generateOrderCode();
        
        $query = "INSERT INTO pedidos 
                  (id_usuario, codigo_pedido, status, valor_total, valor_frete, 
                   id_endereco_entrega, metodo_pagamento, observacoes) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                  
        $stmt = $this->conn->prepare($query);
        
        // Sanitizar dados
        $this->id_usuario = (int)$this->id_usuario;
        $this->valor_total = (float)$this->valor_total;
        $this->valor_frete = (float)$this->valor_frete;
        $this->id_endereco_entrega = (int)$this->id_endereco_entrega;
        $this->metodo_pagamento = htmlspecialchars(strip_tags($this->metodo_pagamento));
        $this->observacoes = htmlspecialchars(strip_tags($this->observacoes));
        $this->status = $this->status ?? 'aguardando_pagamento';
        
        $stmt->bind_param('issddsss', 
            $this->id_usuario, 
            $this->codigo_pedido, 
            $this->status, 
            $this->valor_total, 
            $this->valor_frete, 
            $this->id_endereco_entrega, 
            $this->metodo_pagamento, 
            $this->observacoes
        );
        
        if ($stmt->execute()) {
            $this->id = $this->conn->insert_id;
            return true;
        }
        
        return false;
    }
    
    // Gerar código de pedido único
    private function generateOrderCode() {
        $prefix = 'TS'; // Tech Store
        $date = date('Ymd');
        $random = mt_rand(1000, 9999);
        
        $code = $prefix . $date . $random;
        
        // Verificar se o código já existe
        while ($this->orderCodeExists($code)) {
            $random = mt_rand(1000, 9999);
            $code = $prefix . $date . $random;
        }
        
        return $code;
    }
    
    // Verificar se o código de pedido já existe
    private function orderCodeExists($code) {
        $query = "SELECT id FROM pedidos WHERE codigo_pedido = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $code);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        return $result->num_rows > 0;
    }
    
    // Adicionar item ao pedido
    public function addItem($product_id, $quantity, $price) {
        $query = "INSERT INTO itens_pedido (id_pedido, id_produto, quantidade, preco_unitario) 
                  VALUES (?, ?, ?, ?)";
                  
        $stmt = $this->conn->prepare($query);
        
        $product_id = (int)$product_id;
        $quantity = (int)$quantity;
        $price = (float)$price;
        
        $stmt->bind_param('iiid', $this->id, $product_id, $quantity, $price);
        
        // Atualizar estoque do produto
        if ($stmt->execute()) {
            // Carregar classe de produto
            require_once 'Product.php';
            $product = new Product($this->conn);
            $product->getById($product_id);
            
            // Atualizar estoque (diminuir a quantidade)
            $product->updateStock(-$quantity);
            
            return true;
        }
        
        return false;
    }
    
    // Atualizar status do pedido
    public function updateStatus($status) {
        $this->status = htmlspecialchars(strip_tags($status));
        
        $query = "UPDATE pedidos SET status = ? WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $this->status, $this->id);
        
        return $stmt->execute();
    }
    
    // Atualizar código de rastreio
    public function updateTrackingCode($code) {
        $this->codigo_rastreio = htmlspecialchars(strip_tags($code));
        
        $query = "UPDATE pedidos SET codigo_rastreio = ? WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $this->codigo_rastreio, $this->id);
        
        return $stmt->execute();
    }
    
    // Cancelar pedido
    public function cancel() {
        // Obter itens do pedido para restaurar estoque
        $items = $this->getItems();
        
        // Restaurar estoque
        require_once 'Product.php';
        $product = new Product($this->conn);
        
        while ($item = $items->fetch_assoc()) {
            $product->getById($item['id_produto']);
            $product->updateStock($item['quantidade']);
        }
        
        // Atualizar status para cancelado
        return $this->updateStatus('cancelado');
    }
    
    // Obter itens do pedido
    public function getItems() {
        $query = "SELECT ip.*, p.nome, p.imagem_principal
                  FROM itens_pedido ip
                  JOIN produtos p ON ip.id_produto = p.id
                  WHERE ip.id_pedido = ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Obter pedido por ID
    public function getById($id) {
        $query = "SELECT * FROM pedidos WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            $this->id = $row['id'];
            $this->id_usuario = $row['id_usuario'];
            $this->codigo_pedido = $row['codigo_pedido'];
            $this->status = $row['status'];
            $this->valor_total = $row['valor_total'];
            $this->valor_frete = $row['valor_frete'];
            $this->id_endereco_entrega = $