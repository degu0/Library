<?php

namespace Library_ETE\model;

class Loan 
{
    private $id;
    private $book;
    private $people;
    private $date;
    private $dateFinal;


    public function __construct($book, $people, $date, $dateFinal, $id = null)
    {
        $this->id = $id;
        $this->book = $book;
        $this->people = $people;
        $this->date = $date;
        $this->dateFinal = $dateFinal;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getDateFinal()
    {
        return $this->dateFinal;
    }

    public function getBook()
    {
        return $this->book;
    }

    public function getPeople()
    {
        return $this->people;
    }

}