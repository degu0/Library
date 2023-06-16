<?php

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\Genre;

class GenreDataBase
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }


    public function getListGenre()
    {
        $comando = "SELECT * FROM genero ORDER BY genero;";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        $list = [];

        while ($linha = $resultado->fetch_assoc()) {
            $list[] = new Genre($linha['genero'], $linha['classificao'], null, $linha['id']);
        }
        $this->conexao->fecharConexao();

        return $list;
    }
    public function queryGenre($classificacao)
    {
        $comando = "SELECT * FROM genero WHERE classificao = ? ORDER BY genero;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("s", $classificacao);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $list = [];

        while ($linha = $resultado->fetch_assoc()) {
            $list[] = new Genre($linha["genero"], $linha["classificao"], null, $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $list;
    }


    public function adicionar(Genre $generoObjeto)
    {
        $comando = "INSERT INTO genero (genero, classificao) VALUES(?, ?)";
        $genero = $generoObjeto->getGenero();
        $classificacao = $generoObjeto->getClassificacao();

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "ss",
            $genero,
            $classificacao
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function queryGenreId($id)
    {
        $comando = "SELECT * FROM genero WHERE id = ?;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $list = [];

        while ($linha = $resultado->fetch_assoc()) {
            $list[] = new Genre($linha["genero"], $linha["classificao"], null, $linha["id"]);
        }

        $this->conexao->fecharConexao();
        return $list;
    }

    public function remover($id)
    {
        $comando = "DELETE FROM genero WHERE id = ?;";

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param("s", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }


    public function update(Genre $updateGenero)
    {
        $comando = "UPDATE `genero` SET `genero` = ? , `classificao` = ? WHERE (`id` = ?);";
        $id = $updateGenero->getId();
        $genero = $updateGenero->getGenero();
        $classificacao = $updateGenero->getClassificacao();


        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param(
            "ssi",
            $genero,
            $classificacao,
            $id
        );
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
    }

    public function queryLastGenre()
    {
        $comando = "SELECT * FROM
        genero
        ORDER BY id DESC LIMIT 1;";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        while ($linha = $resultado->fetch_assoc()) {
            $genre = $linha['classificao'];
        }
        $this->conexao->fecharConexao();

        return $genre;
    }

    public function verificacaoDeGenero($genero)
    {
        $comando = "SELECT genero FROM genero where genero = ?;";

        $resultado = $this->conexao->mysqli->prepare($comando);
        $resultado->bind_param('s', $genero);
        $resultado->execute();

        $resultado2 = $resultado->get_result();

        $linha = $resultado2->fetch_assoc();
        if ($linha['genero']) {
            return true;
        }else {
            return false;
        }
    }
}
