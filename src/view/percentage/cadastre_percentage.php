<title>Library - Cadastro Percentual</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre_people.css">

<main>
    <section>
        <h1>Cadastro Percentual</h1>
        <form action="/percentual/cadastro/add" method="post">
            <label for="idBook">Livro:</label><br>
            <select name="book" id="idBook">
                <?php
                foreach ($listNameBook as $nameBook) { ?>
                    <option value="<?php echo $nameBook->getId(); ?>"><?php echo $nameBook->getName(); ?></option>
                <?php } ?>
            </select>

            <label for="idQuantidade">Quantidade de livros:</label> <br>
            <input type="number" name="quantidade" id="idQuantidade">

            <label for="idAnoEscolar">Ano escolar:</label><br>
            <select name="anoEscolar" id="idAnoEscolar">
                    <option value="1º">1º</option>
                    <option value="2º">2º</option>
                    <option value="3º">3º</option>
            </select>

            <label for="idSerieEscolar">Serie escolar:</label><br>
            <select name="serieEscolar" id="idSerieEscolar">
                <option value="MTK_A">Marketing A</option>
                <option value="MTK_B">Marketing B</option>
                <option value="TDS_A">Sistema A</option>
                <option value="TDS_B">Sistemas B</option>
            </select>

            <div id="div_status">
                <span>Status:</span>
                <input type="radio" name="status" id="idEntregue" value="Entregue">
                <label for="idEntregue">Entregue</label><br>
                <input type="radio" name="status" id="idDevolvido" value="Devolvido">
                <label for="idDevolvido">Devolvido</label><br>
            </div>
            <label for="idYear">Ano:</label><br>
            <input type="date" name="year" id="idYear">
            <div id="buttom">
                <input type="submit" value="Cadastre">
            </div>
        </form>
    </section>
</main>