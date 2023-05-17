<?php

namespace Library_ETE\controller;

use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\BookDataBase;
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
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function home(): ResponseInterface
    {
        $loanBD = new LoanDataBase();
        $listLoan = $loanBD->getLoan();
        $bodyHTTP = $this->getHTTPBodyBuffer("/home/home.php", ['listLoan' => $listLoan]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }

    // public function search(ServerRequestInterface $request): ResponseInterface
    // {
    //     $loanDataBase = new LoanDataBase();
    //     $dados =  $loanDataBase->search($request->getQueryParams()["busca"]);
    //     $bodyHTTP = $this->getHTTPBodyBuffer("/home/home.php", ["listLoan" => $dados]);
    //     $response = new Response(200, [], $bodyHTTP);

    //     return $response;
    // }

    public function delete(ServerRequestInterface $request): ResponseInterface
    {
        $loanDB = new LoanDataBase();
        $loanDB->delete($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/home"], null);
        return $response;
    }

    public function adiar(ServerRequestInterface $request): ResponseInterface
    {
        $loanDB = new LoanDataBase();
        $id = $request->getQueryParams()["id"];
        $dadoDate = $loanDB->getDate($id);
        $loanDB->updateDate($id, $dadoDate);

        $response = new Response(302, ["Location" => "/home"], null);
        return $response;
    }

}
