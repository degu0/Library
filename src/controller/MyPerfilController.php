<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\Data_Base\StudentDataBase;
use Library_ETE\model\Data_Base\UserDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class MyPerfilController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "meu-perfil")) {
            $response = $this->Perfil($request);
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }
    public function Perfil(ServerRequestInterface $request): ResponseInterface
    {
        $idPerfil = $request->getQueryParams()['id'];
        if($_SESSION['tipo_usuario'] == 'aluno') {
            $aluno = new StudentDataBase();
            $emprestimoBD = new LoanDataBase(); 
            $perfil = $aluno->getPerfilAluno($idPerfil);
            $emprestimo = $emprestimoBD->queryLoanStudent($idPerfil);
            $bodyHTTP = $this->getHTTPBodyBuffer("/aluno/perfil.php", ['meuPerfil' => $perfil, 'ListLoan' => $emprestimo]);
            $response = new Response(200, [], $bodyHTTP);
    
            return $response;
        } else {
            $user = new UserDataBase();
            $perfilUsuario = $user->getUser($idPerfil);
            $bodyHTTP = $this->getHTTPBodyBuffer("/perfil/meu_perfil.php", ["meuPerfil" => $perfilUsuario]);
            $response = new Response(200, [], $bodyHTTP);
    
            return $response;
        }

    }
}
