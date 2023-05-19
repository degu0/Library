<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\User;
use Library_ETE\model\Data_Base\UserDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;
use Nyholm\Psr7\ServerRequest;

class LoanController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "emprestimo")) {
            $response = $this->emprestimo();
            if (strpos($path_info, "devolucao")) {
                $response = $this->devolucao($request);
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function emprestimo() : ResponseInterface
    {

        $loanBD = new LoanDataBase();
        $listLoan = $loanBD->queryLoanStudent($_SESSION['id_usuario']);
        $bodyHTTP = $this->getHTTPBodyBuffer("/emprestimo/emprestimo.php", ['listLoan' => $listLoan]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }

    public function devolucao(ServerRequestInterface $request) : ResponseInterface
    {
        $loanBD = new LoanDataBase();
        $listLoan = $loanBD->queryLoanStudent($_SESSION['id_usuario']);
        $bodyHTTP = $this->getHTTPBodyBuffer("/emprestimo/emprestimo.php", ['listLoan' => $listLoan]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
}
