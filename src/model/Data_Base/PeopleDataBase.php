<?php 

namespace Library_ETE\model\BD;

use Library_ETE\model\BD\Conexao;
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
        $comando = "INSERT INTO Pessoa (Nome, Oficio, Turma) VALUES (?, ?, ?);";
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

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getList()
    {
        $comando = "SELECT * FROM Pessoa;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listPeople = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listPeople[] = new People($linha["Nome"], $linha["Ofico"], $linha["Turma"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listPeople;
    }
}