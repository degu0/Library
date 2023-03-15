<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\BD\BookDataBase;
use Library_ETE\model\BD\PeopleDataBase;
use Library_ETE\model\People;
use Library_ETE\model\Book;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class TableController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "pessoa")) {
            $response = $this->people();
            if (strpos($path_info, "edit")) {
                $response = $this->editPeople($request);
            } else if (strpos($path_info, "update")) {
                $response = $this->updatePeople($request);
            } else if (strpos($path_info, "delete")) {
                $response = $this->deletePeople($request);
            } 
        } else if (strpos($path_info, "livro")) {
            $response = $this->book();
            if (strpos($path_info, "edit")) {
                $response = $this->editBook($request);
            } else if (strpos($path_info, "update")) {
                $response = $this->updateBook($request);
            } else if (strpos($path_info, "delete")) {
                $response = $this->deleteBook($request);
            } 
        }else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function people() : ResponseInterface
    {
        $peopleDB = new PeopleDataBase();

        $listPeople = $peopleDB->getList();
        $bodyHttp = $this->getHTTPBodyBuffer("/table/people.php",["listPeople" => $listPeople]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function editPeople(ServerRequestInterface $request): ResponseInterface
    {
        $peopleDB = new PeopleDataBase();
        $people = $peopleDB->getPeople($request->getQueryParams()["id"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/edit/people.php", ["people" => $people]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }

    public function updatePeople(ServerRequestInterface $request):ResponseInterface
    {
        $peopleDB = new PeopleDataBase();
        $people = new People(
            $request->getParsedBody()["peopleName"],
            $request->getParsedBody()["peopleTrade"],
            $request->getParsedBody()["peopleClass"]
        );

        $peopleDB->update($people);

        $response = new Response(302, ["Location" => "/tabela/livro"], null);
        return $response;
    }

    public function deletePeople(ServerRequestInterface $request): ResponseInterface
    {
        $peopleDB = new PeopleDataBase();
        $peopleDB->delete($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/tabela/livro"], null);
        return $response;
    }


    public function book() : ResponseInterface
    {
        $bookBD = new BookDataBase();

        $listBook = $bookBD->getList();
        $bodyHttp = $this->getHTTPBodyBuffer("/table/book.php", ["listBook" => $listBook]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function editBook(ServerRequestInterface $request): ResponseInterface
    {
        $bookDB = new BookDataBase();
        $book = $bookDB->getBook($request->getQueryParams()["id"]);
        $bodyHttp = $this->getHTTPBodyBuffer("/edit/book.php", ["book" => $book]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }

    public function updateBook(ServerRequestInterface $request):ResponseInterface
    {
        $bookDB = new BookDataBase();
        $book = new Book(
            $request->getParsedBody()["bookName"],
            $request->getParsedBody()["bookClassificon"],
            $request->getParsedBody()["bookQuantity"]
        );

        $bookDB->update($book);

        $response = new Response(302, ["Location" => "/tabela/livro"], null);
        return $response;
    }

    public function deleteBook(ServerRequestInterface $request): ResponseInterface
    {
        $bookDB = new BookDataBase();
        $bookDB->delete($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/tabela/livro"], null);
        return $response;
    }

}
