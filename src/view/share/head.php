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
            <a href="/home" id="logo">Library</a>
            <ul class="nav-list">
                <li><a href="/home">Home</a></li>
                <li class="dropdown-center">
                    <a href="">Cadastro</a>
                    <ul class="dropdown">
                        <li><a href="/cadastro/pessoa">Pessoas</a></li>
                        <li><a href="/cadastro/livro">Livros</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Tabela</a>
                    <ul class="dropdown">
                        <li><a href="/tabela/aluno">Pessoas</a></li>
                        <li><a href="/tabela/livro_nao_didatico">Livros</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Empréstimo</a>
                    <ul class="dropdown">
                        <li><a href="/emprestimo/cadastro">Cadastro</a></li>
                        <li><a href="/emprestimo/tabela">Tabela</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Acervo</a>
                    <ul class="dropdown">
                        <li><a href="/percentual/cadastro">Cadastro</a></li>
                        <li><a href="/percentual/tabela">Tabela</a></li>
                        <li><a href="/percentual/grafico1ano">Gráficos</a></li>
                    </ul>
                </li>
            </ul>
            <div class="mobile_menu">
                <button onclick="menuShow()"><img class="icon" src="/images/hamburger.png" alt="" style="max-width: 30px; max-height: 30px;"></button>
            </div>
        </nav>
    </header>
    <script src="/librares/js/menu.js"></script>
</body>

</html>