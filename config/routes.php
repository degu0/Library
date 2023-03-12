<?php

use Library_ETE\controller\HomeController;
use Library_ETE\controller\ErroController;

return [
    "/" => HomeController::class,
    "/erro" => ErroController::class,
];
