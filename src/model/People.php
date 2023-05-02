<?php

namespace Library_ETE\model;

class People 
{
    private $id;
    private $name;
    private $trade;
    private $class;

    public function __construct($name, $trade, $class, $id = null)
    {
        $this->name = $name;
        $this->trade = $trade;
        $this->class = $class;
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

    public function getTrade()
    {
        return $this->trade;
    }

    public function getClass()
    {
        return $this->class;
    }

}