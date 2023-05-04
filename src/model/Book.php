<?php

namespace Library_ETE\model;

use Library_ETE\model\Image;

class Book
{
    private $id;
    private $titulo;
    private $imagem;
    private $autor;
    private $id_genero;
    private $exemplares;
    private $disponiveis;
    private $resumo;

    public function __construct($titulo, Image $imagem, $autor, $id_genero, $exemplares, $disponiveis, $resumo, $id = null)
    {
        $this->titulo = $titulo;
        $this->imagem = $imagem;
        $this->autor = $autor;
        $this->id_genero = $id_genero;
        $this->exemplares = $exemplares;
        $this->disponiveis = $disponiveis;
        $this->resumo = $resumo;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getId_genero()
    {
        return $this->id_genero;
    }

    public function getExemplares()
    {
        return $this->exemplares;
    }
    
    public function getDisponiveis()
    {
        return $this->disponiveis;
    }

    public function getResumo()
    {
        return $this->resumo;
    }
}
