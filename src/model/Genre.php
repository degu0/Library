<?php

namespace Library_ETE\model;

class Genre
{
    private $id;
    private $genero;
    private $ahLivros;

    public function __construct($genero, $ahLivros, $id = null)
    {
        $this->genero = $genero;
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

    public function getAhLivros()
    {
        return $this->ahLivros;
    }
}
