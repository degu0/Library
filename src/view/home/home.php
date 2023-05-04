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
                            <a href=""><?php echo $_SESSION['usuario']; ?></a>
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
                <form action="/pesquisa" method="GET" id="navSearch">
                    <input type="search" name="searchNav" id="searchNav" placeholder="Pesquisar">
                    <button id="buttom-searchNav"><img src="/images/search.png" alt="search" height="18px" width="18px"></button>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <!-- <div class="divPart" id="divInformationLoan">
            <div id="box-search">
                <form action="/home/pesquisar" method="GET">
                    <input type="search" name="busca" id="search" placeholder="Pesquisar">
                    <button id="buttom-search"><img src="/images/search.png" alt="search" height="23px" width="23px"></button>
                    <div id="autocomplete">
                        <ul>
                        </ul>
                    </div>
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
                                <td><?php echo "<a href='/home/delete?id=" . $loan->getId() . "' class='link'>DELETE</a>"; ?></td>
                                <td><?php echo "<a href='/home/adiar?id=" . $loan->getId() . "' class='link'>+</a>"; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div> -->
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
            <a href="percentual/cadastro" style="text-decoration: none;">
                <div class="card" data-anime="left">
                    <img src="/images/card_cadastre.png" alt="">
                    <h2>Cadastro</h2>
                    <p>Cadastre seu acervo de livros da biblioteca e organize sua coleção da melhor forma possível. Com nosso sistema de cadastro simplificado, você pode facilmente inserir informações sobre os livros.</p>
                </div>
            </a>
            <a href="percentual/tabela" style="text-decoration: none;">
                <div class="card" data-anime="right">
                    <img src="/images/card_table.png" alt="">
                    <h2>Tabela</h2>
                    <p>Com nossas tabelas dos acervo de livros da biblioteca, você pode ter um controle completo sobre sua coleção. Nossa tabela de cadastro possibilita a inserção de todos os dados necessários para uma gestão eficiente.</p>
                </div>
            </a>

        </div>
        <!-- <?php
                if ($listBook != null) {
                ?>
            <div class="divPart">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load("current", {
                        packages: ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ["Títulos de livros", "Quantidade", {
                                role: "style"
                            }],
                            <?php foreach ($listBook as $book) { ?>["<?php echo $book->getName(); ?>", <?php echo $book->getQuantity(); ?>, "#593527"],
                            <?php } ?>
                        ]);

                        var view = new google.visualization.DataView(data);
                        view.setColumns([0, 1,
                            {
                                calc: "stringify",
                                sourceColumn: 1,
                                type: "string",
                                role: "annotation"
                            },
                            2
                        ]);

                        var options = {
                            title: "Livros na biblioteca",
                            width: 1200,
                            height: 500,
                            bar: {
                                groupWidth: "50%"
                            },
                            legend: {
                                position: "none"
                            },
                            backgroundColor: "#F2EAE9",
                        };
                        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                        chart.draw(view, options);
                    }
                </script>
                <div id="columnchart_values" style="width: 1200px; height: 500px;" data-anime="bottom"></div>
            </div>
        <?php
                }
        ?> -->
    </main>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js" integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/underscore@1.13.6/underscore-umd-min.js"></script>
    <script src="/librares/js/search_home.js"></script> -->
    <script src="/librares/js/animation.js"></script>
    <?php require __DIR__ . "/../share/footer.php"; ?>