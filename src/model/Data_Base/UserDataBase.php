<?php 

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\User;

class UserDataBase 
{
    private $conexao;

    public function __construct()
    {
       $this->conexao = new Conexao; 
    }  

    public function adicionar(User $usuario)
    {
        $comando = "INSERT INTO usuario (nome, email, senha, tipo_usuario) VALUES(?, ?, ?, ?)";
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenhaMD5();
        $tipo_usuario = $usuario->getTipoUser();



        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "ssss",
            $nome,
            $email,
            $senha,
            $tipo_usuario
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function queryLogin($email, $senha)
    {
        $comando = "SELECT * from Usuario where email = ? and senha = ?;";
        $resultado = $this->conexao->mysqli->prepare($comando);
        $resultado->bind_param("ss", $email, $senha);
        $resultado->execute();

        $resultado2 = $resultado->get_result();

        $linha = $resultado2->fetch_assoc();
        if ($linha != null) {
            $user = new User(null, $linha["email"], $linha["senha"], null, null, $linha["id"]);
            return $user;
        }else {
            return null;
        }
    }


    public function queryName($email, $senha)
    {
        $comando = "SELECT nome from Usuario where email = ? and senha = ?;";
        $resultado = $this->conexao->mysqli->prepare($comando);
        $resultado->bind_param("ss", $email, $senha);
        $resultado->execute();

        $resultado2 = $resultado->get_result();

        $linha = $resultado2->fetch_assoc();
        if ($linha != null) {
            return $linha["tipo"];
        }else {
            return null;
        }
    }

    public function queryType($email, $senha)
    {
        $comando = "SELECT tipo_usuario as tipo from Usuario where email = ? and senha = ?;";
        $resultado = $this->conexao->mysqli->prepare($comando);
        $resultado->bind_param("ss", $email, $senha);
        $resultado->execute();

        $resultado2 = $resultado->get_result();

        $linha = $resultado2->fetch_assoc();
        if ($linha != null) {
            return $linha["tipo"];
        }else {
            return null;
        }
    }
}