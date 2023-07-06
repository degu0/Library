<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/librares/css/head.css">
    <link rel="shortcut icon" href="/images/LIbrary_Icon.png" type="image/x-icon">
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
                                <a href=""><?php echo $_SESSION['usuario']; ?></a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="/meu-perfil?id=<?php echo $_SESSION['id_usuario']; ?>">Meu perfil</a>
                                    </li>
                                    <?php if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'adm') { ?>
                                        <!-- <li>
                                            <a href="/login/cadastro?id_usuario=<?php echo $_SESSION['id_usuario'] ?>">Cadastro de adm</a>
                                        </li> -->
                                        <li>
                                            <a href="/acervo">Acervo</a>
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
    <script src="/librares/js/menu.js"></script>
</body>

</html>