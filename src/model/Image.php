<?php

namespace Library_ETE\model;

class Image
{
    private $nome;
    private $imageData;
    private $imageType;

    public function __construct( $nome, $imageData, $imageType)
    {
        $this->nome = $nome;
        $this->imageData = $imageData;
        $this->imageType = $imageType;

    }

    public function getNome(){
        return $this->nome;
    }

    public function getData(){
        return $this->imageData;
    }

    public function getType(){
        return $this->imageType;
    }

    public function getBase64(){
        return base64_encode($this->imageData);
    }

    public function getDataComCaracteresEscapados(){
        return addslashes($this->imageData);
    }
}