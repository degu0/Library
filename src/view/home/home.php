<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="/librares/css/head_home.css">
    <link rel="stylesheet" href="/librares/css/home.css">
    <style>
        #green {
            background-color: green;
        }

        #yellow {
            background-color: yellow;
        }

        #red {
            background-color: red;
        }
    </style>
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
                        <li><a href="/tabela/livro_nao_didatico">Livros</a></li>
                    </ul>
                </li>
                <li><a href="/percentual">Percentual</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Home</h1>
        <div>
            <input type="search" name="search" id="search">
        </div>
        <div id="tableInfo">
            <table>
                <thead>
                    <th scope="col">Cor</th>
                    <th scope="col">Nome de livro</th>
                    <th scope="col">Nome da pessoa</th>
                    <th scope="col">Excluir</th>
                    <th scope="col">Adiar</th>
                    </thead>
                <tbody>
                    <tr>
                        <td id="green"></td>
                        <td>Harry Potter</td>
                        <td>Zezinho</td>
                        <td>X</td>
                        <td>+</td>
                    </tr>
                    <tr>
                        <td id="yellow"></td>
                        <td>Narnia</td>
                        <td>Maria</td>
                        <td>X</td>
                        <td>+</td>
                    </tr>
                    <tr>
                        <td id="red"></td>
                        <td>Pequeno principe</td>
                        <td>Joazinho</td>
                        <td>X</td>
                        <td>+</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <a href="/cadastro/pessoa">Pessoa</a>
            <a href="/cadastro/livro">Livro</a>
            <a href="/emprestimo/cadastro">Emprestimo</a>
            <a href="/tabela/livro_nao_didatico">Livro</a>
            <a href="/tabela/pessoa">Pessoa</a>
        </div>
        <div>
            <h2>Percentual</h2>
        </div>
    </main>
    <?php require __DIR__ . "/../share/footer.php"; ?>