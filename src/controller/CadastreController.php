<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class CadastreController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "pessoa")) {
            $response = $this->people();
        } else if (strpos($path_info, "livro")) {
            $response = $this->book();
        }else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function people() : ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/cadastre/people.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function book() : ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/cadastre/book.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
}
