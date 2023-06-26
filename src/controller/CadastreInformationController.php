<?php

namespace Library_ETE\controller;

use Library_ETE\model\Student;
use Library_ETE\model\User;
use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\StudentDataBase;
use Library_ETE\model\Data_Base\UserDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class CadastreInformationController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "cadastro-de-informacoes")) {
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
