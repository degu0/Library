<?php

namespace Library_ETE\controller;

use Library_ETE\model\Book;
use Library_ETE\model\Image;
use Library_ETE\model\Genre;
use Library_ETE\model\Student;
use Library_ETE\model\Loan;
use Library_ETE\model\User;
use Library_ETE\model\Data_Base\BookDataBase;
use Library_ETE\model\Data_Base\GenreDataBase;
use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\Data_Base\StudentDataBase;
use Library_ETE\model\Data_Base\HistoryDataBase;
use Library_ETE\model\Data_Base\UserDataBase;
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
                $response = $this->Livro(false);
                if (strpos($path_info, "add")) {
                    $response = $this->AdicionarLivro($request);
                }
            } else if (strpos($path_info, "genero")) {
                $response = $this->Genero(false);
                if (strpos($path_info, "add")) {
                    $response = $this->AdicionarGenero($request);
                } else if (strpos($path_info, "update")) {
                    $response = $this->UpdateGenre($request);
                }
            } else if (strpos($path_info, "emprestimo")) {
                $response = $this->Emprestimo(false);
                if (strpos($path_info, "add")) {
                    $response = $this->AdicionarEmprestimo($request);
                } else if (strpos($path_info, "editar")) {
                    $response = $this->EditarEmprestimo($request);
                } else if (strpos($path_info, "update")) {
                    $response = $this->UpdateEmprestimo($request);
                }
            }
        } else if (strpos($path_info, "cadastro-de-informacoes")) {
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
            }else {
                $response = $this->Livro(true);
                return $response;
            }
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

    public function Emprestimo($ahEmprestimo): ResponseInterface
    {
        $aluno = new StudentDataBase();
        $livro = new BookDataBase();
        $listaAluno = $aluno->getStudent();
        $listaLivro = $livro->getBook();
        $bodyHttp = $this->getHTTPBodyBuffer("/gerenciar/gerenciar_emprestimo.php", ["listaAluno" => $listaAluno, "listaLivro" => $listaLivro, "ahEmprestimo" => $ahEmprestimo]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function AdicionarEmprestimo(ServerRequestInterface $request): ResponseInterface
    {
        $emprestimoBD = new LoanDataBase();
        $ahEmprestimo = $emprestimoBD->verificacaoDeEmprestimo($request->getParsedBody()["aluno"], $request->getParsedBody()["livro"]);
        if ($ahEmprestimo) {
            $response = $this->Emprestimo(true);
            return $response;
        } else {
            if ($request->getParsedBody()['data'] == null) {
                $data = date('Y/m/d');
            } else {
                $data = $request->getParsedBody()['data'];
            }

            $emprestimo = new Loan(
                $request->getParsedBody()["aluno"],
                $request->getParsedBody()["livro"],
                $data,
                null
            );


            $historicoBD = new HistoryDataBase();
            $livroBD = new BookDataBase();
            $emprestimoBD->adicionar($emprestimo);
            $historicoBD->adicionar($emprestimo);
            $livroBD->tirarDisponivel($request->getParsedBody()["livro"]);


            $response = new Response(302, ["Location" => "/confirmacao/emprestimo"], null);

            return $response;
        }
    }

    public function EditarEmprestimo(ServerRequestInterface $request): ResponseInterface
    {
        $alunoBD = new StudentDataBase();
        $livroBD = new BookDataBase();
        $emprestimoBD = new LoanDataBase();
        $listaAluno = $alunoBD->getStudent();
        $listaLivro = $livroBD->getBook();
        $emprestimo = $emprestimoBD->queryLoan($request->getQueryParams()["id"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/edit/edit_emprestimo.php", ["emprestimo" => $emprestimo, "listaAluno" => $listaAluno, "listaLivro" => $listaLivro]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }

    public function UpdateEmprestimo(ServerRequestInterface $request): ResponseInterface
    {
        if ($request->getParsedBody()['data'] == null) {
            $data = date('Y/m/d');
        } else {
            $data = $request->getParsedBody()['data'];
        }
        $emprestimo = new Loan(
            $request->getParsedBody()["aluno"],
            $request->getParsedBody()["livro"],
            $data,
            null,
            $request->getQueryParams()["id"]
        );


        $emprestimoBD = new LoanDataBase();
        $emprestimoBD->updateLoan($emprestimo);


        $response = new Response(302, ["Location" => "/confirmacao/emprestimo"], null);

        return $response;
    }

    public function CadastroDeInformacaoAluno(): ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/aluno/cadastro_informacao.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function AdicionarInformacoesDoAluno(ServerRequestInterface $request): ResponseInterface
    {
        $userBD = new UserDataBase();
        $id_user = $userBD->getLastStudent();
        $user = new User(null, null, null, null, null, $id_user);
        $aluno = new Student(
            $user,
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
}
