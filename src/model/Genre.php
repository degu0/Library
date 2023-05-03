<?php

namespace Library_ETE\model;

class Genre
{
    private $id;
    private $genero;
    private $classificacao;
    private $ahLivros;

    public function __construct($genero, $classificacao, $ahLivros, $id = null)
    {
        $this->genero = $genero;
        $this->classificacao = $classificacao;
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

    public function getClassificacao()
    {
        return $this->classificacao;
    }

    public function getAhLivros()
    {
        return $this->ahLivros;
    }
}
