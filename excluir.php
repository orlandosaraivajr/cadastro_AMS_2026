<?php
// Página que exclui um aluno do banco de dados

require_once 'config/conexao.php';
require_once 'classes/Aluno.php';

$aluno = new Aluno($conexao);

$id = $_GET['id'];
$aluno->excluir($id);

header('Location: index.php?msg=excluido');
exit;
