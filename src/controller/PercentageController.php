<?php

namespace Library_ETE\controller;

use Library_ETE\model\Percentage;
use Library_ETE\model\Data_Base\BookDataBase;
use Library_ETE\model\Data_Base\PercentageDataBase;
use Library_ETE\controller\inheritance\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;


use Nyholm\Psr7\Response;

class PercentageController extends Controller implements RequestHandlerInterface
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
        } else if (strpos($path_info, "tabela")) {
            $response = $this->table($request);
            if (strpos($path_info, "edit")) {
                $response = $this->edit($request);
            } else if (strpos($path_info, "update")) {
                $response = $this->update($request);
            } else if (strpos($path_info, "delete")) {
                $response = $this->delete($request);
            }
        } else if (strpos($path_info, "grafico1ano")) {
            $response = $this->grafico1();
        }else if (strpos($path_info, "grafico2ano")) {
            $response = $this->grafico2();
        }else if (strpos($path_info, "grafico3ano")) {
            $response = $this->grafico3();
        }
        
        return $response;
    }
    public function cadastre(): ResponseInterface
    {
        $bookDataBase = new BookDataBase();
        $listNameBook = $bookDataBase->getNameTextBook();
        $bodyHTTP = $this->getHTTPBodyBuffer("/percentage/cadastre_percentage.php", ["listNameBook" => $listNameBook]);
        $response = new Response(200, [], $bodyHTTP);
        return $response;
    }

    public function add(ServerRequestInterface $request): ResponseInterface
    {
        $Percentage = new Percentage(
            $request->getParsedBody()["book"],
            $request->getParsedBody()["anoEscolar"],
            $request->getParsedBody()["serieEscolar"],
            $request->getParsedBody()["status"],
            $request->getParsedBody()["quantidade"],
            $request->getParsedBody()["year"]
        );

        $PercentageDataBase = new PercentageDataBase();
        $PercentageDataBase->add($Percentage);

        $response = new Response(302, ["Location" => "/percentual/tabela"], null);

        return $response;
    }

    public function table(): ResponseInterface
    {
        $PercentageDB = new PercentageDataBase();

        $listPercentage = $PercentageDB->getList();
        $bodyHttp = $this->getHTTPBodyBuffer("/percentage/table_percentage.php", ["listPercentage" => $listPercentage]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

    public function edit(ServerRequestInterface $request): ResponseInterface
    {
        $PercentageDB = new PercentageDataBase();
        $bookDataBase = new BookDataBase();
        $Percentage = $PercentageDB->getPercentage($request->getQueryParams()["id"]);
        $listNameBook = $bookDataBase->getNameBook();
        $bodyHttp = $this->getHTTPBodyBuffer("/percentage/edit_percentage.php", ["Percentage" => $Percentage, "listNameBook" => $listNameBook]);
        $response = new Response(200, [], $bodyHttp);

        return $response;
    }

    public function update(ServerRequestInterface $request): ResponseInterface
    {
        $PercentageDB = new PercentageDataBase();
        $Percentage = new Percentage(
            $request->getParsedBody()["updateBook"],
            $request->getParsedBody()["updateAnoEscolar"],
            $request->getParsedBody()["updateSerieEscolar"],
            $request->getParsedBody()["uptadeStatus"],
            $request->getParsedBody()["uptadeQuantidade"],
            $request->getParsedBody()["uptadeAno"],
            $request->getQueryParams()["id"]
        );

        $PercentageDB->update($Percentage);

        $response = new Response(302, ["Location" => "/percentual/tabela"], null);
        return $response;
    }

    public function delete(ServerRequestInterface $request): ResponseInterface
    {
        $PercentageDB = new PercentageDataBase();
        $PercentageDB->delete($request->getQueryParams()["id"]);

        $response = new Response(302, ["Location" => "/percentual/tabela"], null);
        return $response;
    }

    public function grafico1(): ResponseInterface
    {
        $PercentageDB = new PercentageDataBase();

        $listPercentage = $PercentageDB->graficoBook("1º");
        $bodyHttp = $this->getHTTPBodyBuffer("/percentage/grafico1ano.php", ["listPercentage" => $listPercentage]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function grafico2(): ResponseInterface
    {
        $PercentageDB = new PercentageDataBase();

        $listPercentage = $PercentageDB->graficoBook("2º");
        $bodyHttp = $this->getHTTPBodyBuffer("/percentage/grafico2ano.php", ["listPercentage" => $listPercentage]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }
    public function grafico3(): ResponseInterface
    {
        $PercentageDB = new PercentageDataBase();

        $listPercentage = $PercentageDB->graficoBook("3º");
        $bodyHttp = $this->getHTTPBodyBuffer("/percentage/grafico3ano.php", ["listPercentage" => $listPercentage]);
        $response = new Response(200, [], $bodyHttp);
        return $response;
    }

}
