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

    public function getUser($id)
    {
        $comando = "SELECT * FROM usuario WHERE id_usuario = ?;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $perfil = [];

        while ($linha = $resultado->fetch_assoc()) {
            $perfil[] = new User($linha['nome'], $linha['email'], $linha['senha'], null, $linha['tipo_usuario'], $linha['id_usuario']);
        }

        $this->conexao->fecharConexao();
        return $perfil;
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
            $user = new User(null, $linha["email"], $linha["senha"], null, null, $linha["id_usuario"]);
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
            return $linha["nome"];
        }else {
            return null;
        }
    }

    public function queryId($email, $senha)
    {
        $comando = "SELECT id_usuario from Usuario where email = ? and senha = ?;";
        $resultado = $this->conexao->mysqli->prepare($comando);
        $resultado->bind_param("ss", $email, $senha);
        $resultado->execute();

        $resultado2 = $resultado->get_result();

        $linha = $resultado2->fetch_assoc();
        if ($linha != null) {
            return $linha["id_usuario"];
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