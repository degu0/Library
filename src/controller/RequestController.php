<?php

namespace Library_ETE\controller;

use Library_ETE\model\Loan;
use Library_ETE\model\Data_Base\BookDataBase;
use Library_ETE\model\Data_Base\StudentDataBase;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\Data_Base\HistoryDataBase;
use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\RequestDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class RequestController extends Controller implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "solicitacao")) {
            if (strpos($path_info, "add")) {
                $response = $this->AdicionarSolicitacao($request);
            }else if (strpos($path_info, "remover")) {
                $response = $this->excluir($request);
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }
    public function AdicionarSolicitacao(ServerRequestInterface $request): ResponseInterface
    {
        $emprestimoBD = new LoanDataBase();
        $emprestimo = new Loan(
            $request->getQueryParams()["aluno"],
            $request->getQueryParams()["livro"],
            $request->getQueryParams()["data"],
            null
        );


        $historicoBD = new HistoryDataBase();
        $livroBD = new BookDataBase();
        $requestBD = new RequestDataBase();
        $emprestimoBD->adicionar($emprestimo);
        $historicoBD->adicionar($emprestimo);
        $livroBD->tirarDisponivel($request->getQueryParams()["livro"]);
        $requestBD->remover($request->getQueryParams()["id_solitacao"]);


        $response = new Response(302, ["Location" => "/confirmacao/emprestimo"], null);

        return $response;
    }

    public function excluir(ServerRequestInterface $request): ResponseInterface
    {
        $requestBD = new RequestDataBase();
        $requestBD->remover($request->getQueryParams()["id_solitacao"]);

        $response = new Response(302, ["Location" => "/home"], null);
        return $response;
    }
}