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

    public function queryGenre()
    {
        $comando = "SELECT * FROM genero;";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        while ($linha = $resultado->fetch_assoc()) {
            $list = new Genre($linha["genero"], $linha["classificao"], null, $linha["id"]);
        }
        $this->conexao->fecharConexao();

        return $list;
    }
}
