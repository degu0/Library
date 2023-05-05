<?php

namespace Library_ETE\model;


class Loan
{
    private $id;
    private $aluno;
    private $livro;
    private $data_inicial;
    private $data_final;

    public function __construct($aluno, $livro, $data_inicial, $data_final, $id = null)
    {
        $this->aluno = $aluno;
        $this->livro = $livro;
        $this->data_inicial = $data_inicial;
        $this->data_final = $data_final;
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

    public function getDataInicial()
    {
        return $this->data_inicial;
    }

    public function getDataFinal()
    {
        return $this->data_final;
    }
}
