<?php

namespace Library_ETE\controller;

use Library_ETE\model\Book;
use Library_ETE\model\Image;
use Library_ETE\model\Data_Base\BookDataBase;
use Library_ETE\model\Data_Base\GenreDataBase;
use Library_ETE\controller\inheritance\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class CadastreBookController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "gerenciar")) {
            if (strpos($path_info, "livro")) {
                $response = $this->Livro(false);
                if (strpos($path_info, "add")) {
                    $response = $this->AdicionarLivro($request);
                }
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function Livro($ahLivro): ResponseInterface
    {
        $genero = new GenreDataBase();
        $listGenre = $genero->getListGenre();
        $bodyHttp = $this->getHTTPBodyBuffer("/gerenciar/gerenciar_livro.php", ["listGenre" => $listGenre, "ahLivro" => $ahLivro]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function AdicionarLivro(ServerRequestInterface $request): ResponseInterface
    {
        $livroDB = new BookDataBase();

        $ahLivro = $livroDB->verificacaoDeLivro($request->getParsedBody()["titulo"], $request->getParsedBody()["autor"]);

        if ($ahLivro) {
            $response = $this->Livro(true);
            return $response;
        } else {
            if (getimageSize($_FILES['imagem_livro']['tmp_name'])['mime'] == 'image/png' || getimageSize($_FILES['imagem_livro']['tmp_name'])['mime'] == 'image/jpeg' || getimageSize($_FILES['imagem_livro']['tmp_name'])['mime'] == 'image/jpg' && $_FILES['imagem_livro']['size'] < 26214400) {

                $imgData = addslashes(file_get_contents($_FILES['imagem_livro']['tmp_name']));

                $imgType = getimageSize($_FILES['imagem_livro']['tmp_name']);

                $imagem = new Image($_FILES['imagem_livro']['name'], $imgData, $imgType['mime']);
                $livro = new Book(
                    $request->getParsedBody()["titulo"],
                    $imagem,
                    $request->getParsedBody()["autor"],
                    $request->getParsedBody()["genero"],
                    $request->getParsedBody()["exemplares"],
                    $request->getParsedBody()["exemplares"],
                    $request->getParsedBody()["resumo"]
                );

                $livroDB->addBook($livro);

                $response = new Response(302, ["Location" => "/lista?id_genero=" . $request->getParsedBody()["genero"]], null);

                return $response;
            } else {
                $response = $this->Livro(true);
                return $response;
            }
        }
    }
}
