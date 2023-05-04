<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\BookDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class ListController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "lista")) {
            $response = $this->livros($request);
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function livros(ServerRequestInterface $request): ResponseInterface
    {
        $livroBD = new BookDataBase;
        $list = $livroBD->listBookGenre($request->getQueryParams()['id_genero']);
        $bodyHTTP = $this->getHTTPBodyBuffer("/livro/lista_livro.php", ["list" => $list]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
}
