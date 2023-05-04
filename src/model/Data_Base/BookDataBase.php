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
        INNER JOIN Genero g ON g.id = l.id_genero
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
}
