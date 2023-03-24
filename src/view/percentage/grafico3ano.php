<title>Library - Graficos dos 3º</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<style>
    main {
        min-width: 300px;
        max-width: 1000px;
        margin: auto;
        height: 88vh;
    }

    #classification_graficos {
        margin: 20px 0px 40px 45px;
    }

    #classification_graficos a {
        background-color: #8C6B4F;
        border-radius: 10px;
        color: #F2EAE9;
        text-decoration: none;
        padding: 15px;
    }
</style>
<main>
    <section>
        <h1>Graficos</h1>
        <div id="classification_graficos">
            <a href="/percentual/grafico_1_ano">Gráficos do 1º</a>
            <a href="/percentual/grafico_2_ano">Gráficos do 2º</a>
            <a href="/percentual/grafico_3_ano">Gráficos do 3º</a>
        </div>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>