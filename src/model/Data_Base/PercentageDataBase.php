<?php

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\Percentage;

class PercentageDataBase
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }

    public function add(Percentage $Percentage)
    {
        $comando = "INSERT INTO Percentual (FK_id_Livro, Ano_Escolar, Serie_Escolar, `Status`, Quantidade, Ano) VALUES (?, ?, ?, ?, ?, ?);";
        $nameBook = $Percentage->getBook();
        $anoEscolar = $Percentage->getAnoEscolar();
        $serieEscolar = $Percentage->getSerieEscolar();
        $status = $Percentage->getStatus();
        $quantidade = $Percentage->getQuantidade();
        $ano = date('Y', strtotime($Percentage->getAno()));

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "isssis",
            $nameBook,
            $anoEscolar,
            $serieEscolar,
            $status,
            $quantidade,
            $ano
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
        $comando = "SELECT p.id, l.Nome as Nome_Livro, p.Ano_Escolar, p.Serie_Escolar, p.Status, p.Quantidade, p.Ano 
        FROM Percentual p 
        INNER JOIN Livros l ON l.id = p.FK_id_Livro
        ORDER BY Nome_Livro, Ano_Escolar, Serie_Escolar, `Status`;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listPercentage = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listPercentage[] = new Percentage($linha["Nome_Livro"], $linha["Ano_Escolar"], $linha["Serie_Escolar"], $linha["Status"], $linha["Quantidade"], $linha["Ano"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listPercentage;
    }

    public function update(Percentage $PercentageUpdate)
    {
        $comando = "UPDATE Percentual SET FK_id_Livro = ?, Ano_Escolar = ?, Serie_Escolar = ?, `Status` = ?, Quantidade = ?, Ano = ?
        WHERE id = ?;";

        $id = $PercentageUpdate->getId();
        $book = $PercentageUpdate->getBook();
        $anoEscolar = $PercentageUpdate->getAnoEscolar();
        $serieEscolar = $PercentageUpdate->getSerieEscolar();
        $status = $PercentageUpdate->getStatus();
        $quantidade = $PercentageUpdate->getQuantidade();
        $ano = date('Y', strtotime($PercentageUpdate->getAno()));

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "isssis",
            $book,
            $anoEscolar,
            $serieEscolar,
            $status,
            $quantidade,
            $ano,
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
        $comando = "DELETE FROM Percentual WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getPercentage($id)
    {
        $comando = "SELECT p.id, l.Nome as Nome_Livro, p.Ano_Escolar, p.Serie_Escolar, p.Status, p.Quantidade, p.Ano 
        FROM Percentual p 
        INNER JOIN Livros l ON l.id = p.FK_id_Livro
        WHERE p.id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $Percentage = new Percentage($linha["Nome_Livro"], $linha["Ano_Escolar"], $linha["Serie_Escolar"], $linha["Status"], $linha["Quantidade"], $linha["Ano"], $linha["id"]);
        $this->conexao->fecharConexao();
        return $Percentage;
    }

    public function graficoBook($ano)
    {
        $comando = "SELECT p.id, l.Nome as Nome_Livro, p.Ano_Escolar, p.Serie_Escolar, p.Quantidade, p.`Status`, p.Ano
        FROM Percentual p
        INNER JOIN Livros l on l.id = p.FK_id_Livro
        WHERE Ano_Escolar = ?
        ORDER BY Nome_Livro, Ano_Escolar, Serie_Escolar, `Status`;";

        
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("s", $ano);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $listPercentage = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listPercentage[] = new Percentage($linha["Nome_Livro"], $linha["Ano_Escolar"], $linha["Serie_Escolar"], $linha["Status"], $linha["Quantidade"], $linha["Ano"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listPercentage;
    }

}
