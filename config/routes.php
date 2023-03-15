<?php

use Library_ETE\controller\HomeController;
use Library_ETE\controller\ErroController;
use Library_ETE\controller\CadastreController;
use Library_ETE\controller\LoanController;
use Library_ETE\controller\TableController;
use Library_ETE\controller\PercentageController;

return [
    "/" => HomeController::class,
    "/erro" => ErroController::class,
    "/cadastro" => CadastreController::class,
    "/cadastro/pessoa" => CadastreController::class,
    "/cadastro/pessoa/add" => CadastreController::class,
    "/cadastro/livro" => CadastreController::class,
    "/cadastro/livro/add" => CadastreController::class,
    "/cadastro/livro/edit" => CadastreController::class,
    "/cadastro/livro/update" => CadastreController::class,
    "/cadastro/livro/delete" => CadastreController::class,
    "/emprestimo" => LoanController::class,
    "/tabela" => TableController::class,
    "/tabela/pessoa" => TableController::class,
    "/tabela/livro" => TableController::class,
    "/percentual" => PercentageController::class
];
