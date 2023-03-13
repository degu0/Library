<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class PercentageController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $bodyHTTP = $this->getHTTPBodyBuffer("/percentage/percentage.php");
        $response = new Response(200, [], $bodyHTTP);
        return $response;
    }
}