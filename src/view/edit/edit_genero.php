<title>Library - Cadastro Genero</title>
<?php require __DIR__ . "/../share/head.php"; ?>


<main>
<div class="cadastro">
        <h2 id="title_cadastre">Cadastre o genero</h2>
        <form action="/gerenciar/genero/update" method="POST">
            <div>
                <label for="genero">Genero:</label><br>
                <input type="text" name="genero" id="genero" class="input" value="<?php echo $genero->getGenero();?>">
            </div>
            <div>
                <label for="genero">Classificação:</label><br>
                <select name="select_genero" id="select_genero" class="input">
                    <option value="didatico">Didatico</option>
                    <option value="paradidatico">Paradidatico</option>
                </select>
            </div>
            <div>
                <input type="submit" id="button">
            </div>
        </form>
    </div>
</main>


<?php require __DIR__ . "/../share/footer.php"; ?>