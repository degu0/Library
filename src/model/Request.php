<?php

namespace Library_ETE\model;


class Request
{
    private $id;
    private $aluno;
    private $livro;
    private $data;

    public function __construct($livro, $aluno, $data, $id = null)
    {
        $this->livro = $livro;
        $this->aluno = $aluno;
        $this->data = $data;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAluno()
    {
        return $this->aluno;
    }

    public function getLivro()
    {
        return $this->livro;
    }
    
    public function getData()
    {
        return $this->data;
    }
}
