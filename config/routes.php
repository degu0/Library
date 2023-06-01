<?php

use Library_ETE\controller\HomeController;
use Library_ETE\controller\ErroController;
use Library_ETE\controller\CadastreController;
use Library_ETE\controller\AboutController;
use Library_ETE\controller\BookController;
use Library_ETE\controller\ListController;
use Library_ETE\controller\GenreController;
use Library_ETE\controller\LoginController;
use Library_ETE\controller\SearchController;
use Library_ETE\controller\EditController;
use Library_ETE\controller\AcervoController;
use Library_ETE\controller\MyPerfilController;
use Library_ETE\controller\ConfirmationScreenController;
use Library_ETE\controller\LoanController;

return [
    "/home" => HomeController::class,
    "/home/pesquisar" => HomeController::class,
    "/home/delete" => HomeController::class,
    "/home/adiar" => HomeController::class,
    "/gerenciar/livro" => CadastreController::class,
    "/gerenciar/livro/add" => CadastreController::class,
    "/gerenciar/genero" => CadastreController::class,
    "/gerenciar/genero/add" => CadastreController::class,
    "/gerenciar/genero/update" => CadastreController::class,
    "/gerenciar/emprestimo" => CadastreController::class,
    "/gerenciar/emprestimo/add" => CadastreController::class,
    "/gerenciar/emprestimo/editar" => CadastreController::class,
    "/gerenciar/emprestimo/update" => CadastreController::class,
    "/cadastro-de-informacoes" => CadastreController::class,
    "/cadastro-de-informacoes/add" => CadastreController::class,
    "/generos/didaticos" => GenreController::class,
    "/generos/didaticos/editar" => GenreController::class,
    "/generos/didaticos/excluir" => GenreController::class,
    "/generos/literatura" => GenreController::class,
    "/generos/literatura/editar" => GenreController::class,
    "/generos/literatura/excluir" => GenreController::class,
    "/lista" => ListController::class,
    "/livro" => BookController::class,
    "/livro/editar" => BookController::class,
    "/livro/update" => BookController::class,
    "/livro/excluir" => BookController::class,
    "/livro/emprestimo" => BookController::class,
    "/login" => LoginController::class,
    "/login/logar" => LoginController::class,
    "/login/deslog" => LoginController::class,
    "/login/cadastro" => LoginController::class,
    "/login/cadastro/add" => LoginController::class,
    "/editar/livro" => EditController::class,
    "/editar/genero" => EditController::class,
    "/confirmacao/emprestimo" => ConfirmationScreenController::class,
    "/confirmacao/devolucao" => ConfirmationScreenController::class,
    "/emprestimo" => LoanController::class,
    "/meu-perfil" => MyPerfilController::class,
    "/acervo" => AcervoController::class,
    "/pesquisa" => SearchController::class,
    "/sobre" => AboutController::class,
    "/erro" => ErroController::class,
];
