<?php

use Library_ETE\controller\HomeController;
use Library_ETE\controller\ErroController;
use Library_ETE\controller\CadastreController;
use Library_ETE\controller\LoanController;
use Library_ETE\controller\TableController;
use Library_ETE\controller\PercentageController;

return [
    "/home" => HomeController::class,
    "/home/pesquisar" => HomeController::class,
    "/home/delete" => HomeController::class,
    "/home/adiar" => HomeController::class,
    "/erro" => ErroController::class,
    "/cadastro/pessoa" => CadastreController::class,
    "/cadastro/pessoa/add" => CadastreController::class,
    "/cadastro/livro" => CadastreController::class,
    "/cadastro/livro/add" => CadastreController::class,
    "/emprestimo/cadastro" => LoanController::class,
    "/emprestimo/cadastro/add" => LoanController::class,
    "/emprestimo/tabela" => LoanController::class,
    "/emprestimo/tabela/edit" => LoanController::class,
    "/emprestimo/tabela/update" => LoanController::class,
    "/emprestimo/tabela/delete" => LoanController::class,
    "/tabela/aluno" => TableController::class,
    "/tabela/aluno/edit" => TableController::class,
    "/tabela/aluno/update" => TableController::class,
    "/tabela/aluno/delete" => TableController::class,
    "/tabela/funcionario" => TableController::class,
    "/tabela/funcionario/edit" => TableController::class,
    "/tabela/funcionario/update" => TableController::class,
    "/tabela/funcionario/delete" => TableController::class,
    "/tabela/livro_nao_didatico" => TableController::class,
    "/tabela/livro_nao_didatico/edit" => TableController::class,
    "/tabela/livro_nao_didatico/update" => TableController::class,
    "/tabela/livro_nao_didatico/delete" => TableController::class,
    "/tabela/livro_didatico" => TableController::class,
    "/tabela/livro_didatico/edit" => TableController::class,
    "/tabela/livro_didatico/update" => TableController::class,
    "/tabela/livro_didatico/delete" => TableController::class,
    "/tabela/livro_tecnico" => TableController::class,
    "/tabela/livro_tecnico/edit" => TableController::class,
    "/tabela/livro_tecnico/update" => TableController::class,
    "/tabela/livro_tecnico/delete" => TableController::class,
    "/percentual" => PercentageController::class
];
