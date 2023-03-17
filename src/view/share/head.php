<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/librares/css/style_Menu.css">
</head>

<body>
    <header>
        <nav>
            <a href="/" id="logo">Library</a>
            <ul id="nav-list">
                <li><a href="/">Home</a></li>
                <li class="dropdown-center">
                    <a href="">Cadastro</a>
                    <ul class="dropdown">
                        <li><a href="/cadastro/pessoa">Pessoas</a></li>
                        <li><a href="/cadastro/livro">Livros</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Emprestimo</a>
                    <ul class="dropdown">
                        <li><a href="/emprestimo/cadastro">Cadastro</a></li>
                        <li><a href="/emprestimo/tabela">Tabela</a></li>
                    </ul>
                </li>
                <li class="dropdown-center">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #F2F5F9; font-size: 17px;">Tabela</a>
                    <ul class="dropdown">
                        <li><a href="/tabela/pessoa">Pessoas</a></li>
                        <li><a href="/tabela/livro">Livros</a></li>
                    </ul>
                </li>
                <li><a href="/percentual">Percentual</a></li>
            </ul>
        </nav>
    </header>
</body>

</html>