<?php

namespace Library_ETE\model;

class Loan 
{
    private $id;
    private $date;
    private $book;
    private $people;

    public function __construct($id = null, $date, $book, $people)
    {
        $this->id = $id;
        $this->date = $date;
        $this->book = $book;
        $this->people = $people;
    }

    public function getDate()
    {
        return $this->date;
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