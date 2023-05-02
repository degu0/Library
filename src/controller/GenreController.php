<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Genre;
use Library_ETE\model\Data_Base\GenreDataBase; 
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class GenreController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;
        if (strpos($path_info, "generos")) {
            if (strpos($path_info, "didaticos")) {
                $response = $this->didatico();
            }else if (strpos($path_info, "paradidaticos")) {
                $response = $this->paradidatico();
            }
        }

        return $response;
    }

    public function didatico()
    {
        $generoBD =  new GenreDataBase;
        $listGenre = $generoBD->queryGenre("didático");
        $bodyHTTP = $this->getHTTPBodyBuffer("/genero/genero.php", ["listGenre" => $listGenre]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
    public function paradidatico()
    {
        $generoBD =  new GenreDataBase;
        $listGenre = $generoBD->queryGenre("paradidático");
        $bodyHTTP = $this->getHTTPBodyBuffer("/genero/genero.php", ["listGenre" => $listGenre]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
}
