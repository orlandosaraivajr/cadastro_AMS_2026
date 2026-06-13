<?php
// Página para cadastrar um novo aluno

require_once 'config/conexao.php';
require_once 'classes/Aluno.php';

$aluno = new Aluno($conexao);
$erro = '';
$proximoRa = $aluno->obterProximoRa();
$valores = [
    'nome' => '',
    'ra' => $proximoRa,
    'curso' => '',
];

// Se o formulário foi enviado (POST), salva o aluno no banco
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valores['nome'] = trim($_POST['nome']);
    $valores['ra'] = $_POST['ra'];
    $valores['curso'] = trim($_POST['curso']);

    $validacaoRa = $aluno->validarRaSequencial($valores['ra']);

    if (!$validacaoRa['valido']) {
        $erro = $validacaoRa['mensagem'];
        $valores['ra'] = $validacaoRa['ra'];
    } else {
        $valores['ra'] = $validacaoRa['ra'];

        $aluno->cadastrar($valores['nome'], $valores['ra'], $valores['curso']);

        // Depois de salvar, volta para a lista de alunos
        header('Location: index.php?msg=cadastrado');
        exit;
    }
}

require 'includes/cabecalho.php';
require 'views/form_cadastro.php';
require 'includes/rodape.php';
