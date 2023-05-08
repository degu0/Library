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
                if (strpos($path_info, "editar")) {
                    $response = $this->editar($request);
                } else if (strpos($path_info, "update")) {
                    $response = $this->update($request);
                } else if (strpos($path_info, "excluir")) {
                    $response = $this->excluir($request);
                }
            } else if (strpos($path_info, "literatura")) {
                $response = $this->paradidatico();
                if (strpos($path_info, "editar")) {
                    $response = $this->editar($request);
                } else if (strpos($path_info, "update")) {
                    $response = $this->update($request);
                } else if (strpos($path_info, "excluir")) {
                    $response = $this->excluir($request);
                }
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }

        return $response;
    }

    public function didatico(): ResponseInterface
    {
        $generoBD =  new GenreDataBase;
        $listGenreDidatico = $generoBD->queryGenre('didatico');
        $bodyHTTP = $this->getHTTPBodyBuffer("/genero/genero_didatico.php", ["listGenreDidatico" => $listGenreDidatico]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
    public function paradidatico(): ResponseInterface
    {
        $generoBD =  new GenreDataBase;
        $listGenreParadidatico = $generoBD->queryGenre('paradidatico');
        $bodyHTTP = $this->getHTTPBodyBuffer("/genero/genero_paradidatico.php", ["listGenreParadidatico" => $listGenreParadidatico]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }

    public function excluir( ServerRequestInterface $request) : ResponseInterface
    {
        $generoBD = new GenreDataBase();
        $generoBD->remover($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/genero"], null);
        return $response;
    }

    public function editar(ServerRequestInterface $request) : ResponseInterface
    {
        $generoBD = new GenreDataBase();
        $genero = $generoBD->queryGenreId($request->getQueryParams()["id"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/edit/edit_genero.php", ["genero" => $genero]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }

    public function update(ServerRequestInterface $request) : ResponseInterface
    {
        $genero = new Genre(
            $request->getParsedBody()["genero"],
            $request->getParsedBody()["classificacao"],
            null
        );
        $generoBD = new GenreDataBase();

        $generoBD->update($genero);

        $response = new Response(302, ["Location" => "/lista"], null);
        return $response;
    }
}
