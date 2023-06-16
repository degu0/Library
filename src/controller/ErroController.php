<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ErroController extends Controller implements RequestHandlerInterface
{
   public function handle(ServerRequestInterface $request): ResponseInterface
   {
      $bodyHTTP = $this->getHTTPBodyBuffer("/erro/erro_404.php");
      $response = new Response(404, ["Serve" => "Library Server"], $bodyHTTP);
      return $response;
   }
}
