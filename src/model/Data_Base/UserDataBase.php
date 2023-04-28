<?php 

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\User;

class UserDataBase 
{
    private $conexao;

    public function __construct()
    {
       $this->conexao = new Conexao; 
    }  
}