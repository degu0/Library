<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="shortcut icon" href="/images/LIbrary_Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="/librares/css/head_home.css">
    <link rel="stylesheet" href="/librares/css/home.css">
    <link rel="stylesheet" href="/librares/css/confirmacao_modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="container">
            <div class="menu-section">
                <div class="menu-toggle">
                    <div class="one"></div>
                    <div class="two"></div>
                    <div class="three"></div>
                </div>
                <nav>
                    <ul id="nav-list">
                        <?php if (empty($_SESSION)) { ?>
                            <li>
                                <button id="login">
                                    <a href="/login">Login</a>
                                </button>
                            </li>
                        <?php } else { ?>
                            <li>
                                <span><?php echo $_SESSION['usuario']; ?></span>
                                <ul class="dropdown">
                                    <li>
                                        <a href="/meu-perfil?id=<?php echo $_SESSION['id_usuario']; ?>">Meu perfil</a>
                                    </li>
                                    <?php if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'adm') { ?>
                                        <li>
                                            <a href="/login/cadastro?id_usuario=<?php echo $_SESSION['id_usuario'] ?>">Cadastro de adm</a>
                                        </li>
                                    <?php } ?>
                                    <li><a href="/login/deslog">Sair</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li><a href="/home">Home</a></li>
                        <li class="dropdown-center">
                            <?php if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'adm') { ?>
                                <span>Gêneros</span>
                                <ul class="dropdown">
                                    <li><a href="/generos/literatura">Paradidáticos</a></li>
                                    <li><a href="/generos/didaticos">Didáticos</a></li>
                                </ul>
                            <?php } else { ?>
                                <a href="/generos/literatura">Gêneros</a>
                            <?php } ?>
                        </li>
                        <?php if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'adm') { ?>
                            <li class="dropdown-center">
                                <span>Gerenciar</span>
                                <ul class="dropdown">
                                    <li><a href="/gerenciar/livro">Cadastre Livros</a></li>
                                    <li><a href="/gerenciar/genero">Cadastre Gêneros</a></li>
                                    <li><a href="/gerenciar/emprestimo">Cadastre Empréstimo</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="/acervo">Acervo</a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="/sobre">Sobre</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div>
                <form action="/pesquisa" method="GET" id="navSearch">
                    <input type="search" name="searchNav" id="searchNav" placeholder="Pesquisar">
                    <button id="buttom-searchNav"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: white"></i></button>
                </form>
            </div>
        </div>
    </header>
    <main>
        <?php if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'adm' && $listLoan != null) { ?>
            <div class="divPart">
                <div class="tableInfo">
                    <table>
                        <thead>
                            <th scope="col">Data de entrega</th>
                            <th scope="col">Nome de livro</th>
                            <th scope="col">Nome da pessoa</th>
                            <th scope="col">Devolução</th>
                            <th scope="col">Adiar</th>
                        </thead>
                        <tbody>
                            <?php foreach ($listLoan as $loan) {
                            ?>

                                <tr>
                                    <td>
                                        <?php if (strtotime(date('Y/m/d')) >= strtotime($loan->getDataFinal())) {
                                            echo  " <i class='fa-solid fa-triangle-exclamation ' title = 'ATRASADO!!' id='icon-alert'></i> " . date('d/m/Y', strtotime($loan->getDataFinal()));
                                        } else {
                                            echo  date('d/m/Y', strtotime($loan->getDataFinal()));
                                        }; ?>
                                    </td>
                                    <td title=" <?php echo 'Livro: ' . $loan->getLivro()->getTitulo(); ?>"><?php echo $loan->getLivro()->getTitulo(); ?></td>
                                    <td><a href="/meu-perfil?id=<?php echo $loan->getAluno()->getId(); ?>&aluno=<?php echo $loan->getAluno()->getUsuario()->getNome(); ?>" id="link-aluno">
                                            <?php echo $loan->getAluno()->getUsuario()->getNome(); ?>
                                        </a></td>
                                    </td>
                                    <td><button onclick="ModalDevolutionConfirmation()" id="button-modal-loan"><i class='fa-solid fa-check fa-lg'></i></button></td>
                                    <td><?php echo "<a href='/home/adiar?id=" . $loan->getId() . "' class='link'><i class='fa-solid fa-plus fa-lg'></i></a>"; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
        <?php if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'adm' && $listRequest != null) { ?>
            <div class="divPart" id="request">
                <div class="tableInfo" id='request-table'>
                    <table>
                        <thead>
                            <th>Livros</th>
                            <th>Aluno</th>
                            <th>Data</th>
                            <th>Ver</th>
                            <th>Excluir</th>
                        </thead>
                        <tbody>
                            <?php foreach ($listRequest as $request) {
                            ?>
                                <tr>
                                    <td><?php echo $request->getLivro()->getTitulo(); ?></td>
                                    <td><a href="/meu-perfil?id=<?php echo $request->getAluno()->getId(); ?>&aluno=<?php echo $request->getAluno()->getUsuario()->getNome(); ?>" id="link-aluno">
                                            <?php echo $request->getAluno()->getUsuario()->getNome(); ?>
                                        </a></td>
                                    </td>
                                    <td><?php echo $request->getData(); ?></td>
                                    <td>
                                        <button onclick="ModalLoanConfirmation()" id="button-modal-loan"><i class='fa-solid fa-check fa-lg'></i></button>
                                    </td>
                                    <td>
                                        <a href="/solicitacao/remover?id_solitacao=<?php echo $request->getId(); ?>" class="confirmation">
                                            <i class="fa-solid fa-x" style="color: #fff;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
        <div class="divPart" id="divWelcome">
            <div id="information">
                <p>Esse web site tem como principal objetivo facilitar a busca e o acesso aos livros de uma biblioteca, tornando a experiência do usuário mais agradável e eficiente. A partir da interface simples e intuitiva, o usuário pode pesquisar, solicitar empréstimo ou devolver livros
                </p>
            </div>
            <div id="image">
                <img src="/images/Welcome.png" alt="Welcome to Library" id="welcomeImg">
            </div>
        </div>
        </div>
        <div class="divPart" id="divCards">
            <div id="livro-span" data-anime="left">
                <div id="livro-span-i"><i class="fa-solid fa-book fa-7x" style="color: #261A1A;"></i></div>
                <div id="livro-span-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea possimus voluptate incidunt eligendi blanditiis qui quisquam repudiandae dolorum veritatis. Maiores voluptas inventore, tempore perferendis illo expedita id magnam odio fuga!</p>
                </div>
            </div>
            <a href="/generos/literatura" style="text-decoration: none;" id="paradidatico">
                <div class="card" data-anime="right">
                    <img src="/images/card_table.png" alt="">
                    <h2>Livros</h2>
                    <p>Com o nossa organização do genêros dos livros, você pode ter um controle sobre a coleção. Veja os livros paradidáticos.</p>
                </div>
            </a>
        </div>
    </main>
    <dialog id="modal-emprestimo">
        <button onclick="ModalLoanClose()" id="close-modal-loan"> <i class="fa-solid fa-x fa-3x" style="color: #fff;"></i></button>
        <div class="confirmacao">
            <h1 class="titulo">Confirmação do empréstimo</h1>
            <?php foreach ($listRequest as $request) { ?>
                <div class="dados">
                    <p class="informacoes">
                        <span class="variavel">Aluno:</span>
                        <?php echo $request->getAluno()->getUsuario()->getNome(); ?>
                    </p>
                    <p class="informacoes">
                        <span class="variavel">Livro:</span>
                        <?php echo $request->getLivro()->getTitulo(); ?>
                    </p>
                    <p class="informacoes">
                        <span class="variavel">Data do empréstimo:</span>
                        <?php echo date('d/m/Y', strtotime($request->getData())); ?>
                    </p>
                </div>
                <div>
                    <p class="erro">Dados incorretos? Por favor, edite o seu empréstimo. <br> <a href="/gerenciar/emprestimo/editar?id=<?php echo $loan->getId(); ?>" class="link">Aqui</a></p>
                </div>
            <?php } ?>
            <div>
                <a href="/solicitacao/add?id_solicitacao=<?php echo $request->getId(); ?>&aluno=<?php echo $request->getAluno()->getId(); ?>&livro=<?php echo $request->GetLivro()->getId(); ?>&data=<?php echo date('d/m/Y', strtotime($request->getData())); ?>" class="confirmation">
                    <i class="fa-solid fa-circle-check fa-4x" style="color: #8c6b4f;"></i>
                </a>
            </div>
        </div>
        <dialog id="modal-devolucao">
            <button onclick="ModalDevolutionClose()" id="close-modal-devolution"> <i class="fa-solid fa-x fa-3x" style="color: #fff;"></i></button>
            <div class="confirmacao">
                <h1 class="titulo">Confirmação da devolução</h1>
                <?php foreach ($listRequest as $request) { ?>
                    <div class="dados">
                        <p class="informacoes">
                            <span class="variavel">Aluno:</span>
                            <?php echo $request->getAluno()->getUsuario()->getNome(); ?>
                        </p>
                        <p class="informacoes">
                            <span class="variavel">Livro:</span>
                            <?php echo $request->getLivro()->getTitulo(); ?>
                        </p>
                        <p class="informacoes">
                            <span class="variavel">Data do empréstimo:</span>
                            <?php echo date('d/m/Y', strtotime($request->getData())) ?>
                        </p>
                    </div>
                    <div>
                        <p class="erro">Dados incorretos? Por favor, edite o seu empréstimo. <br> <a href="/gerenciar/emprestimo/editar?id=<?php echo $loan->getId(); ?>" class="link">Aqui</a></p>
                    </div>
                <?php } ?>
                <div>
                    <a href="/home" class="confirmation">
                        <i class="fa-solid fa-circle-check fa-4x" style="color: #8c6b4f;"></i>
                    </a>
                </div>
            </div>
        </dialog>
        <script src="/librares/js/animation.js"></script>
        <script src="/librares/js/menu.js"></script>
        <script src="/librares/js/modal.js"></script>
        <?php require __DIR__ . "/../share/footer.php"; ?>