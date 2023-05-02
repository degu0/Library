<?php

namespace Library_ETE\model;

class Genre
{
    private $id;
    private $genero;
    private $classificao;
    private $ahLivros;

    public function __construct($genero, $classificao, $ahLivros, $id = null)
    {
        $this->genero = $genero;
        $this->classificao = $classificao;
        $this->ahLivros = $ahLivros;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getClassificao()
    {
        return $this->classificao;
    }

    public function getAhLivros()
    {
        return $this->ahLivros;
    }
}
