<title>Library - Percentual</title>
<?php require __DIR__ . "/../share/head.php"; ?>

<main>
    <section>
        <h1>Emprestimo</h1>
        <form action="/emprestimo/cadastro/add" method="POST">
            <label for="loanPeople">Aluno(a)/Funcionário(a):</label>
            <select name="loanPeople" id="loanPeople">
                <?php
                foreach ($listNamePeople as $namePeople) { ?>
                    <option value="<?php echo $namePeople->getId(); ?>"><?php echo $namePeople->getName(); ?></option>
                <?php } ?>
            </select><br>
            <label for="loanBook">Livros</label>
            <select name="loanBook" id="loanBook">
                <?php
                foreach ($listNameBook as $nameBook) { ?>
                    <option value="<?php echo $nameBook->getId(); ?>"><?php echo $nameBook->getName(); ?></option>
                <?php } ?>
            </select><br>
            <label for="loanDate">Data de pega:</label>
            <input type="date" name="loanDate" id="loanDate"><br>
            <label for="loanDateFinal">Data de devolução:</label>
            <input type="date" name="loanDateFinal" id="loanDateFinal"><br>
            <input type="submit" value="Cadastrar">
        </form>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>