<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre_book.css">
<main>
    <div class="cadastro">
        <h1 id="title_cadastre">Cadastro livro</h1>
        <form action="/gerenciar/livro/add" method="POST">
            <div class="cadastre_image">
                <h3 id="title_image">Adicionar imagem do livro</h3>
                <input type="file" id="imagem_livro" name="imagem_livro">
            </div>
            <div class="cadastre_information">
                <div>
                    <label for="titlo">Nome do livro:</label><br>
                    <input type="text" id="titulo" class="input">
                </div>
                <div>
                    <label for="autor">Autor:</label><br>
                    <input type="text" id="autor" class="input">
                </div>
                <div>
                    <label for="genero">Genero:</label><br>  
                    <select name="genero" id="genero" class="input">
                        <option value="oi">Test</option>
                        <option value="oi">Test</option>
                        <option value="oi">Test</option>
                        <option value="oi">Test</option>
                    </select>
                </div>
                <div>
                    <label for="exemplares">N exemplares:</label><br>
                    <input type="number" id="exemplares" class="input">
                </div>
                <div >
                    <label for="resumo">Sobre a obre:</label><br>
                    <input type="text" id="resumo" class="input">
                </div>
                <div>
                    <input type="submit" id="button">
                </div>
            </div>
        </form>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>