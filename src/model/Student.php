<?php

namespace Library_ETE\model;

use Library_ETE\model\User;

class Student
{
    private $id;
    private $usuario;
    private $matricula;
    private $numero;
    private $numero_responsavel;

    public function __construct(User $usuario, $matricula, $numero, $numero_responsavel, $id = null)
    {
        $this->usuario = $usuario;
        $this->matricula = $matricula;
        $this->numero = $numero;
        $this->numero_responsavel = $numero_responsavel;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getNumeroResponsavel()
    {
        return $this->numero_responsavel;
    }
}
