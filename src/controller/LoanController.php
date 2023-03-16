<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Loan;
use Library_ETE\model\Data_Base\BookDataBase;
use Library_ETE\model\Data_Base\PeopleDataBase;
use Library_ETE\model\Data_Base\LoanDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class LoanController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "cadastro")) {
            $response = $this->cadastre();
            if (strpos($path_info, "add")) {
                $response = $this->add($request);
            }
        }else if (strpos($path_info, "tabela")) {
            $response = $this->table($request);
            // if (strpos($path_info, "edit")) {
            //     $response = $this->edit($request);
            // } else if (strpos($path_info, "update")) {
            //     $response = $this->update($request);
            // } else if (strpos($path_info, "delete")) {
            //     $response = $this->delete($request);
            // } 
        }

        return $response;
    }

    public function cadastre(): ResponseInterface
    {
        $peopleDataBase = new PeopleDataBase();
        $listNamePeople = $peopleDataBase->getNamePeople();
        $bookDataBase = new BookDataBase();
        $listNameBook = $bookDataBase->getNameBook();

        $bodyHTTP = $this->getHTTPBodyBuffer("/loan/loan.php", ["listNamePeople" => $listNamePeople, "listNameBook" => $listNameBook]);
        $response = new Response(200, [], $bodyHTTP);
        return $response;
    }

    public function add(ServerRequestInterface $request): ResponseInterface
    {
        $loan = new Loan(
            $request->getParsedBody()["loanPeople"],
            $request->getParsedBody()["loanBook"],
            $request->getParsedBody()["loanDate"],
            $request->getParsedBody()["loanDateFinal"]
        );

        $loanDataBase = new LoanDataBase();
        $loanDataBase->add($loan);

        $response = new Response(302, ["Location" => "/emprestimo/tabela"], null);

        return $response;
    }

    public function table() : ResponseInterface
    {
        $loanDB = new LoanDataBase();

        $listLoan = $loanDB->getList();
        $bodyHttp = $this->getHTTPBodyBuffer("/loan/table.php",["listLoan" => $listLoan]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    // public function edit(ServerRequestInterface $request): ResponseInterface
    // {
    //     $loanDB = new LoanDataBase();
    //     $loan = $loanDB->getLoan($request->getQueryParams()["id"]);
    //     $bodyHttp = $this->getHTTPBodyBuffer("/loan/edit.php", ["loan" => $loan]);
    //     $response = new Response(200, [], $bodyHttp);

    //     return $response;
    // }

    // public function update(ServerRequestInterface $request):ResponseInterface
    // {
    //     $loanDB = new LoanDataBase();
    //     $loan = new Loan(
    //         $request->getParsedBody()["loanPeople"],
    //         $request->getParsedBody()["loanBook"],
    //         $request->getParsedBody()["loanDate"],
    //         $request->getParsedBody()["loanDateFinal"],
    //         $request->getQueryParams()["id"]
    //     );

    //     $loanDB->update($loan);

    //     $response = new Response(302, ["Location" => "/emprestimo/tabela"], null);
    //     return $response;
    // }

    // public function delete(ServerRequestInterface $request): ResponseInterface
    // {
    //     $loanDB = new LoanDataBase();
    //     $loanDB->delete($request->getQueryParams()["id"]);

    //     $response = new Response(302, ["Location" => "/tabela/livro"], null);
    //     return $response;
    // }
}
