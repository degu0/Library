<title>Library - Percentual</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre_loan.css">

<main>
    <section>
        <div id="container1">
            <h2>Cadastre o empréstimo do livro</h2>
            <form action="/emprestimo/cadastro/add" method="POST">
                <label for="loanPeople">Aluno(a)/Funcionário(a):</label> <br>
                <select name="loanPeople" id="loanPeople">
                    <?php
                foreach ($listNamePeople as $namePeople) { ?>
                    <option value="<?php echo $namePeople->getId(); ?>"><?php echo $namePeople->getName(); ?></option>
                    <?php } ?>
                </select><br>
                <label for="loanBook">Livros</label> <br>
                <select name="loanBook" id="loanBook">
                <?php
                foreach ($listNameBook as $nameBook) { ?>
                    <option value="<?php echo $nameBook->getId(); ?>"><?php echo $nameBook->getName(); ?></option>
                    <?php } ?>
                </select><br>
                <label for="loanDate">Data de pega:</label> <br>
                <input type="date" name="loanDate" id="loanDate"><br>
                <input type="submit" value="Cadastrar" id="buttom">
            </form>
        </div>
        <div id="container2">
            <img src="/images/Library.png" alt="Decisão de pegar um livro" id="imgCadastre">
        </div>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>