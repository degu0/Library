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
            <a href="/home" id="logo">Library</a>
            <ul id="nav-list">
                <li><a href="/home">Home</a></li>
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
        <div class="divPart">
            <div id="box-search">
                <form action="/home/pesquisar" method="GET">
                    <input type="search" name="busca" id="search" placeholder="Pesquisar">
                    <button id="buttom-search"><img src="/images/search.png" alt="search" height="23px" width="23px"></button>
                </form>
            </div>
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
                                <td><?php echo  date('d/m/Y', strtotime($loan->getDateFinal())); ?></td>
                                <td><?php echo $loan->getBook(); ?></td>
                                <td><?php echo $loan->getPeople(); ?></td>
                                <td><?php echo "<a href='/home/delete?id=" . $loan->getId() . "'>DELETE</a>"; ?></td>
                                <td>+</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="divPart">
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
        </div>
    </main>
    <?php require __DIR__ . "/../share/footer.php"; ?>