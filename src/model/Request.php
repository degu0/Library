<?php

namespace Library_ETE\model;


class Request
{
    private $id;
    private $aluno;
    private $livro;

    public function __construct($livro, $aluno, $id = null)
    {
        $this->livro = $livro;
        $this->aluno = $aluno;
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
}
