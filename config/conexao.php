<?php
// Arquivo com as informações para conectar no banco de dados
// Em um sistema real, esse arquivo não deve ser enviado para o GitHub

// Dados de acesso ao banco de dados
define('DB_HOST', 'localhost');
define('DB_USUARIO', 'root');
define('DB_SENHA', '123mudar');
define('DB_NOME', 'cadastro_ams');

// Cria a conexão com o banco usando mysqli
$conexao = new mysqli(DB_HOST, DB_USUARIO, DB_SENHA, DB_NOME);

// Verifica se a conexão deu certo
if ($conexao->connect_error) {
    die('Erro ao conectar no banco de dados: ' . $conexao->connect_error);
}

// Define o charset para evitar problemas com acentuação
$conexao->set_charset('utf8');
