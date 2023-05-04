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
        <nav>
            <div id="navInformation">
                <ul id="nav-list">
                    <?php if (empty($_SESSION)) { ?>
                        <li>
                            <button id="login">
                                <a href="/login">Login</a>
                            </button>
                        </li>
                    <?php } else { ?>
                        <li>  
                            <a href=""><?php echo $_SESSION['usuario'];?></a> 
                            <ul class="dropdown">
                                <li><a href="/meu-perfil">Meu perfil</a></li>
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
                                <li><a href="/gerenciar/emprestimo">Emprestimo</a></li>
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
            </div>
            <div>
                <form action="/home/pesquisar" method="GET" id="navSearch">
                    <input type="search" name="buscaNav" id="searchNav" placeholder="Pesquisar">
                    <button id="buttom-searchNav"><img src="/images/search.png" alt="search" height="18px" width="18px"></button>
                </form>
            </div>
        </nav>
    </header>
    <script src="/librares/js/menu.js"></script>
</body>

</html>