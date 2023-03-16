<?php

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\People;

class PeopleDataBase
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }

    public function add(People $People)
    {
        $comando = "INSERT INTO Pessoas (Nome, Oficio, Turma) VALUES (?, ?, ?);";
        $name = $People->getName();
        $trade = $People->getTrade();
        $class = $People->getClass();

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "sss",
            $name,
            $trade,
            $class
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
        $comando = "SELECT * FROM Pessoas;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listPeople = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listPeople[] = new People($linha["Nome"], $linha["Oficio"], $linha["Turma"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listPeople;
    }

    public function update(People $PeopleUpdate)
    {
        $comando = "UPDATE Pessoas SET Nome = ?, Oficio = ?, Turma = ? WHERE id = ?;";

        $id = $PeopleUpdate->getId();
        $name = $PeopleUpdate->getName();
        $trade = $PeopleUpdate->getTrade();
        $class = $PeopleUpdate->getClass();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "sssi",
            $name,
            $trade,
            $class,
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
        $comando = "DELETE FROM Pessoas WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getPeople($id)
    {
        $comando = "SELECT * FROM Pessoas WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $people = new People($linha["Nome"], $linha["Oficio"], $linha["Turma"], $linha["id"]);
        $this->conexao->fecharConexao();
        return $people;
    }

    public function getNamePeople()
    {
        $comando = "SELECT id,Nome FROM Pessoas;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listName = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listName[] = new People($linha["Nome"], null, null, $linha["id"]);
        }

        return $listName;
    }
}
