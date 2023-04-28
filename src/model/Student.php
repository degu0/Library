<?php

namespace Library_ETE\model;

class Student
{
    private $id;
    private $matricula;
    private $numero;
    private $numero_responsavel;

    public function __construct($matricula, $numero, $numero_responsavel, $id = null)
    {
        $this->matricula = $matricula;
        $this->numero = $numero;
        $this->numero_responsavel = $numero_responsavel;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
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
