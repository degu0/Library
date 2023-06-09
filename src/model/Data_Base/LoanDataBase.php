<?php

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\Loan;
use Library_ETE\model\Book;
use Library_ETE\model\Student;
use Library_ETE\model\Image;
use Library_ETE\model\User;

class LoanDataBase
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function adicionar(Loan $emprestimo)
    {
        $comando = "INSERT INTO emprestimo (FK_id_Aluno, FK_id_Livro, Data_Entrega, Data_Final) VALUES(?, ?, ?, ?)";
        $aluno = $emprestimo->getAluno();
        $livro = $emprestimo->getLivro();
        $data_inicial = $emprestimo->getDataInicial();
        $data_final = date('Y/m/d', strtotime('+8 days', strtotime($data_inicial)));

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "iiss",
            $aluno,
            $livro,
            $data_inicial,
            $data_final
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getLoan()
    {
        $comando = "SELECT e.id, e.Data_Entrega, e.Data_Final, l.titulo, l.id_livro, a.matricula, a.FK_id_usuario, u.nome, u.email, u.tipo_usuario FROM
        emprestimo e
        INNER JOIN usuario_aluno a ON a.id= e.FK_ID_Aluno
        INNER JOIN livro l ON l.id_livro = e.FK_ID_Livro
        INNER JOIN usuario u ON u.id_usuario = a.FK_id_usuario
        ORDER BY Data_Final;";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        $listLoan = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image('null', 'null', 'null');
            $user = new User($linha['nome'], $linha['email'], 'null', 'null', $linha['tipo_usuario']);
            $livro = new Book($linha['titulo'], $imagem, null, null, null, null, null, $linha['id_livro']);
            $aluno = new Student($user, $linha['matricula'], null, null, $linha['FK_id_usuario']);
            $listLoan[] = new Loan($aluno, $livro, $linha['Data_Entrega'], $linha['Data_Final'], $linha['id']);
        }
        $this->conexao->fecharConexao();

        return $listLoan;
    }

    public function delete($id)
    {
        $comando = "DELETE FROM emprestimo WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getDate($id)
    {
        $comando = "SELECT Data_Final FROM emprestimo WHERE id = ?;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        while ($linha = $resultado->fetch_assoc()) {
            return $linha['Data_Final'];
        }
    }

    public function updateDate($id, $dataInicial)
    {
        $comando = "UPDATE `emprestimo` SET `data_final` = ? WHERE (`id` = ?);";
        $data_final = date('Y/m/d', strtotime('+8 days', strtotime($dataInicial)));
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("si", $data_final, $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }
    }

    public function queryLoan($id)
    {
        $comando = "SELECT e.id, e.Data_Entrega, e.Data_Final, l.titulo, l.id_livro, a.matricula, a.FK_id_usuario, u.nome, u.email, u.tipo_usuario FROM
        emprestimo e
        INNER JOIN usuario_aluno a ON a.id = e.FK_ID_Aluno
        INNER JOIN livro l ON l.id_livro = e.FK_ID_Livro
        INNER JOIN usuario u ON u.id_usuario = a.FK_ID_Usuario
        WHERE e.id = ?;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $listLoan = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image('null', 'null', 'null');
            $user = new User($linha['nome'], $linha['email'], 'null', 'null', $linha['tipo_usuario']);
            $livro = new Book($linha['titulo'], $imagem, null, null, null, null, null, $linha['id_livro']);
            $aluno = new Student($user, $linha['matricula'], null, null, $linha['FK_id_usuario']);
            $listLoan[] = new Loan($aluno, $livro, $linha['Data_Entrega'], $linha['Data_Final'], $linha['id']);
        }

        $this->conexao->fecharConexao();
        return $listLoan;
    }

    public function updateLoan(Loan $updateLoan)
    {
        $comando = "UPDATE `emprestimo` SET `Data_Entrega` = ?, `Data_Final` = ?, `FK_id_Livro` = ?, `FK_id_Aluno` = ? WHERE (`id` = ?);";

        $id = $updateLoan->getId();
        $data_inicial = $updateLoan->getDataInicial();
        $data_final = date('Y/m/d', strtotime('+8 days', strtotime($data_inicial)));
        $idLivro = $updateLoan->getLivro();
        $idAluno = $updateLoan->getAluno();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "ssiii",
            $data_inicial,
            $data_final,
            $idLivro,
            $idAluno,
            $id
        );
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $this->conexao->fecharConexao();
    }
    public function queryLoanStudent($id_aluno)
    {
        $comando = "SELECT e.id, e.Data_Entrega, e.Data_Final, l.titulo, l.id_livro, a.matricula, a.FK_id_usuario, u.nome, u.email, u.tipo_usuario FROM
        emprestimo e
        INNER JOIN usuario_aluno a ON a.id = e.FK_ID_Aluno
        INNER JOIN livro l ON l.id_livro = e.FK_ID_Livro
        INNER JOIN usuario u ON u.id_usuario = a.FK_ID_Usuario
        WHERE a.FK_id_usuario = ?
        ORDER BY Data_Entrega DESC;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id_aluno);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $listLoan = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image('null', 'null', 'null');
            $user = new User($linha['nome'], $linha['email'], 'null', 'null', $linha['tipo_usuario']);
            $livro = new Book($linha['titulo'], $imagem, null, null, null, null, null, $linha['id_livro']);
            $aluno = new Student($user, $linha['matricula'], null, null, $linha['FK_id_usuario']);
            $listLoan[] = new Loan($aluno, $livro, $linha['Data_Entrega'], $linha['Data_Final'], $linha['id']);
        }

        $this->conexao->fecharConexao();
        return $listLoan;
    }

    public function queryLastLoan()
    {
        $comando = "SELECT e.id, e.Data_Entrega, e.Data_Final, l.titulo, l.id_livro, a.matricula, a.FK_id_usuario, u.nome, u.email, u.tipo_usuario FROM
        emprestimo e
        INNER JOIN usuario_aluno a ON a.id = e.FK_ID_Aluno
        INNER JOIN livro l ON l.id_livro = e.FK_ID_Livro
        INNER JOIN usuario u ON u.id_usuario = a.FK_ID_Usuario
        ORDER BY id DESC LIMIT 1;";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        $listLoan = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image('null', 'null', 'null');
            $user = new User($linha['nome'], $linha['email'], 'null', 'null', $linha['tipo_usuario']);
            $livro = new Book($linha['titulo'], $imagem, null, null, null, null, null, $linha['id_livro']);
            $aluno = new Student($user, $linha['matricula'], null, null, $linha['FK_id_usuario']);
            $listLoan[] = new Loan($aluno, $livro, $linha['Data_Entrega'], $linha['Data_Final'], $linha['id']);
        }

        $this->conexao->fecharConexao();
        return $listLoan;
    }

    public function verificationStudent($idAluno)
    {
        $comando = "SELECT * FROM emprestimo WHERE FK_id_aluno = ?;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $idAluno);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        $linha = $resultado->fetch_assoc();
        if ($linha['id']) {
            return true;
        }else {
            return false;
        }
    }

    public function verificacaoDeEmprestimo($idAluno, $idLivro)
    {
        $comando = "SELECT id FROM emprestimo where FK_ID_Livro = ? and FK_ID_Aluno = ?;";

        $resultado = $this->conexao->mysqli->prepare($comando);
        $resultado->bind_param('ii', $idLivro, $idAluno);
        $resultado->execute();

        $resultado2 = $resultado->get_result();
        $linha = $resultado2->fetch_assoc();
        if ($linha['id']) {
            return true;
        }else {
            return false;
        }
    }
}
