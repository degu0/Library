<?php

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\History;
use Library_ETE\model\Loan;
use Library_ETE\model\Book;
use Library_ETE\model\Student;
use Library_ETE\model\Image;
use Library_ETE\model\User;
use Library_ETE\model\Request;

class RequestDataBase
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function request(Request $emprestimo)
    {
        $comando = "INSERT INTO `library`.`solicitacao_Emprestimo` (`FK_id_Livro`, `FK_id_Aluno`) VALUES (?, ?);";
        $aluno = $emprestimo->getAluno();
        $livro = $emprestimo->getLivro();

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "ii",
            $livro,
            $aluno
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getRequest()
    {
        $comando = "SELECT s.id, l.id_livro, l.titulo, a.id, u.nome  FROM solicitacao_emprestimo s
        INNER JOIN livro l ON l.id_livro = s.FK_id_Livro
        INNER JOIN usuario_aluno a ON a.id = s.FK_id_Aluno
        INNER JOIN usuario u ON a.FK_id_usuario = u.id_usuario;";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        $listaSolicitacao = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image('null', 'null', 'null');
            $user = new User($linha['nome'], 'null', 'null', 'null', 'null');
            $livro = new Book($linha['titulo'], $imagem, null, null, null, null, null, $linha['id_livro']);
            $aluno = new Student($user, null, null, null, $linha['id']);
            $listaSolicitacao[] = new Request($livro, $aluno, $linha['id']);
        }
        $this->conexao->fecharConexao();

        return $listaSolicitacao;
    }
}
