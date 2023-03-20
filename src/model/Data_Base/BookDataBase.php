<?php 

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
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
        $comando = "INSERT INTO Livros (Nome, Classificacao, Quantidade) VALUES (?, ?, ?);";
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

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getList()
    {
        $comando = "SELECT * FROM Livros;";
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
    public function getNoTextBook()
    {
        $comando = "SELECT * FROM Livros WHERE Classificacao = 'Nao_Didaticos';";
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
    public function getTextBook()
    {
        $comando = "SELECT * FROM Livros WHERE Classificacao = 'Didaticos';";
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
    public function getTechnicalBook()
    {
        $comando = "SELECT * FROM Livros WHERE Classificacao = 'Tecnicos';";
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

    public function update(Book $BookUpdate)
    {
        $comando = "UPDATE Livros SET Nome = ?, Classificacao = ?, Quantidade = ? WHERE id = ?;";

        $id = $BookUpdate->getId();
        $name = $BookUpdate->getName();
        $classification = $BookUpdate->getClassification();
        $quantity = $BookUpdate->getQuantity();

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "ssii",
            $name,
            $classification,
            $quantity,
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
        $comando = "DELETE FROM Livros WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getBook($id)
    {
        $comando = "SELECT * FROM Livros WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $linha = $resultado->fetch_assoc();
        $book = new Book($linha["Nome"], $linha["Classificacao"],$linha["Quantidade"], $linha["id"]);
        $this->conexao->fecharConexao();
        return $book;
    }
    
    public function getNameBook()
    {
        $comando = "SELECT id,Nome FROM Livros;";
        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listName = [];

        while ($linha = $resultado->fetch_assoc()) {
            $listName[] = new Book($linha["Nome"], null, null, $linha["id"]);
        }

        return $listName;
    }

}