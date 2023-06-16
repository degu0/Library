<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\User;
use Library_ETE\model\Data_Base\UserDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;
use Nyholm\Psr7\ServerRequest;

class LoginController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "login")) {
            $response = $this->login();
            if (strpos($path_info, "logar")) {
                $response = $this->logar($request);
            } else if (strpos($path_info, "deslog")) {
                $response = $this->deslogar();
            } else if (strpos($path_info, "cadastro")) {
                $response = $this->cadastro($request);
                if (strpos($path_info, "add")) {
                    $response = $this->addUser($request);
                }
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }


    public function login(): ResponseInterface
    {
        $bodyHTTP = $this->getHTTPBodyBuffer("/login/login.php");
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }


    public function logar(ServerRequestInterface $request): ResponseInterface
    {
        $usuarioBD = new UserDataBase;
        $emprestimoBD = new LoanDataBase;
        $loginUsuario = $request->getParsedBody()["email"];
        $senhaUsuario = $request->getParsedBody()["senha"];
        $user = new User(null, $loginUsuario, $senhaUsuario, null, null);
        $senhaMD5 = $user->getSenhaMd5();
        $usuario = $usuarioBD->queryLogin($loginUsuario, $senhaMD5);
        $nomeUsuario = $usuarioBD->queryName($loginUsuario, $senhaMD5);
        $tipo_usuario = $usuarioBD->queryType($loginUsuario, $senhaMD5);
        $idUsuario = $usuarioBD->queryId($loginUsuario, $senhaMD5);

        if (!empty($usuario)) {
            $_SESSION["id_usuario"] = $idUsuario;
            $_SESSION["usuario"] = $nomeUsuario;
            $_SESSION["tipo_usuario"] = $tipo_usuario;

            if ($tipo_usuario == "aluno") {
                $temEmprestimo = $emprestimoBD->verificationStudent($idUsuario);
                if ($temEmprestimo) {
                    $_SESSION['emprestimo'] = true;
                }
            }
            return new Response(302, ["Location" => "/home"],);
        } else {
            $bodyHTTP = $this->getHTTPBodyBuffer("/login/login.php", ["loginIncorreto" => true, "SenhaIncorreta" => true]);
            return new Response(200, [], $bodyHTTP);
        }
    }

    public function deslogar(): ResponseInterface
    {
        session_unset();
        return new Response(302, ["Location" => "/home"],);
    }


    public function cadastro(ServerRequestInterface $request): ResponseInterface
    {
        $usuarioBD = new UserDataBase();
        if ($usuarioBD->getType($request->getQueryParams()['id_usuario']) != 'funcionario' || !isset($request->getQueryParams()['id_usuario'])) {
            $response = new Response(302, ["Location" => "/home"], null);
        } else {
            $bodyHTTP = $this->getHTTPBodyBuffer("/login/cadastro_user.php");
            $response = new Response(200, [], $bodyHTTP);
        }

        return $response;
    }

    public function addUser(ServerRequestInterface $request): ResponseInterface
    {
        $usuarioBD = new UserDataBase();
        $nome = $request->getParsedBody()["nome"];
        $email = $request->getParsedBody()["email"];
        $senha = $request->getParsedBody()["senha"];
        $confirma_senha = $request->getParsedBody()["confirmaSenha"];
        $tipo_usuario = $request->getParsedBody()["tipoUser"];

        if ($confirma_senha == $senha) {
            $usuario = new User(
                $nome,
                $email,
                $senha,
                null,
                $tipo_usuario
            );



            $usuarioBD->adicionar($usuario);

            if ($tipo_usuario == 'aluno') {
                $response = new Response(302, ['Location' => "/cadastro-de-informacoes"]);
            } else {
                $response = new Response(302, ["Location" => "/home"], null);
            }
            return $response;
        }
        $bodyHTTP = $this->getHTTPBodyBuffer("/login/cadastro_user.php", ["SenhaIncorreta" => true]);
        return new Response(200, [], $bodyHTTP);
    }
}
