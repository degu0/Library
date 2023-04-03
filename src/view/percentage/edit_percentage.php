<title>Library - Cadastro Percentual</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre_percentage.css">

<main>
    <section>
        <h2>Cadastro do percentual</h2>
        <form action="/percentual/tabela/update?id=<?php echo $Percentage->getId();?>" method="post">
            <label for="idBook">Livro:</label><br>
            <select name="updateBook" id="idBook">
                <?php
                foreach ($listNameBook as $nameBook) { ?>
                    <option value="<?php echo $nameBook->getId(); ?>"><?php echo $nameBook->getName(); ?></option>
                <?php } ?>
            </select>

            <label for="idQuantidade">Quantidade de livros:</label> <br>
            <input type="number" name="updateQuantidade" id="idQuantidade" value="<?php echo $Percentage->getQuantidade();?>" placeholder="Insira a quantidade dos livros" required>

            <label for="idAnoEscolar">Ano escolar:</label><br>
            <select name="updateAnoEscolar" id="idAnoEscolar">
                    <option value="1º">1º</option>
                    <option value="2º">2º</option>
                    <option value="3º">3º</option>
            </select>

            <label for="idSerieEscolar">Serie escolar:</label><br>
            <select name="updateSerieEscolar" id="idSerieEscolar">
                <option value="MTK_A">Marketing A</option>
                <option value="MTK_B">Marketing B</option>
                <option value="TDS_A">Sistema A</option>
                <option value="TDS_B">Sistemas B</option>
            </select>

            <span>Status: </span>
            <div style="margin-top: 8px;">
                <input type="radio" name="updateStatus" id="idEntregue" value="Entregue" class="radioStatus">
                <label for="idEntregue">Entregue</label><br>
            </div>
            <div style="margin-bottom: 8px;">
                <input type="radio" name="status" id="idDevolvido" value="Devolvidos" class="radioStatus">
                <label for="idDevolvido">Devolvido</label><br>
            </div>
            <label for="idYear">Ano:</label><br>
            <input type="date" name="updateYear" id="idYear" value="<?php echo $Percentage->getAno();?>">
            <div>
                <input type="submit" value="Cadastre" id="buttom">
            </div>
        </form>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>