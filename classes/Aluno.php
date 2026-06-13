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

    // Retorna o maior RA numérico já cadastrado
    public function obterUltimoRa()
    {
        $sql = "SELECT COALESCE(MAX(CAST(ra AS UNSIGNED)), 0) AS ultimo_ra FROM alunos";
        $stmt = $this->conexao->query($sql);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return isset($resultado['ultimo_ra']) ? (int) $resultado['ultimo_ra'] : 0;
    }

    // Retorna o próximo RA sequencial esperado
    public function obterProximoRa()
    {
        return $this->obterUltimoRa() + 1;
    }

    // Valida o RA para novos cadastros: apenas números, tamanho limitado e sequência correta
    public function validarRaSequencial($ra)
    {
        $ra = trim((string) $ra);

        if ($ra === '') {
            return [
                'valido' => false,
                'mensagem' => 'Informe o RA.',
                'ra' => '',
            ];
        }

        if (!ctype_digit($ra)) {
            return [
                'valido' => false,
                'mensagem' => 'O RA deve conter apenas números.',
                'ra' => $ra,
            ];
        }

        if (strlen($ra) > 20) {
            return [
                'valido' => false,
                'mensagem' => 'O RA deve ter no máximo 20 caracteres.',
                'ra' => $ra,
            ];
        }

        $raNumero = (int) $ra;

        if ($raNumero <= 0) {
            return [
                'valido' => false,
                'mensagem' => 'O RA deve ser maior que zero.',
                'ra' => $ra,
            ];
        }

        $raEsperado = $this->obterProximoRa();

        if ($raNumero !== $raEsperado) {
            return [
                'valido' => false,
                'mensagem' => 'O próximo RA deve ser ' . $raEsperado . ', com base no maior RA já cadastrado.',
                'ra' => (string) $raNumero,
                'esperado' => $raEsperado,
            ];
        }

        return [
            'valido' => true,
            'mensagem' => '',
            'ra' => (string) $raNumero,
            'esperado' => $raEsperado,
        ];
    }

    // Cadastrar um novo aluno (INSERT)
    public function cadastrar($nome, $ra, $curso)
    {
        $sql = "INSERT INTO alunos (nome, ra, curso) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([$nome, $ra, $curso]);
    }

    // Listar todos os alunos cadastrados (SELECT)
    public function listarTodos()
    {
        $sql = "SELECT id, nome, ra, curso FROM alunos ORDER BY nome";
        $stmt = $this->conexao->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar um aluno pelo id (SELECT)
    public function buscarPorId($id)
    {
        $sql = "SELECT id, nome, ra, curso FROM alunos WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar os dados de um aluno (UPDATE)
    public function atualizar($id, $nome, $ra, $curso)
    {
        $sql = "UPDATE alunos SET nome = ?, ra = ?, curso = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([$nome, $ra, $curso, $id]);
    }

    // Excluir um aluno (DELETE)
    public function excluir($id)
    {
        $sql = "DELETE FROM alunos WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        return $stmt->execute([$id]);
    }
}
