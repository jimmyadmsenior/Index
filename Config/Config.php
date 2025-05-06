<?php
// Arquivo: config.php
// Configurações de conexão com o banco de dados

// Defina as credenciais do banco de dados
$db_host = 'localhost';     // Host do banco de dados (geralmente localhost em desenvolvimento)
$db_user = 'root';          // Nome de usuário do MySQL (padrão é root)
$db_password = '';          // Senha do MySQL (vazio para configuração padrão)
$db_name = 'tech_store';    // Nome do banco de dados

// Estabelece a conexão com o banco de dados
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Define o charset para UTF-8
$conn->set_charset("utf8mb4");

// Função para executar consultas de forma segura
function executeQuery($sql, $conn) {
    $result = $conn->query($sql);
    if (!$result) {
        die("Erro na execução da consulta: " . $conn->error . "<br>SQL: $sql");
    }
    return $result;
}

// Função para escapar strings (evita SQL Injection)
function escape_string($string, $conn) {
    return $conn->real_escape_string($string);
}

// Retorna a conexão para ser usada em outros arquivos
return $conn;
?>