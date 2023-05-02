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

        $linha = $resultado->fetch_assoc();
        $list = new Genre($linha["Genero"], $linha["Classificao"], $linha["id"]);
        $this->conexao->fecharConexao();
        return $list;
    }
}