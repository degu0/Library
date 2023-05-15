<title>Library - </title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="librares/css/book.css">
<main>
    <div class="livro">
        <?php foreach ($listBook as $book) { ?>
            <div class="livro_imagem">
                <img src="data: <?php echo $book->getImagem()->getType(); ?>;base64, <?php echo $book->getImagem()->getBase64(); ?>" id="imagem">
            </div>
            <div class="livro_texto">
                <h3 class="title">
                    <?php
                    echo $book->getTitulo();
                    ?>
                </h3>
                <h4 class="subtitle">Descrição:</h4>
                <ul class="informacoes">
                    <li><b>Autor: </b><?php echo $book->getAutor(); ?></li>
                    <li><b>Genero: </b><?php echo $book->getId_genero(); ?></li>
                    <li><b>N Exemplares: </b><?php echo $book->getExemplares(); ?></li>
                    <li><b>N Disponíveis: </b><?php echo $book->getDisponiveis(); ?></li>
                </ul>
                <h5 class="subtitle">Sobre a obra</h5>
                <p>
                    <?php echo $book->getResumo(); ?>
                </p>

                <?php
                if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'funcionário') {
                ?>
                    <div class="actions">
                        <a href="/livro/editar?id=<?php echo $book->getId();?>" class="buttonAtividade">
                            <p>Editar</p>
                        </a>
                        <a href="/livro/excluir" class="buttonAtividade">
                            <p>Excluir</p>
                        </a>
                    </div>
                <?php } else if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'aluno') { ?>
                    <div class="actions">
                        <a href="" class="buttonAtividade">
                            <p>Empréstimo</p>
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>