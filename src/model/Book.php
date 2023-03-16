<?php

namespace Library_ETE\model;

class Book 
{
    private $id;
    private $name;
    private $classification;
    private $quantity;

    public function __construct($name, $classification, $quantity, $id = null)
    {
        $this->name = $name;
        $this->classification = $classification;
        $this->quantity = $quantity;
        $this->id = $id;
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
