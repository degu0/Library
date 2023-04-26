<title>Library - Graficos</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/grafico.css">

<main>
    <section>
        <div id="button">
            <a href="/percentual/grafico1ano" class="buttonLink">Grafico 1 ano</a>
            <a href="/percentual/grafico2ano" class="buttonLink">Grafico 2 ano</a>
            <a href="/percentual/grafico3ano" class="buttonLink">Grafico 3 ano</a>
        </div>
        <?php if (count($listPercentage) > 0) { ?>
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
                        <?php foreach ($listPercentage as $book) { ?>["<?php echo $book->getBook() . ' - ' . $book->getAnoEscolar() . ' ' . $book->getSerieEscolar() . ' - ' . $book->getStatus(); ?>", <?php echo $book->getQuantidade(); ?>, "<?php if ($book->getStatus() == 'Entregue') {
                                                                                                                                                                                                                                            echo '#8C6B4F';
                                                                                                                                                                                                                                        } else if ($book->getStatus() == 'Devolvidos') {
                                                                                                                                                                                                                                            echo '#593527';
                                                                                                                                                                                                                                        } ?>"],
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
                        width: 1456,
                        height: 535,
                        bar: {
                            groupWidth: "10%"
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
            <div id="columnchart_values"></div>
        <?php } else { ?>
        <script>
            alert('Sem cadastro no acervo do 3º ano');
        </script>
        <div class="Alert">
            <h2>Alerta!</h2>
            <p>Sem cadastro de acervo. <br> <a href="/percentual/cadastro">Cadastre aqui!</a></p>
        </div>
    <?php } ?>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>