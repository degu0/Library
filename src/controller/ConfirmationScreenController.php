<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\LoanDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class ConfirmationScreenController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "confirmacao")) {
            if (strpos($path_info, "emprestimo")) {
                $response = $this->emprestimo($request);
            } else if (strpos($path_info, "devolucao")) {
                $response = $this->devolucao($request);
            } else if (strpos($path_info, "senha")) {
                $response = $this->senha(false);
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function emprestimo(ServerRequestInterface $request): ResponseInterface
    {
        $emprestimoBD = new LoanDataBase();
        if ($_SESSION['tipo_usuario'] == 'funcionário') {
            $informacoes = $emprestimoBD->queryLastLoan();
            $bodyHTTP = $this->getHTTPBodyBuffer("/layout/confirmacao_emprestimo.php", ['listInformation' => $informacoes]);
            $response = new Response(200, [], $bodyHTTP);

            return $response;
        } else {
            if ($request->getParsedBody()["senha"] == "adm") {
                $informacoes = $emprestimoBD->queryLastLoan();
                $bodyHTTP = $this->getHTTPBodyBuffer("/layout/confirmacao_emprestimo.php", ['listInformation' => $informacoes]);
                $response = new Response(200, [], $bodyHTTP);

                return $response;
            } else {
                $response = $this->senha(true);
                return $response;
            }
        }
    }

    public function devolucao(ServerRequestInterface $request): ResponseInterface
    {
        $emprestimoBD = new LoanDataBase();
        $informacoes = $emprestimoBD->queryLoan($request->getQueryParams()["id"]);
        $bodyHTTP = $this->getHTTPBodyBuffer("/layout/confirmacao_devolucao.php", ['listInformation' => $informacoes]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }

    public function senha($senhaIncorreta): ResponseInterface
    {
        $bodyHTTP = $this->getHTTPBodyBuffer("/layout/senha.php",  ["senhaIncorreta" => $senhaIncorreta]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
}
