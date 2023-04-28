<?php

namespace Library_ETE\model;

class User
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $senhaMD5;
    private $tipo_usuario;

    public function __construct($nome, $email, $senha, $senhaMD5, $tipo_usuario, $id = null)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->senhaMD5 = $senhaMD5;
        $this->tipo_usuario = $tipo_usuario;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenhaMD5()
    {
        if ($this->senhaMD5 == null) {
            $this->senhaMD5 = md5($this->senha);
        }
        return $this->senhaMD5;
    }

    public function validarSenha($senha)
    {
        return $this->senhaMD5 == md5($senha);
    }

    public function getTipoUser()
    {
        return $this->tipo_usuario;
    }
}
