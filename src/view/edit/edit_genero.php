<title>Library - Cadastro Genero</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre/cadastre_genre.css">

<main>
    <div class="cadastro">
        <h2 id="title_cadastre">Cadastre o genero</h2>
        <?php foreach ($Listgenero as $genero) { ?>
            <form action="/gerenciar/genero/update?id=<?php echo $genero->getId(); ?>" method="POST">
                <div>
                    <label for="genero">Genero:</label><br>
                    <input type="text" name="genero" id="genero" class="input" value="<?php echo $genero->getGenero(); ?>">
                </div>
                <div>
                    <label for="genero">Classificação:</label><br>
                    <select name="classificacao" id="select_genero" class="input">
                        <option value="didatico">Didatico</option>
                        <option value="paradidatico">Paradidatico</option>
                    </select>
                </div>
                <div>
                    <input type="submit" id="button">
                </div>
            </form>
        <?php } ?>
    </div>
</main>


<?php require __DIR__ . "/../share/footer.php"; ?>