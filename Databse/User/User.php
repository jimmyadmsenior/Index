<?php
// Arquivo: models/User.php
// Classe para gerenciar os usuários

class User {
    private $conn;
    
    // Propriedades do usuário
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $telefone;
    public $tipo;
    public $status;
    public $data_cadastro;
    public $ultimo_acesso;
    
    // Construtor
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Registrar novo usuário
    public function register() {
        // Verificar se o email já existe
        if ($this->emailExists()) {
            return false;
        }
        
        // Hash da senha
        $hashed_password = password_hash($this->senha, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO usuarios (nome, email, senha, telefone, tipo, status) 
                  VALUES (?, ?, ?, ?, ?, ?)";
                  
        $stmt = $this->conn->prepare($query);
        
        // Sanitizar dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        $this->tipo = $this->tipo ?? 'cliente';
        $this->status = $this->status ?? 'ativo';
        
        $stmt->bind_param('ssssss', 
            $this->nome, 
            $this->email, 
            $hashed_password, 
            $this->telefone, 
            $this->tipo, 
            $this->status
        );
        
        if ($stmt->execute()) {
            $this->id = $this->conn->insert_id;
            return true;
        }
        
        return false;
    }
    
    // Login
    public function login() {
        $query = "SELECT id, nome, email, senha, telefone, tipo, status 
                  FROM usuarios 
                  WHERE email = ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $this->email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            // Verificar status
            if ($row['status'] != 'ativo') {
                return false;
            }
            
            // Verificar senha
            if (password_verify($this->senha, $row['senha'])) {
                // Atualizar último acesso
                $this->updateLastAccess($row['id']);
                
                // Atribuir propriedades
                $this->id = $row['id'];
                $this->nome = $row['nome'];
                $this->email = $row['email'];
                $this->telefone = $row['telefone'];
                $this->tipo = $row['tipo'];
                $this->status = $row['status'];
                
                return true;
            }
        }
        
        return false;
    }
    
    // Verificar se o email já existe
    private function emailExists() {
        $query = "SELECT id FROM usuarios WHERE email = ?";
        
        if ($this->id) {
            $query .= " AND id != ?";
        }
        
        $stmt = $this->conn->prepare($query);
        
        if ($this->id) {
            $stmt->bind_param('si', $this->email, $this->id);
        } else {
            $stmt->bind_param('s', $this->email);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->num_rows > 0;
    }
    
    // Atualizar último acesso
    private function updateLastAccess($id) {
        $query = "UPDATE usuarios SET ultimo_acesso = CURRENT_TIMESTAMP WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        
        return $stmt->execute();
    }
    
    // Obter usuário por ID
    public function getById($id) {
        $query = "SELECT id, nome, email, telefone, tipo, status, data_cadastro, ultimo_acesso 
                  FROM usuarios 
                  WHERE id = ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            $this->id = $row['id'];
            $this->nome = $row['nome'];
            $this->email = $row['email'];
            $this->telefone = $row['telefone'];
            $this->tipo = $row['tipo'];
            $this->status = $row['status'];
            $this->data_cadastro = $row['data_cadastro'];
            $this->ultimo_acesso = $row['ultimo_acesso'];
            
            return true;
        }
        
        return false;
    }
    
    // Atualizar usuário
    public function update() {
        // Verificar se o email já existe
        if ($this->emailExists()) {
            return false;
        }
        
        $query = "UPDATE usuarios SET 
                  nome = ?, 
                  email = ?, 
                  telefone = ?, 
                  tipo = ?, 
                  status = ? 
                  WHERE id = ?";
                  
        $stmt = $this->conn->prepare($query);
        
        // Sanitizar dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->telefone = htmlspecialchars(strip_tags($this->telefone));
        
        $stmt->bind_param('sssssi', 
            $this->nome, 
            $this->email, 
            $this->telefone, 
            $this->tipo, 
            $this->status, 
            $this->id
        );
        
        if ($stmt->execute()) {
            return true;
        }
        
        return false;
    }
    
    // Alterar senha
    public function changePassword($new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        $query = "UPDATE usuarios SET senha = ? WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $hashed_password, $this->id);
        
        return $stmt->execute();
    }
    
    // Adicionar endereço
    public function addAddress($cep, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $tipo, $padrao = false) {
        // Se for definido como padrão, desmarcar outros endereços como padrão
        if ($padrao) {
            $this->unsetDefaultAddresses($tipo);
        }
        
        $query = "INSERT INTO enderecos 
                  (id_usuario, cep, logradouro, numero, complemento, bairro, cidade, estado, tipo, padrao) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                  
        $stmt = $this->conn->prepare($query);
        
        // Sanitizar dados
        $cep = htmlspecialchars(strip_tags($cep));
        $logradouro = htmlspecialchars(strip_tags($logradouro));
        $numero = htmlspecialchars(strip_tags($numero));
        $complemento = htmlspecialchars(strip_tags($complemento));
        $bairro = htmlspecialchars(strip_tags($bairro));
        $cidade = htmlspecialchars(strip_tags($cidade));
        $estado = htmlspecialchars(strip_tags($estado));
        $padrao = $padrao ? 1 : 0;
        
        $stmt->bind_param('issssssssi', 
            $this->id, 
            $cep, 
            $logradouro, 
            $numero, 
            $complemento, 
            $bairro, 
            $cidade, 
            $estado, 
            $tipo, 
            $padrao
        );
        
        return $stmt->execute();
    }
    
    // Desmarcar endereços padrão
    private function unsetDefaultAddresses($tipo) {
        $query = "UPDATE enderecos SET padrao = 0 
                  WHERE id_usuario = ? AND (tipo = ? OR tipo = 'ambos')";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is', $this->id, $tipo);
        
        return $stmt->execute();
    }
    
    // Obter endereços do usuário
    public function getAddresses() {
        $query = "SELECT * FROM enderecos WHERE id_usuario = ? ORDER BY padrao DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    
    // Obter endereço padrão
    public function getDefaultAddress($tipo = 'entrega') {
        $query = "SELECT * FROM enderecos 
                  WHERE id_usuario = ? AND (tipo = ? OR tipo = 'ambos') AND padrao = 1 
                  LIMIT 1";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is', $this->id, $tipo);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        // Se não houver endereço padrão, retorna o primeiro encontrado
        $query = "SELECT * FROM enderecos 
                  WHERE id_usuario = ? AND (tipo = ? OR tipo = 'ambos') 
                  LIMIT 1";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is', $this->id, $tipo);
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return null;
    }
    
    // Excluir endereço
    public function deleteAddress($address_id) {
        $query = "DELETE FROM enderecos 
                  WHERE id = ? AND id_usuario = ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $address_id, $this->id);
        
        return $stmt->execute();
    }
    
    // Definir endereço como padrão
    public function setDefaultAddress($address_id, $tipo) {
        // Primeiro, desmarcar outros endereços como padrão
        $this->unsetDefaultAddresses($tipo);
        
        // Depois, marcar o endereço selecionado como padrão
        $query = "UPDATE enderecos SET padrao = 1 
                  WHERE id = ? AND id_usuario = ?";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $address_id, $this->id);
        
        return $stmt->execute();
    }
}
?>