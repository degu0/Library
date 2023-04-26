<?php

namespace Library_ETE\controller\inheritance;

use Nyholm\Psr7\Response;

class Controller
{
    public function getHTTPBodyBuffer(String $viewPath, array $datas = [])
    {
        ob_start();
        extract($datas);
        require __DIR__ . '/../../view' . $viewPath;
        $bodyHTTP = ob_get_clean();
        return $bodyHTTP;
    }
}
