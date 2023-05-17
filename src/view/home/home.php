<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="shortcut icon" href="/images/LIbrary_Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="/librares/css/head_home.css">
    <link rel="stylesheet" href="/librares/css/media_home.css">
    <link rel="stylesheet" href="/librares/css/home.css">
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
                                    <hr>
                                    <li><a href="/login/deslog">Sair</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li><a href="/home">Home</a></li>
                        <li class="dropdown-center">
                            <span>Gêneros</span>
                            <ul class="dropdown">
                                <li><a href="/generos/literatura">Paradidáticos</a></li>
                                <li><a href="/generos/didaticos">Didáticos</a></li>
                            </ul>
                        </li>
                        <?php if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'funcionário') { ?>
                            <li class="dropdown-center">
                                <span>Gerenciar</span>
                                <ul class="dropdown">
                                    <li><a href="/gerenciar/livro">Cadastre Livros</a></li>
                                    <li><a href="/gerenciar/genero">Cadastre Gêneros</a></li>
                                    <li><a href="/gerenciar/emprestimo">Cadastre emprestimo</a></li>
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
        <?php if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'funcionário' && $listLoan != null) { ?>
            <div id="tableInfo">
                <table>
                    <thead>
                        <th scope="col">Data de entrega</th>
                        <th scope="col">Nome de livro</th>
                        <th scope="col">Nome da pessoa</th>
                        <th scope="col">Deletar</th>
                        <th scope="col">Adiar</th>
                    </thead>
                    <tbody>
                        <?php foreach ($listLoan as $loan) { ?>
                            <tr>
                                <td><?php echo  date('d/m/Y', strtotime($loan->getDataFinal())); ?></td>
                                <td><?php echo $loan->getLivro()->getTitulo(); ?></td>
                                <td><?php echo $loan->getAluno()->getUsuario()->getNome(); ?></td>
                                <td><?php echo "<a href='/home/delete?id=" . $loan->getId() . "' class='link'><i class='fa-sharp fa-solid fa-trash fa-lg'></i></a>"; ?></td>
                                <td><?php echo "<a href='/home/adiar?id=" . $loan->getId() . "' class='link'><i class='fa-solid fa-plus fa-lg'></i></a>"; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
        </div>
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
            <a href="/generos/didaticos" style="text-decoration: none;" id="didatico">
                <div class="card" data-anime="left">
                    <img src="/images/card_cadastre.png" alt="">
                    <h2>Livro didáticos</h2>
                    <p>Com o nossa organização do genêros dos livros, você pode ter um controle sobre a coleção. Veja os livros didáticos</p>
                </div>
            </a>
            <a href="/generos/literatura" style="text-decoration: none;" id="paradidatico">
                <div class="card" data-anime="right">
                    <img src="/images/card_table.png" alt="">
                    <h2>Livro paradidático</h2>
                    <p>Com o nossa organização do genêros dos livros, você pode ter um controle sobre a coleção. Veja os livros paradidáticos.</p>
                </div>
            </a>

        </div>
    </main>
    <script src="/librares/js/animation.js"></script>
    <script src="/librares/js/menu.js"></script>
    <?php require __DIR__ . "/../share/footer.php"; ?>