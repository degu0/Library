<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\BookDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class ShareController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "pesquisa")) {
            $response = $this->pesquisa($request);
        }else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function pesquisa(ServerRequestInterface $request) : ResponseInterface
    {
        if($_GET['searchNav'] == null){
            header(sprintf('location %s', $_SERVER['HTTP_REFERER']));
        }
        $livroBD = new BookDataBase;
        $listaLivro = $livroBD->searchBook($request->getQueryParams()["searchNav"]);
        $bodyHTTP = $this->getHTTPBodyBuffer("/pesquisa/pesquisa.php", ["listaLivro" => $listaLivro]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
}
