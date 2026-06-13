<?php
// Página para editar os dados de um aluno já cadastrado

require_once 'config/conexao.php';
require_once 'classes/Aluno.php';

$aluno = new Aluno($conexao);
$erro = '';

// Primeiro identifica o aluno para poder manter o RA original imutável
$id = $_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST['id'] : $_GET['id'];
$dadosAluno = $aluno->buscarPorId($id);

// Se não encontrar o aluno, volta para a lista
if (!$dadosAluno) {
    header('Location: index.php');
    exit;
}

// Se o formulário foi enviado (POST), atualiza o aluno no banco
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $curso = trim($_POST['curso']);
    $ra = $dadosAluno['ra'];

    $aluno->atualizar($id, $nome, $ra, $curso);

    header('Location: index.php?msg=atualizado');
    exit;
}

require 'includes/cabecalho.php';
require 'views/form_editar.php';
require 'includes/rodape.php';
