<title>Library - Percentual</title>
<?php require __DIR__ . "/../share/head.php";?>

<main>
    <section>
        <h1>Emprestimo</h1>
        <form action="/emprestimo/tabela" method="POST">
            <label for="peopleLoan">Aluno(a)/Funcionário(a):</label>
            <select name="peopleLoan" id="peopleLoan">
            <option value="1">1</option>
                <!-- <?php
                    foreach ($listPeople as $people) { ?>
                    <option value="<?php echo $people->getId();?>"><?php echo $people->getName();?></option>
                <?php } ?> -->
            </select><br>
            <label for="bookLoan">Livros</label>
            <select name="bookLoan" id="bookLoan">
                <option value="1">1</option>
                <!-- <?php
                    foreach ($listaBook as $book) { ?>
                    <option value="<?php echo $book->getId();?>"><?php echo $book->getName();?></option>
                <?php } ?> -->
            </select><br>
            <label for="dateLoan">Data de pega:</label>
            <input type="date" name="dateLoan" id="dateLoan"><br>
            <label for="finalDateLoan">Data de devolução:</label>
            <input type="date" name="finalDateLoan" id="finalDateLoan"><br>
        </form>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php";?>