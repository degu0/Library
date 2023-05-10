<?php

namespace Library_ETE\model;


class History
{
    private $id;
    private $aluno;
    private $livro;
    private $data_inicial;
    private $data_final;
    private $adiamento;
    private $status;

    public function __construct($aluno, $livro, $data_inicial, $data_final, $adiamento, $status, $id = null)
    {
        $this->aluno = $aluno;
        $this->livro = $livro;
        $this->data_inicial = $data_inicial;
        $this->data_final = $data_final;
        $this->adiamento = $adiamento;
        $this->status = $status;
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

    public function getAdiamento()
    {
        return $this->adiamento;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
