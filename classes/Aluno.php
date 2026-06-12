<?php
// Classe que representa um Aluno e cuida do CRUD na tabela "alunos"
class Aluno
{
    // Atributos do aluno
    public $id;
    public $nome;
    public $ra;
    public $curso;

    // Conexão com o banco de dados
    private $conexao;

    // O construtor recebe a conexão criada no arquivo conexao.php
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    // Cadastrar um novo aluno (INSERT)
    public function cadastrar($nome, $ra, $curso)
    {
        $sql = "INSERT INTO alunos (nome, ra, curso) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param('sss', $nome, $ra, $curso);
        return $stmt->execute();
    }

    // Listar todos os alunos cadastrados (SELECT)
    public function listarTodos()
    {
        $sql = "SELECT id, nome, ra, curso FROM alunos ORDER BY nome";
        $resultado = $this->conexao->query($sql);

        $alunos = [];
        while ($linha = $resultado->fetch_assoc()) {
            $alunos[] = $linha;
        }

        return $alunos;
    }

    // Buscar um aluno pelo id (SELECT)
    public function buscarPorId($id)
    {
        $sql = "SELECT id, nome, ra, curso FROM alunos WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    // Atualizar os dados de um aluno (UPDATE)
    public function atualizar($id, $nome, $ra, $curso)
    {
        $sql = "UPDATE alunos SET nome = ?, ra = ?, curso = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param('sssi', $nome, $ra, $curso, $id);
        return $stmt->execute();
    }

    // Excluir um aluno (DELETE)
    public function excluir($id)
    {
        $sql = "DELETE FROM alunos WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
