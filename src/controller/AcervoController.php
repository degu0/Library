<?php

namespace Library_ETE\controller;

use Library_ETE\controller\inheritance\Controller;
use Library_ETE\model\Data_Base\LoanDataBase;
use Library_ETE\model\Data_Base\HistoryDataBase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class AcervoController extends Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $path_info = $request->getServerParams()["PATH_INFO"];
        $response = null;

        if (strpos($path_info, "acervo")) {
            $response = $this->acervo();
        }else {
            $bodyHttp = $this->getHTTPBodyBuffer("/erro/erro_404.php",);
            $response = new Response(200, [], $bodyHttp);
        }
        return $response;
    }

    public function acervo() : ResponseInterface
    {
        $emprestimo = new LoanDataBase();
        $historico = new HistoryDataBase();
        $listaEmprestimo = $emprestimo->getLoan();
        $listaHisotrico = $historico->getHistory();
        $bodyHTTP = $this->getHTTPBodyBuffer("/acervo/acervo.php", ["listaEmprestimo" => $listaEmprestimo, "listaHistorico" => $listaHisotrico]);
        $response = new Response(200, [], $bodyHTTP);

        return $response;
    }
}
