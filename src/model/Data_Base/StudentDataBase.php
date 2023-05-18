<?php

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\Student;
use Library_ETE\model\User;

class StudentDataBase
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao;
    }

    public function getStudent()
    {
        $comando = "SELECT a.id, a.numero_aluno, a.numero_responsavel, a.matricula, u.id_usuario, u.nome 
        FROM usuario_aluno a 
        INNER JOIN usuario u ON u.id_usuario = a.FK_id_usuario; ";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        $listStudent = [];

        while ($linha = $resultado->fetch_assoc()) {
            $user = new User($linha['nome'], null, null, null, null);
            $listStudent[] = new Student($user, $linha['matricula'], $linha['numero_aluno'], $linha['numero_responsavel'], $linha['id']);
        }
        $this->conexao->fecharConexao();

        return $listStudent;
    }

    public function getPerfilAluno($id)
    {
        $comando = "SELECT u.id_usuario as id, u.nome, u.email, u.senha, u.tipo_usuario as tipo, a.numero_aluno, a.numero_responsavel, a.matricula FROM usuario u
        INNER JOIN usuario_aluno a ON a.Fk_id_usuario = u.id_usuario
        WHERE u.id_usuario = ? ;";
        $preparacao = $this->conexao->mysqli->prepare($comando);
        $preparacao->bind_param("i", $id);
        $preparacao->execute();

        $resultado = $preparacao->get_result();
        if ($resultado == false) {
            return null;
        }
        $perfil = [];

        while ($linha = $resultado->fetch_assoc()) {
            $user = new User($linha['nome'], $linha['email'], $linha['senha'], null, $linha['tipo'], $linha['id']);
            $perfil[] = new Student($user, $linha["matricula"], $linha["numero_aluno"], $linha["numero_responsavel"], null);
        }

        $this->conexao->fecharConexao();
        return $perfil;
    }

    public function adicionar(Student $aluno)
    {
        $comando = "INSERT INTO usuario_aluno (matricula, numero_aluno, numero_responsavel, FK_id_Usuario) VALUES(?, ?, ?, ?)";
        $matricula = $aluno->getMatricula();
        $numeroAluno = $aluno->getNumero();
        $numeroResponsavel = $aluno->getNumeroResponsavel();
        $id_usuario = $aluno->getUsuario()->getId();

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "iiii",
            $matricula,
            $numeroAluno,
            $numeroResponsavel,
            $id_usuario
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();  
    }
}
