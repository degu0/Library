<?php

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\Book;
use Library_ETE\model\Image;

class BookDataBase
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }

    public function queryBook($id)
    {
        $comando = "SELECT * FROM livro WHERE id_livro = ?;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $listBook = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image($linha['nome'], $linha['imagemData'], $linha['imagemType']);
            $listBook[] = new Book($linha['titulo'], $imagem, $linha['autor'], $linha['id_genero'], $linha['exemplares'], $linha['disponiveis'], $linha['resumo'], $linha['id_livro']);
        }

        $this->conexao->fecharConexao();
        return $listBook;
    }


    public function listBookGenre($genero)
    {
        $comando = "SELECT l.nome, l.imagemData, l.imagemType, l.id_livro as id,
        l.titulo, l.autor, g.genero, l.exemplares, l.disponiveis, l.resumo
        FROM livro l
        INNER JOIN genero g ON g.id = l.id_genero
        WHERE g.id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $genero);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $listBook = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image($linha['nome'], $linha['imagemData'], $linha['imagemType']);
            $listBook[] = new Book($linha['titulo'], $imagem, $linha['autor'], $linha['genero'], $linha['exemplares'], $linha['disponiveis'], $linha['resumo'], $linha['id']);
        }

        $this->conexao->fecharConexao();
        return $listBook;
    }

    public function searchBook($pesquisa)
    {
        $comando = "SELECT * FROM livro WHERE titulo LIKE '%$pesquisa%'";

        $resultado = $this->conexao->mysqli->query($comando);
        if ($resultado == false) {
            return null;
        }
        $listBook = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image($linha['nome'], $linha['imagemData'], $linha['imagemType']);
            $listBook[] = new Book($linha['titulo'], $imagem, $linha['autor'], $linha['id_genero'], $linha['exemplares'], $linha['disponiveis'], $linha['resumo'], $linha['id_livro']);
        }

        $this->conexao->fecharConexao();
        return $listBook;
    }

    public function getBook()
    {
        $comando = "SELECT * FROM livro where disponiveis > 0 ORDER BY titulo;";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        $listBook = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image($linha['nome'], $linha['imagemData'], $linha['imagemType']);
            $listBook[] = new Book($linha['titulo'], $imagem, $linha['autor'], $linha['id_genero'], $linha['exemplares'], $linha['disponiveis'], $linha['resumo'], $linha['id_livro']);
        }
        $this->conexao->fecharConexao();

        return $listBook;
    }

    public function remover($id)
    {
        $comando = "DELETE FROM livro WHERE id_livro = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function update(Book $updateLivro)
    {
        $id = $updateLivro->getId();
        $imagemNome = $updateLivro->getImagem()->getNome();
        $imagemData = $updateLivro->getImagem()->getData();
        $imagemType = $updateLivro->getImagem()->getType();
        $titulo = $updateLivro->getTitulo();
        $autor = $updateLivro->getAutor();
        $genero = $updateLivro->getId_genero();
        $exemplares = $updateLivro->getExemplares();
        $disponiveis = $updateLivro->getDisponiveis();
        $resumo = $updateLivro->getResumo();

        $update = "UPDATE livro SET
        nome = '$imagemNome', imagemData = '$imagemData', imagemType = '$imagemType', titulo = '$titulo', autor = '$autor', id_genero = '$genero', exemplares = '$exemplares', disponiveis = '$disponiveis', resumo = '$resumo'  
        WHERE id_livro = '$id' ;";
    

        $resultado = $this->conexao->mysqli->query($update);

        $this->conexao->fecharConexao();

        return $resultado; 
    }

    public function tirarDisponivel($id)
    {
        $comando = "UPDATE `livro` SET `disponiveis` = `disponiveis`- 1 WHERE `id_livro` = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function addBook(Book $book)
    {
        $nomeImagem = $book->getImagem()->getNome();
        $imagemData = $book->getImagem()->getData();
        $imagemType = $book->getImagem()->getType();
        $titulo = $book->getTitulo();
        $autor = $book->getAutor();
        $id_genero = $book->getId_genero();
        $exemplares = $book->getExemplares();
        $disponiveis = $book->getDisponiveis();
        $resumo = $book->getResumo();

        $sql = "INSERT INTO livro ( nome, imagemData, imagemType, titulo, autor, id_genero, exemplares, disponiveis, resumo)
        VALUES ('$nomeImagem', '$imagemData', '$imagemType', '$titulo','$autor','$id_genero', '$exemplares', '$disponiveis', '$resumo')";
        

        $resultado = $this->conexao->mysqli->query($sql);
        $this->conexao->fecharConexao();

        return $resultado;  
    }

    public function queryImagem($id)
    {
        $comando = "SELECT nome, imagemData, imagemType FROM livro WHERE id_livro = ?;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $imagem = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = [$linha['nome'], $linha['imagemData'], $linha['imagemType']];
        }
        return $imagem;
    }

    public function verificacaoDeLivro($titulo, $autor)
    {
        $comando = "SELECT * FROM livro where titulo = ? and autor = ?;";

        $resultado = $this->conexao->mysqli->prepare($comando);
        $resultado->bind_param('ss', $titulo, $autor);
        $resultado->execute();

        $resultado2 = $resultado->get_result();

        
        $linha = $resultado2->fetch_assoc();

        if ($linha) {
            return true;
        }else {
            return false;
        }
    }
}
