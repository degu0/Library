<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

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
                $response = $this->deslogar($request);
            }
        }
        return $response;
    }


    public function login()
    {
        $bodyHTTP = $this->getHTTPBodyBuffer("/login/login.php");
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }


    public function logar()
    {
        # code...
    }

    public function deslogar()
    {
        # code...
    }
    
}
