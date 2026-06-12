<?php
// Página para cadastrar um novo aluno

require_once 'config/conexao.php';
require_once 'classes/Aluno.php';

$aluno = new Aluno($conexao);

// Se o formulário foi enviado (POST), salva o aluno no banco
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $curso = $_POST['curso'];

    $aluno->cadastrar($nome, $ra, $curso);

    // Depois de salvar, volta para a lista de alunos
    header('Location: index.php?msg=cadastrado');
    exit;
}

require 'includes/cabecalho.php';
require 'views/form_cadastro.php';
require 'includes/rodape.php';
