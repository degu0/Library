<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
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
            $response = $this->livro();
        }
        return $response;
    }

    public function livro()
    {
        $bodyHTTP = $this->getHTTPBodyBuffer("/livro/livro.php");
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
}
