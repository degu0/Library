<?php

namespace Library_ETE\controller;

use Library_ETE\model\Genre;
use Library_ETE\model\Data_Base\GenreDataBase;
use Library_ETE\controller\inheritance\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class CadastreGenreController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "gerenciar")) {
            if (strpos($path_info, "genero")) {
                $response = $this->Genero(false);
                if (strpos($path_info, "add")) {
                    $response = $this->AdicionarGenero($request);
                } else if (strpos($path_info, "update")) {
                    $response = $this->UpdateGenre($request);
                }
            } else {
                $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
                $response = new Response(200, [], $bodyHttp);
            }
            return $response;
        }
    }
    public function Genero($ahGenero): ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/gerenciar/gerenciar_genero.php",  ["ahGenero" => $ahGenero]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function AdicionarGenero(ServerRequestInterface $request): ResponseInterface
    {
        $generoBD = new GenreDataBase();
        $ahGenero = $generoBD->verificacaoDeGenero($request->getParsedBody()["genero"]);
        if ($ahGenero) {
            $response = $this->Genero(true);
            return $response;
        } else {
            $genero = new Genre(
                $request->getParsedBody()["genero"],
                $request->getParsedBody()["select_genero"],
                null
            );


            $generoBD->adicionar($genero);
            $classificacao = $generoBD->queryLastGenre();

            if ($classificacao == 'didático') {
                $response = new Response(302, ["Location" => "/generos/didaticos"], null);
            } else {
                $response = new Response(302, ["Location" => "/generos/literatura"], null);
            }

            return $response;
        }
    }


    public function UpdateGenre(ServerRequestInterface $request): ResponseInterface
    {
        $genero = new Genre(
            $request->getParsedBody()["genero"],
            $request->getParsedBody()["classificacao"],
            null,
            $request->getQueryParams()["id"]
        );
        $generoBD = new GenreDataBase();

        $generoBD->update($genero);

        $response = new Response(302, ["Location" => "/lista?id_genero=" . $request->getQueryParams()["id"]], null);
        return $response;
    }
}
