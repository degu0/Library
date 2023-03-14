<?php

namespace Library_ETE\controller;

use Library_ETE\model\People;
use Library_ETE\model\Book;
use Library_ETE\model\BD\PeopleDataBase;
use Library_ETE\model\BD\BookDataBase;
use Library_ETE\controller\inheritance\Controller;
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

        if (strpos($path_info, "pessoa")) {
            $response = $this->people();
            if (strpos($path_info, "add")) {
                $response = $this->addPeople($request);
            }
        } else if (strpos($path_info, "livro")) {
            $response = $this->book();
            if (strpos($path_info, "add")) {
                $response = $this->addBook($request);
            }
        }else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function people() : ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/cadastre/people.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function addPeople(ServerRequestInterface $request): ResponseInterface 
    {
        $people = new People(
            $request->getParsedBody()["idPeopleName"],
            $request->getParsedBody()["idPeopleTrade"],
            $request->getParsedBody()["idPeopleClass"]
        );

        $peopleDataBase = new PeopleDataBase();
        $peopleDataBase->add($people);

        $response = new Response(302, ["Location" => "/tabela/pessoa"], null);

        return $response;
    }

    public function book() : ResponseInterface
    {
        $bodyHttp = $this->getHTTPBodyBuffer("/cadastre/book.php");
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function addBook(ServerRequestInterface $request): ResponseInterface 
    {
        $book = new Book(
            $request->getParsedBody()["bookName"],
            $request->getParsedBody()["bookClassificon"],
            $request->getParsedBody()["bookQuantity"]
        );

        $bookDataBase = new BookDataBase();
        $bookDataBase->add($book);

        $response = new Response(302, ["Location" => "/tabela/pessoa"], null);

        return $response;
    }

}
