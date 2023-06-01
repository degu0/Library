<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre/cadastre_genre.css">
<main>
    <div class="cadastro">
        <h2 id="title_cadastre">Cadastre o genêro</h2>
        <form action="/gerenciar/genero/add" method="POST">
            <?php
            if ($ahGenero) {
                echo "<script>alert('Ja tem esse genêro cadastrado! Por favor, reveja!')</script>";
            }
            ?>
            <div>
                <label for="genero">Genero:</label><br>
                <input type="text" name="genero" id="genero" class="input">
            </div>
            <div>
                <label for="genero">Classificação:</label><br>
                <select name="select_genero" id="select_genero" class="input">
                    <option value="didatico">Didático</option>
                    <option value="paradidatico">Paradidático</option>
                </select>
            </div>
            <div>
                <input type="submit" id="button">
            </div>
        </form>
    </div>
</main>


<?php require __DIR__ . "/../share/footer.php"; ?>