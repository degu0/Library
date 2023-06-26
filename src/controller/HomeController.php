<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\Data_Base\RequestDataBase;
use Library_ETE\model\Data_Base\BookDataBase;
use Library_ETE\model\Data_Base\HistoryDataBase;
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
            if (strpos($path_info, 'delete')) {
                $response = $this->delete($request);
            } else if (strpos($path_info, 'adiar')) {
                $response = $this->adiar($request);
            }
        } else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function home(): ResponseInterface
    {
        $loanBD = new LoanDataBase();
        $requestBD = new RequestDataBase();
        $listLoan = $loanBD->getLoan();
        $listRequest = $requestBD->getRequest();
        $bodyHTTP = $this->getHTTPBodyBuffer("/home/home.php", ['listLoan' => $listLoan, 'listRequest' => $listRequest] );
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }

    public function delete(ServerRequestInterface $request): ResponseInterface
    {
        $id = $request->getQueryParams()["id"];
        $loanDB = new LoanDataBase();
        $historyDB = new HistoryDataBase();
        $loanDB->delete($id);
        $historyDB->devolucao($id);

        $response = new Response(302, ["Location" => "/home"], null);
        return $response;
    }

    public function adiar(ServerRequestInterface $request): ResponseInterface
    {
        $loanDB = new LoanDataBase();
        $historyDB = new HistoryDataBase();
        $id = $request->getQueryParams()["id"];
        $dadoDate = $loanDB->getDate($id);
        $loanDB->updateDate($id, $dadoDate);
        $historyDB->adiamento($id);


        $response = new Response(302, ["Location" => "/home"], null);
        return $response;
    }
}
