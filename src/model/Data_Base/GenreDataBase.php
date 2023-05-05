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

    public function queryGenre($classificacao)
    {
        $comando = "SELECT * FROM genero WHERE classificao = ?;";
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
}
