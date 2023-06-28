<?php

use Library_ETE\controller\HomeController;
use Library_ETE\controller\ErroController;
use Library_ETE\controller\CadastreInformationController;
use Library_ETE\controller\CadastreBookController;
use Library_ETE\controller\CadastreGenreController;
use Library_ETE\controller\CadastreLoanController;
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
use Library_ETE\controller\RequestController;

return [
    "/home" => HomeController::class,
    "/home/pesquisar" => HomeController::class,
    "/home/delete" => HomeController::class,
    "/home/adiar" => HomeController::class,
    "/gerenciar/livro" => CadastreBookController::class,
    "/gerenciar/livro/add" => CadastreBookController::class,
    "/gerenciar/genero" => CadastreGenreController::class,
    "/gerenciar/genero/add" => CadastreGenreController::class,
    "/gerenciar/genero/update" => CadastreGenreController::class,
    "/gerenciar/emprestimo" => CadastreLoanController::class,
    "/gerenciar/emprestimo/add" => CadastreLoanController::class,
    "/gerenciar/emprestimo/editar" => CadastreLoanController::class,
    "/gerenciar/emprestimo/update" => CadastreLoanController::class,
    "/cadastro-de-informacoes" => CadastreInformationController::class,
    "/cadastro-de-informacoes/add" => CadastreInformationController::class,
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
    "/confirmacao/senha" => ConfirmationScreenController::class,
    "/solicitacao/add" => RequestController::class,
    "/solicitacao/remover" => RequestController::class,
    "/emprestimo" => LoanController::class,
    "/meu-perfil" => MyPerfilController::class,
    "/acervo" => AcervoController::class,
    "/pesquisa" => SearchController::class,
    "/sobre" => AboutController::class,
    "/erro" => ErroController::class,
];
