<?php 

namespace Library_ETE\model\BD;

use Library_ETE\model\BD\Conexao;
use Library_ETE\model\Book;

class BookDataBase 
{
    private $conexao;

    public function __construct()
    {
       $this->conexao = new Conexao; 
    }  

    public function add(Book $Book)
    {
        $comando = "INSERT INTO Livro (Nome, Classificacao, Quantidade) VALUES (?, ?, ?);";
        $name = $Book->getName();
        $classification = $Book->getClassification();
        $quantity = $Book->getQuantity();

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "ssi",
            $name,
            $classification,
            $quantity
        );

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getList()
    {
        $comando = "SELECT * FROM Livro;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listBook = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listBook[] = new Book($linha["Nome"], $linha["Classificacao"], $linha["Quantidade"], $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $listBook;
    }
}