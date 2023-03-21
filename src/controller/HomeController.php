<?php

namespace Library_ETE\controller;

use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\controller\inheritance\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class HomeController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "home")) {
            $response = $this->home();
            if (strpos($path_info, "pesquisar")) {
                $response = $this->search($request);
            } else if (strpos($path_info, "delete")) {
                $response = $this->delete($request);
            }
        }
        return $response;
    }

    public function home() : ResponseInterface
    {
        $loanDB = new LoanDataBase();

        $listLoan = $loanDB->getList();
        $bodyHTTP = $this->getHTTPBodyBuffer("/home/home.php", ["listLoan" => $listLoan]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }

    public function search(ServerRequestInterface $request): ResponseInterface
    {
        $loanDataBase = new LoanDataBase();
        $dados =  $loanDataBase->search($request->getQueryParams()["busca"]);
        $bodyHTTP = $this->getHTTPBodyBuffer("/home/home.php", ["listLoan" => $dados]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }

    public function delete(ServerRequestInterface $request): ResponseInterface
    {
        $loanDB = new LoanDataBase();
        $loanDB->delete($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/home"], null);
        return $response;
    }
}
