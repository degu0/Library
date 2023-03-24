<?php

namespace Library_ETE\model;

class Percentage 
{
    private $id;
    private $book;
    private $ano_escolar;
    private $serie_escolar;
    private $status;
    private $quantidade;
    private $ano;


    public function __construct($book, $ano_escolar, $serie_escolar, $status, $quantidade, $ano, $id = null)
    {
        $this->id = $id;
        $this->book = $book;
        $this->ano_escolar = $ano_escolar;
        $this->serie_escolar = $serie_escolar;
        $this->status = $status;
        $this->quantidade = $quantidade;
        $this->ano = $ano;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getBook()
    {
        return $this->book;
    }
    
    public function getAnoEscolar()
    {
        return $this->ano_escolar;
    }

    public function getSerieEscolar()
    {
        return $this->serie_escolar;
    }
    
    public function getStatus()
    {
        return $this->status;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function getAno()
    {
        return $this->ano;
    }

}