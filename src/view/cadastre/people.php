<title>Library - Cadastro Pessoas</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre_people.css">

<main>
    <section>
        <div id="container1">
            <h2>Cadastre de provedores</h2>
            <form action="/cadastro/pessoa/add" method="POST">
                <label for="peopleName" class="label">Nome:</label> <br>
                <input type="text" name="peopleName" id="peopleName" placeholder="Insira o nome" required><br>
                <label for="peopleTrade">Oficio: </label><br>
                <input type="text" name="peopleTrade" id="peopleTrade" placeholder="Insira o oficio" required><br>
                <label for="peopleClass">Turma: </label><br>
                <select name="peopleClass" id="peopleClass">
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
                <input type="submit" value="Cadastrar" id="buttom">
            </form>
        </div>
        <div id="container2">
            <img src="/images/reading.png" alt="Pessoa lendo um livros" id="imgCadastre">
        </div>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>