<?php
// Página para editar os dados de um aluno já cadastrado

require_once 'config/conexao.php';
require_once 'classes/Aluno.php';

$aluno = new Aluno($conexao);

// Se o formulário foi enviado (POST), atualiza o aluno no banco
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $curso = $_POST['curso'];

    $aluno->atualizar($id, $nome, $ra, $curso);

    header('Location: index.php?msg=atualizado');
    exit;
}

// Se chegou aqui, é porque o usuário clicou em "Editar" (GET)
$id = $_GET['id'];
$dadosAluno = $aluno->buscarPorId($id);

// Se não encontrar o aluno, volta para a lista
if (!$dadosAluno) {
    header('Location: index.php');
    exit;
}

require 'includes/cabecalho.php';
require 'views/form_editar.php';
require 'includes/rodape.php';
