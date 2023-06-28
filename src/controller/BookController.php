<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Book;
use Library_ETE\model\Image;
use Library_ETE\model\Request;
use Library_ETE\model\Data_Base\BookDataBase;
use Library_ETE\model\Data_Base\GenreDataBase;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\Data_Base\RequestDataBase;
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
            if (strpos($path_info, "edit")) {
                $response = $this->editar($request);
            } else if (strpos($path_info, "update")) {
                $response = $this->update($request);
            } else if (strpos($path_info, "excluir")) {
                $response = $this->excluir($request);
            } else if (strpos($path_info, "emprestimo")) {
                $response = $this->solicitacao_emprestimo($request);
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function livro(ServerRequestInterface $request): ResponseInterface
    {
        $livroBD = new BookDataBase;
        $test = $livroBD->queryBook($request->getQueryParams()['id_livro']);
        $bodyHTTP = $this->getHTTPBodyBuffer("/livro/livro.php", ["listBook" => $test]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }

    public function editar(ServerRequestInterface $request): ResponseInterface
    {
        $livroBD = new BookDataBase();
        $genero = new GenreDataBase();
        $listGenre = $genero->getListGenre();
        $livro = $livroBD->queryBook($request->getQueryParams()["id_livro"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/edit/edit_livro.php", ["informaitonBook" => $livro, "listGenre" => $listGenre]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }

    public function update(ServerRequestInterface $request): ResponseInterface
    {
        $livroDB = new BookDataBase();
        if ($_FILES['imagem_livro']['size'] == null) {
            $arrayImagem = $livroDB->queryImagem($request->getQueryParams()["id_livro"]);
            $imagemData = addslashes($arrayImagem[1]);
            $imagem = new Image($arrayImagem[0], $imagemData, $arrayImagem[2]);
        } else {
            $imgData = addslashes(file_get_contents($_FILES['imagem_livro']['tmp_name']));
            $imgType = getimageSize($_FILES['imagem_livro']['tmp_name']);

            $imagem = new Image($_FILES['imagem_livro ']['name'], $imgData, $imgType['mime']);
        }

        $livro = new Book(
            $request->getParsedBody()["titulo"],
            $imagem,
            $request->getParsedBody()["autor"],
            $request->getParsedBody()["genero"],
            $request->getParsedBody()["exemplares"],
            $request->getParsedBody()["exemplares"],
            $request->getParsedBody()["resumo"],
            $request->getQueryParams()["id_livro"]
        );

        $livroDB->update($livro);

        $response = new Response(302, ["Location" => "/lista?id_genero=" . $request->getQueryParams()["id_genero"]], null);
        return $response;
    }

    public function excluir(ServerRequestInterface $request): ResponseInterface
    {
        $livroBD = new BookDataBase();
        $livroBD->remover($request->getQueryParams()["id_livro"]);

        $response = new Response(302, ["Location" => "/lista?id_genero=" . $request->getQueryParams()["id_genero"]], null);
        return $response;
    }

    public function solicitacao_emprestimo(ServerRequestInterface $request): ResponseInterface
    {
        $emprestimo = new Request(
            $request->getQueryParams()["id_livro"],
            $request->getQueryParams()["id_usuario"],
            date('Y/m/d'),
            null
        );

        $solicitacaoBD = new RequestDataBase();
        $solicitacaoBD->request($emprestimo);

        $response = new Response(302, ["Location" => "/home"], null);

        return $response;
    }
}
