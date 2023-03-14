<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\BD\BookDataBase;
use Library_ETE\model\BD\PeopleDataBase;
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
        } else if (strpos($path_info, "livro")) {
            $response = $this->book();
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

    public function book() : ResponseInterface
    {
        $bookBD = new BookDataBase();

        $listBook = $bookBD->getList();
        $bodyHttp = $this->getHTTPBodyBuffer("/table/book.php", ["listBook" => $listBook]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
}
