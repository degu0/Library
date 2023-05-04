<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\BookDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class BookController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "livro")) {
            $response = $this->livro($request);
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function livro(ServerRequestInterface $request): ResponseInterface
    {
        $livroBD = new BookDataBase;
        $list = $livroBD->queryBook($request->getQueryParams()['id']);
        $bodyHTTP = $this->getHTTPBodyBuffer("/livro/livro.php", ["listBook" => $list]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
}
