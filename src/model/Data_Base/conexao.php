<?php

namespace Library_ETE\model\Data_Base;

use mysqli;

class Conexao
{
    private $endereco = "127.0.0.1";
    private $login = "root";
    private $senha = "";
    private $banco = "Library";

    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->endereco, $this->login, $this->senha, $this->banco);
    }

    public function __destruct()
    {
    }

    public function fecharConexao()
    {
        $this->mysqli->close();
        $this->__destruct();
    }
}
