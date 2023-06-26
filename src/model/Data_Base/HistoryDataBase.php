<?php

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\History;
use Library_ETE\model\Loan;
use Library_ETE\model\Book;
use Library_ETE\model\Student;
use Library_ETE\model\Image;
use Library_ETE\model\User;

class HistoryDataBase
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }

    public function adicionar(Loan $emprestimo)
    {
        $comando = "INSERT INTO historico (FK_id_Aluno, FK_id_Livro, Data_Emprestimo, Data_Devolucao, `Status`, Adiamento) VALUES(?, ?, ?, ?, ?, ?)";
        $aluno = $emprestimo->getAluno();
        $livro = $emprestimo->getLivro();
        $data_inicial = $emprestimo->getDataInicial();
        $data_final = date('Y/m/d', strtotime('+8 days', strtotime($data_inicial)));
        $status = 'espera';
        $adiamento = 0;

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "iisssi",
            $aluno,
            $livro,
            $data_inicial,
            $data_final,
            $status,
            $adiamento
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function alunoAdicionar(Loan $emprestimo)
    {
        $comando = "INSERT INTO historico (FK_id_Aluno, FK_id_Livro, Data_Emprestimo, Data_Devolucao, `Status`, Adiamento) VALUES(?, ?, ?, ?, ?, ?)";
        $aluno = $emprestimo->getAluno();
        $livro = $emprestimo->getLivro();
        $data_inicial = date('Y/m/d');
        $data_final = date('Y/m/d', strtotime('+8 days', strtotime($data_inicial)));
        $status = 'espera';
        $adiamento = 0;

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "iisssi",
            $aluno,
            $livro,
            $data_inicial,
            $data_final,
            $status,
            $adiamento
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getHistory()
    {
        $comando = "SELECT h.id, h.Data_Emprestimo, h.Data_Devolucao, h.adiamento, h.`status`, 
        l.id_livro, l.titulo, a.FK_id_usuario, a.matricula, u.nome  FROM historico h
                INNER JOIN livro l ON l.id_livro = h.FK_id_Livro
                INNER JOIN usuario_aluno a ON a.id = h.FK_id_Aluno
                INNER JOIN usuario u ON a.FK_id_usuario = u.id_usuario
                ORDER BY Data_Devolucao DESC, `status`;";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        $listahistorico = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image('null', 'null', 'null');
            $user = new User($linha['nome'], 'null', 'null', 'null', 'null');
            $livro = new Book($linha['titulo'], $imagem, null, null, null, null, null, $linha['id_livro']);
            $aluno = new Student($user, $linha['matricula'], null, null, $linha['FK_id_usuario']);
            $listahistorico[] = new History($aluno, $livro, $linha['Data_Emprestimo'], $linha['Data_Devolucao'], $linha['adiamento'], $linha['status'], $linha['id']);
        }
        $this->conexao->fecharConexao();

        return $listahistorico;
    }

    public function devolucao($id)
    {
        $comando = "UPDATE `historico` SET `Status` = 'entregue' WHERE (`id` = ?);";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }
    }

    public function adiamento($id)
    {
        $comando = "UPDATE `historico` SET `Adiamento` = `Adiamento`+ 1 WHERE (`id` = ?);";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }
    }
}
