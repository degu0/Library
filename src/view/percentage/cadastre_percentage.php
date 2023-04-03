<title>Library - Cadastro Percentual</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre_percentage.css">

<main>
    <section>
        <h2>Cadastre do percentual</h2>   
        <form action="/percentual/cadastro/add" method="post">
            <label for="idBook">Livro:</label><br>
            <select name="book" id="idBook">
                <?php
                foreach ($listNameBook as $nameBook) { ?>
                    <option value="<?php echo $nameBook->getId(); ?>"><?php echo $nameBook->getName(); ?></option>
                <?php } ?>
            </select><br>

            <label for="idQuantidade">Quantidade de livros:</label> <br>
            <input type="number" name="quantidade" id="idQuantidade" placeholder="Insira a quantidade dos livros" required><br>

            <label for="idAnoEscolar">Ano escolar:</label><br>
            <select name="anoEscolar" id="idAnoEscolar">
                <option value="1º">1º</option>
                <option value="2º">2º</option>
                <option value="3º">3º</option>
            </select><br>

            <label for="idSerieEscolar">Serie escolar:</label><br>
            <select name="serieEscolar" id="idSerieEscolar">
                <option value="MTK A">Marketing A</option>
                <option value="MTK B">Marketing B</option>
                <option value="TDS A">Sistema A</option>
                <option value="TDS B">Sistemas B</option>
            </select><br>

            <span>Status: </span>
            <div style="margin-top: 8px;">
                <input type="radio" name="status" id="idEntregue" value="Entregue" class="radioStatus"> <label for="idEntregue" class="label">Entregue</label>
            </div>
            <div style="margin-bottom: 8px;">
                <input type="radio" name="status" id="idDevolvido" value="Devolvidos" class="radioStatus">
                <label for="idDevolvido">Devolvido</label><br>
            </div>
            <label for="idYear">Ano:</label><br>
            <input type="date" name="year" id="idYear"><br>
            <div>
                <input type="submit" value="Cadastre" id="buttom">
            </div>
        </form>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>