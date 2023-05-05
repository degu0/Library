<?php

namespace Library_ETE\controller;

use Library_ETE\model\Book;
use Library_ETE\model\Image;
use Library_ETE\model\Genre;
use Library_ETE\model\Loan;
use Library_ETE\model\Data_Base\BookDataBase;
use Library_ETE\model\Data_Base\GenreDataBase;
use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\Data_Base\StudentDataBase;
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

        if (strpos($path_info, "gerenciar")) {
            if (strpos($path_info, "livro")) {
                $response = $this->Livro();
                if (strpos($path_info, "add")) {
                    $response = $this->AdicionarLivro($request);
                }
            } else if (strpos($path_info, "genero")) {
                $response = $this->Genero();
                if (strpos($path_info, "add")) {
                    $response = $this->AdicionarGenero($request);
                }
            } else if (strpos($path_info, "emprestimo")) {
                $response = $this->Emprestimo();
                if (strpos($path_info, "add")) {
                    $response = $this->AdicionarEmprestimo($request);
                }
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function Livro(): ResponseInterface
    {
        $genero = new GenreDataBase();
        $listGenre = $genero->queryGenre();
        $bodyHttp = $this->getHTTPBodyBuffer("/gerenciar/gerenciar_livro.php", ["listGenre" => $listGenre]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function AdicionarLivro(ServerRequestInterface $request): ResponseInterface
    {
        $imgData = addslashes(file_get_contents($_FILES['imagem_capa']['tmp_name']));
        $imgType = getimageSize($_FILES['imagem_capa']['tmp_name']);

        $imagem = new Image($_FILES['imagem_capa']['name'], $imgData, $imgType['mime']);
        $livro = new Book(
            $request->getParsedBody()["titulo"],
            $imagem,
            $request->getParsedBody()["autor"],
            $request->getParsedBody()["genero"],
            $request->getParsedBody()["exemplares"],
            null,
            $request->getParsedBody()["resumo"]
        );

        $livroDB = new BookDataBase();

        $response = new Response(302, ["Location" => "/lista"], null);

        return $response;
    }

    public function Genero(): ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/gerenciar/gerenciar_genero.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function AdicionarGenero(ServerRequestInterface $request): ResponseInterface
    {

        $genero = new Genre(
            $request->getParsedBody()["genero"],
            $request->getParsedBody()["select_genero"],
            null
        );

        $generoBD = new GenreDataBase();
        $generoBD->adicionar($genero);


        $response = new Response(302, ["Location" => "/lista"], null);

        return $response;
    }

    public function Emprestimo(): ResponseInterface
    {
        $aluno = new StudentDataBase();
        $livro = new BookDataBase();
        $listaAluno = $aluno->getStudent();
        $listaLivro = $livro->getBook();
        $bodyHttp = $this->getHTTPBodyBuffer("/gerenciar/gerenciar_emprestimo.php", ["listaAluno" => $listaAluno, "listaLivro" => $listaLivro ]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function AdicionarEmprestimo(ServerRequestInterface $request): ResponseInterface
    {

        $emprestimo = new Loan(
            $request->getParsedBody()["aluno"],
            $request->getParsedBody()["livro"],
            $request->getParsedBody()["data"],
            null
        );

        $emprestimoBD = new LoanDataBase();
        $emprestimoBD->adicionar($emprestimo);


        $response = new Response(302, ["Location" => "/arcevo"], null);

        return $response;
    }

    // public function addBook(ServerRequestInterface $request): ResponseInterface 
    // {
    //     $book = new Book(
    //         $request->getParsedBody()["bookName"],
    //         $request->getParsedBody()["bookClassificon"],
    //         $request->getParsedBody()["bookQuantity"]
    //     );

    //     $bookDataBase = new BookDataBase();
    //     $bookDataBase->add($book);

    //     $response = new Response(302, ["Location" => "/tabela/livro_nao_didatico"], null);

    //     return $response;
    // }

}
