<?php

namespace Library_ETE\controller;

use Library_ETE\model\Loan;
use Library_ETE\model\Data_Base\BookDataBase;
use Library_ETE\model\Data_Base\StudentDataBase;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\Data_Base\HistoryDataBase;
use Library_ETE\controller\inheritance\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class CadastreLoanController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "gerenciar")) {
            if (strpos($path_info, "emprestimo")) {
                $response = $this->Emprestimo(false);
                if (strpos($path_info, "add")) {
                    $response = $this->AdicionarEmprestimo($request);
                } else if (strpos($path_info, "editar")) {
                    $response = $this->EditarEmprestimo($request);
                } else if (strpos($path_info, "update")) {
                    $response = $this->UpdateEmprestimo($request);
                }
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function Emprestimo($ahEmprestimo): ResponseInterface
    {
        $aluno = new StudentDataBase();
        $livro = new BookDataBase();
        $listaAluno = $aluno->getStudent();
        $listaLivro = $livro->getBook();
        $bodyHttp = $this->getHTTPBodyBuffer("/gerenciar/gerenciar_emprestimo.php", ["listaAluno" => $listaAluno, "listaLivro" => $listaLivro, "ahEmprestimo" => $ahEmprestimo]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function AdicionarEmprestimo(ServerRequestInterface $request): ResponseInterface
    {
        $emprestimoBD = new LoanDataBase();
        $ahEmprestimo = $emprestimoBD->verificacaoDeEmprestimo($request->getParsedBody()["aluno"], $request->getParsedBody()["livro"]);
        if ($ahEmprestimo) {
            $response = $this->Emprestimo(true);
            return $response;
        } else {
            if ($request->getParsedBody()['data'] == null) {
                $data = date('Y/m/d');
            } else {
                $data = $request->getParsedBody()['data'];
            }

            $emprestimo = new Loan(
                $request->getParsedBody()["aluno"],
                $request->getParsedBody()["livro"],
                $data,
                null
            );


            $historicoBD = new HistoryDataBase();
            $livroBD = new BookDataBase();
            $emprestimoBD->adicionar($emprestimo);
            $historicoBD->adicionar($emprestimo);
            $livroBD->tirarDisponivel($request->getParsedBody()["livro"]);


            $response = new Response(302, ["Location" => "/confirmacao/emprestimo"], null);

            return $response;
        }
    }

    public function EditarEmprestimo(ServerRequestInterface $request): ResponseInterface
    {
        $alunoBD = new StudentDataBase();
        $livroBD = new BookDataBase();
        $emprestimoBD = new LoanDataBase();
        $listaAluno = $alunoBD->getStudent();
        $listaLivro = $livroBD->getBook();
        $emprestimo = $emprestimoBD->queryLoan($request->getQueryParams()["id"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/edit/edit_emprestimo.php", ["emprestimo" => $emprestimo, "listaAluno" => $listaAluno, "listaLivro" => $listaLivro]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }

    public function UpdateEmprestimo(ServerRequestInterface $request): ResponseInterface
    {

        if ($request->getParsedBody()['data'] == null) {
            $data = date('Y/m/d');
        } else {
            $data = $request->getParsedBody()['data'];
        }
        $emprestimo = new Loan(
            $request->getParsedBody()["aluno"],
            $request->getParsedBody()["livro"],
            $data,
            null,
            $request->getQueryParams()["id"]
        );


        $emprestimoBD = new LoanDataBase();
        $emprestimoBD->updateLoan($emprestimo);


        $response = new Response(302, ["Location" => "/confirmacao/emprestimo"], null);

        return $response;
    }
}
