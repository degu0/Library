<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
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
            if(strpos($path_info, "emprestimo")) {
                $response = $this->emprestimo();
            }else if (strpos($path_info, "devolucao")) {
                $response = $this->devolucao();
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function emprestimo() : ResponseInterface
    {
        $bodyHTTP = $this->getHTTPBodyBuffer("/layout/confirmacao_emprestimo.php");
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }

    public function devolucao() : ResponseInterface
    {
        $bodyHTTP = $this->getHTTPBodyBuffer("/layout/confirmacao_devolucao.php");
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
}