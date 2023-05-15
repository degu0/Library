<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre/cadastre_book.css">


<main>
    <?php foreach($informaitonBook as $livro) {?>
    <div class="cadastro">
        <h1 id="title_cadastre">Cadastro livro</h1>
        <form action="/livro/update" method="POST">
            <div class="cadastre_image">
            <img src="data: <?php echo $livro->getImagem()->getType(); ?>;base64, <?php echo $livro->getImagem()->getBase64(); ?>" alt="placeholder" id="placeholder" onclick="capaClick()">
                <h3 id="title_image">Adicionar imagem do livro</h3>
                <input type="file" id="imagem_livro" name="imagem_livro" onchange="exibirCapa(this)">
            </div>
            <div class="cadastre_information">
                <div>
                    <label for="titlo">Nome do livro:</label><br>
                    <input type="text" id="titulo" class="input" placeholder="Insira o titulo do livro" required value="<?php echo $livro->getTitulo();?>">
                </div>
                <div>
                    <label for="autor">Autor:</label><br>
                    <input type="text" id="autor" class="input" placeholder="Insira o nome do autor" required value="<?php echo $livro->getAutor();?>">
                </div>
                <div>
                    <label for="genero">Genero:</label><br>
                    <select name="genero" id="genero" class="input" required>
                        <?php
                        foreach ($listGenre as $list) { ?>
                            <option value="<?php echo $list->getId(); ?>"><?php echo $list->getGenero(); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="exemplares">N exemplares:</label><br>
                    <input type="number" id="exemplares" class="input" placeholder="Insira a quantidade de livros" required value="<?php echo $livro->getExemplares();?>">
                </div>
                <div>
                    <label for="resumo">Sobre a obre:</label><br>
                    <textarea id="resumo" class="input" rows="12" cols="45" required><?php echo $livro->getResumo();?></textarea>
                </div>
                <div>
                    <input type="submit" id="button">
                </div>
            </div>
        </form>
    </div>
    <?php }?>
</main>


<?php require __DIR__ . "/../share/footer.php"; ?>