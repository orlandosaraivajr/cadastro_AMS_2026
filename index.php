<?php
// Página inicial: mostra a lista de alunos cadastrados

require_once 'config/conexao.php';
require_once 'classes/Aluno.php';

// Cria o objeto aluno e busca todos os registros
$aluno = new Aluno($conexao);
$alunos = $aluno->listarTodos();

require 'includes/cabecalho.php';
require 'views/lista.php';
require 'includes/rodape.php';
