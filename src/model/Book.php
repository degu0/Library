<?php

namespace Library_ETE\model;

class Book 
{
    private $id;
    private $name;
    private $classification;
    private $quantity;

    public function __construct($id = null, $name, $classification, $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->classification = $classification;
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getClassification()
    {
        return $this->classification;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
