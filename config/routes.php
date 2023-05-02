<?php

use Library_ETE\controller\HomeController;
use Library_ETE\controller\ErroController;
use Library_ETE\controller\CadastreController;
use Library_ETE\controller\AboutController;
use Library_ETE\controller\BookController;
use Library_ETE\controller\GenreController;
use Library_ETE\controller\LoginController;
use Library_ETE\controller\ShareController;
use Library_ETE\controller\EditController;
use Library_ETE\controller\AcervoController;

return [
    "/home" => HomeController::class,
    "/home/pesquisar" => HomeController::class,
    "/home/delete" => HomeController::class,
    "/home/adiar" => HomeController::class,
    "/gerenciar/livro" => CadastreController::class,
    "/gerenciar/livro/add" => CadastreController::class,
    "/gerenciar/genero" => CadastreController::class,
    "/gerenciar/genero/add" => CadastreController::class,
    "/gerenciar/emprestimo" => CadastreController::class,
    "/generos/didaticos" => GenreController::class,
    "/generos/paradidaticos" => GenreController::class,
    "/livros" => BookController::class,
    "/livros/livro" => BookController::class,
    "/login" => LoginController::class,
    "/login/logar" => LoginController::class,
    "/login/deslog" => LoginController::class,
    "/login/cadastro" => LoginController::class,
    "/login/cadastro/add" => LoginController::class,
    "/editar/livro" => EditController::class,
    "/editar/genero" => EditController::class,
    "/acervo" => AcervoController::class,
    "/pesquisa" => ShareController::class,
    "/sobre" => AboutController::class,
    "/erro" => ErroController::class,
];
