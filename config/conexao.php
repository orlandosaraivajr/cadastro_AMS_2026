<?php
// Arquivo com as informações para conectar no banco de dados
// Em um sistema real, esse arquivo não deve ser enviado para o GitHub

// Dados de acesso ao banco de dados
define('DB_HOST', 'localhost');
define('DB_USUARIO', 'root');
define('DB_SENHA', '123mudar');
define('DB_NOME', 'cadastro_ams');

// Cria a conexão com o banco usando PDO
try {
    $conexao = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NOME . ';charset=utf8',
        DB_USUARIO,
        DB_SENHA
    );

    // Faz com que erros do banco lancem exceções
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar no banco de dados: ' . $e->getMessage());
}
