<?php

namespace Library_ETE\controller;

use Library_ETE\model\Book;
use Library_ETE\model\Image;
use Library_ETE\model\Genre;
use Library_ETE\model\Student;
use Library_ETE\model\Loan;
use Library_ETE\model\User;
use Library_ETE\model\History;
use Library_ETE\model\Data_Base\BookDataBase;
use Library_ETE\model\Data_Base\GenreDataBase;
use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\Data_Base\StudentDataBase;
use Library_ETE\model\Data_Base\HistoryDataBase;
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
                } else if (strpos($path_info, "editar")) {
                    $response = $this->EditarEmprestimo($request);
                } else if (strpos($path_info, "update")) {
                    $response = $this->UpdateEmprestimo($request);
                }
            }
        } else if(strpos($path_info, "cadastro-de-informacoes")){
            $response = $this->CadastroDeInformacaoAluno();
            if (strpos($path_info, "add")) {
                $response = $this->AdicionarInformacoesDoAluno($request);
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
        $listGenre = $genero->getListGenre();
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
        $historicoBD = new HistoryDataBase();
        $livroBD = new BookDataBase();
        $emprestimoBD->adicionar($emprestimo);
        $historicoBD->adicionar($emprestimo);
        $livroBD->tirarDisponivel($request->getParsedBody()["livro"]);


        $response = new Response(302, ["Location" => "/confirmacao/emprestimo"], null);

        return $response;
    }

    public function CadastroDeInformacaoAluno() : ResponseInterface 
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/aluno/cadastro_informacao.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function AdicionarInformacoesDoAluno(ServerRequestInterface $request) : ResponseInterface
    {
        $vazio = new User(null, null, null, null, null, null);
        $aluno = new Student(
            $vazio,
            $request->getParsedBody()["matricula"],
            $request->getParsedBody()["numeroAluno"],
            $request->getParsedBody()["numeroResponsavel"],
            null
        );

        $alunoBD = new StudentDataBase();
        $alunoBD->adicionar($aluno);


        $response = new Response(302, ["Location" => "/home"], null);

        return $response;
    }

    public function EditarEmprestimo(ServerRequestInterface $request) : ResponseInterface
    {
        $alunoBD = new StudentDataBase();
        $livroBD = new BookDataBase();
        $emprestimoBD = new LoanDataBase();
        $listaAluno = $alunoBD->getStudent();
        $listaLivro = $livroBD->getBook();
        $emprestimo = $emprestimoBD->queryLoan($request->getQueryParams()["id"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/livro/edit_livro.php", ["emprestimo" => $emprestimo, "listaAluno" => $listaAluno, "listaLivro" => $listaLivro]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }

    public function UpdateEmprestimo(ServerRequestInterface $request) : ResponseInterface
    {
        $emprestimo = new Loan(
            $request->getParsedBody()["aluno"],
            $request->getParsedBody()["livro"],
            $request->getParsedBody()["data"],
            null
        );

        $emprestimoBD = new LoanDataBase();
        $emprestimoBD->updateLoan($emprestimo);


        $response = new Response(302, ["Location" => "/confirmacao/emprestimo"], null);

        return $response;
    }
}
