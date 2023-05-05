<?php 

namespace Library_ETE\model\Data_Base;

use Library_ETE\model\Data_Base\Conexao;
use Library_ETE\model\Loan;
use Library_ETE\model\Book;
use Library_ETE\model\Student;
use Library_ETE\model\Image;

class LoanDataBase 
{
    private $conexao;

    public function __construct()
    {
       $this->conexao = new Conexao; 
    }  

    public function adicionar(Loan $emprestimo)
    {
        $comando = "INSERT INTO emprestimo (FK_id_Aluno, FK_id_Livro, Data_Entrega, Data_Final) VALUES(?, ?, ?, ?)";
        $aluno = $emprestimo->getAluno();
        $livro = $emprestimo->getLivro();
        $data_inicial = $emprestimo->getDataInicial();
        $data_final = date('d/m/Y', strtotime('+8 days', strtotime($data_inicial)));

        $preparacao = $this->conexao->mysqli->prepare($comando);

        $preparacao->bind_param(
            "iiss",
            $aluno,
            $livro,
            $data_inicial,
            $data_final
        );

        $preparacao->execute();

        $resultado = $preparacao->get_result();

        if ($resultado == false) {
            return null;
        }

        $this->conexao->fecharConexao();
    }

    public function getLoan()
    {
        $comando = "SELECT * FROM emprestimo;";

        $resultado = $this->conexao->mysqli->query($comando);

        if ($resultado == false) {
            return null;
        }

        $listLoan = [];

        while ($linha = $resultado->fetch_assoc()) {
            $imagem = new Image('null', 'null', 'null');
            $livro = new Book($linha['titulo'], $imagem, null, null,null,null,null, $linha['id_livro']);
            $aluno = new Student($linha['matricula'], null, null, $linha['id_usuario']);
            $listLoan[] = new Loan($aluno, $livro, $linha['data_entrega'], $linha['data_final'], $linha['id']);
        }
        $this->conexao->fecharConexao();

        return $listLoan;
    }

}