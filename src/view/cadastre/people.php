<title>Library - Cadastro Pessoas</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre.css">

<main>
    <h1>Cadastro de pessoas</h1>
    <section>
        <form action="/cadastro/pessoa/add" method="POST">
            <label for="peopleName">Nome: </label>
            <input type="text" name="peopleName" id="peopleName"><br>
            <label for="peopleTrade">Oficio: </label>
            <input type="text" name="peopleTrade" id="peopleTrade"><br>
            <label for="peopleClass">Turma: </label>
            <select name="peopleClass" id="peopleClass">
                <option value="null"></option>
                <option value="1_MKT_A">1 marketing A</option>
                <option value="1_MKT_B">1 marketing B</option>
                <option value="1_TDS_A">1 sistemas A</option>
                <option value="1_TDS_B">1 sistemas B</option>
                <option value="2_MTK_A">2 marketing A</option>
                <option value="2_MKT_B">2 marketing B</option>
                <option value="2_TDS_A">2 sistemas A</option>
                <option value="2_TDS_B">2 sistemas B</option>
                <option value="3_MKT_A">3 marketing A</option>
                <option value="3_MKT_B">3 marketing B</option>
                <option value="3_TDS_A">3 sistemas A</option>
                <option value="3_TDS_B">3 sistemas B</option>
            </select><br>
            <input type="submit" value="cadastrar">
        </form>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>