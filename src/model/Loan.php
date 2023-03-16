<?php

namespace Library_ETE\model;

class Loan 
{
    private $id;
    private $date;
    private $dateFinal;
    private $book;
    private $people;


    public function __construct($id = null, $date, $dateFinal, $book, $people)
    {
        $this->id = $id;
        $this->date = $date;
        $this->dateFinal = $dateFinal;
        $this->book = $book;
        $this->people = $people;
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