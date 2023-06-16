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
            $perfil[] = new User($linha['nome'], $linha['email'], null, null, $linha['tipo_usuario'], $linha['id_usuario']);
        }

        $this->conexao->fecharConexao();
        return $perfil;
    }
    public function queryLogin($email, $senha)
    {
        $comando = "SELECT * from usuario where email = ? and senha = ?;";
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
        $comando = "SELECT nome from usuario where email = ? and senha = ?;";
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
        $comando = "SELECT id_usuario from usuario where email = ? and senha = ?;";
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
        $comando = "SELECT tipo_usuario as tipo from usuario where email = ? and senha = ?;";
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

    public function getLastStudent()
    {
        $comando = "SELECT * FROM usuario WHERE tipo_usuario = 'aluno' ORDER BY id_usuario DESC LIMIT 1;";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        while ($linha = $resultado->fetch_assoc()) {
            $user = $linha['id_usuario'];
        }
        $this->conexao->fecharConexao();

        return $user;
    }

    public function getType($id)
    {
        $comando = "SELECT tipo_usuario as tipo from usuario where id_usuario = ?;";
        $resultado = $this->conexao->mysqli->prepare($comando);
        $resultado->bind_param('i', $id);
        $resultado->execute();

        $resultado2 = $resultado->get_result();

        $linha = $resultado2->fetch_assoc();
        if ($linha['tipo'] == 'funcionário') {
            return true;
        }else {
            return false;
        }
    }
}