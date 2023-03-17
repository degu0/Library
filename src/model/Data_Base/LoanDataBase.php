<?php

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\Loan;

class LoanDataBase
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }

    public function add(Loan $Loan)
    {
        $comando = "INSERT INTO Emprestimo (FK_id_Livro, FK_id_Pessoa, Data_Entrega, Data_Final) VALUES (?, ?, ?, ?);";
        $nameBook = $Loan->getBook();
        $namePeople = $Loan->getPeople();
        $dateStart = $Loan->getDate();
        $dateFinal = $Loan->getDateFinal();

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "iiss",
            $nameBook,
            $namePeople,
            $dateStart,
            $dateFinal
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getList()
    {
        $comando = "SELECT e.id, p.Nome as Nome_Pessoa, l.Nome as Nome_Livro, e.Data_Entrega, e.Data_Final 
        FROM Emprestimo e 
        INNER JOIN Pessoas p ON p.id = e.FK_id_Pessoa
        INNER JOIN Livros l ON l.id = e.FK_id_Livro;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listLoan = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listLoan[] = new Loan($linha["Nome_Livro"], $linha["Nome_Pessoa"], $linha["Data_Entrega"], $linha["Data_Final"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listLoan;
    }

    public function update(Loan $LoanUpdate)
    {
        $comando = "UPDATE Emprestimo SET FK_id_Livro = ?, FK_id_Pessoa = ?, Data_Entrega = ?, Data_Final = ? WHERE id = ?;";

        $id = $LoanUpdate->getId();
        $book = $LoanUpdate->getBook();
        $people = $LoanUpdate->getPeople();
        $date = $LoanUpdate->getDate();
        $dateFinal = $LoanUpdate->getDateFinal();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "iissi",
            $book,
            $people,
            $date,
            $dateFinal,
            $id
        );
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $this->conexao->fecharConexao();
    }

    public function delete($id)
    {
        $comando = "DELETE FROM Emprestimo WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getLoan($id)
    {
        $comando = "SELECT * FROM Emprestimo WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $Loan = new Loan($linha[""], $linha["Oficio"], $linha["Turma"], $linha["id"]);
        $this->conexao->fecharConexao();
        return $Loan;
    }
}
