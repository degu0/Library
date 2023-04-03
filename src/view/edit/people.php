<title>Library - Cadastro Pessoas</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre_people.css">

<main>
    <section>
        <div id="container1">
            <h2>Cadastro de provedores</h2>
            <form action="/tabela/aluno/update?id=<?php echo $people->getId() ?>" method="POST">
                <label for="idPeopleName">Nome: </label> <br>
                <input type="text" name="peopleName" id="idPeopleName" value="<?php echo $people->getName(); ?>"  placeholder="Insira o nome" required><br>
                <label for="idPeopleTrade">Oficio: </label><br>
                <input type="text" name="peopleTrade" id="idPeopleTrade" value="<?php echo $people->getTrade(); ?>" placeholder="Insira o oficio" required><br>
                <label for="idPeopleClass">Turma: </label><br>
                <select name="peopleClass" id="idPeopleClass">
                    <option value=""></option>
                    <option value="1 MKT A">1 marketing A</option>
                    <option value="1 MKT B">1 marketing B</option>
                    <option value="1 TDS A">1 sistemas A</option>
                    <option value="1 TDS B">1 sistemas B</option>
                    <option value="2 MTK A">2 marketing A</option>
                    <option value="2 MKT B">2 marketing B</option>
                    <option value="2 TDS A">2 sistemas A</option>
                    <option value="2 TDS B">2 sistemas B</option>
                    <option value="3 MKT A">3 marketing A</option>
                    <option value="3 MKT B">3 marketing B</option>
                    <option value="3 TDS A">3 sistemas A</option>
                    <option value="3 TDS B">3 sistemas B</option>
                </select><br>
                <input type="submit" value="cadastrar" id="buttom">
            </form>
        </div>
        <div id="container2">
            <img src="/images/reading.png" alt="Pessoa lendo um livro" id="imgCadastre">
        </div>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>