<title>Library - </title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/book.css">
<main>
    <p><?php var_dump($listBook);
        exit(); ?></p>
    <div class="livro">
        <div class="livro_imagem">
            <img src="data: <?php echo $listBook->getImagem()->getType(); ?>;base64, <?php echo $listBook->getImagem()->getBase64(); ?>" id="imagem">
        </div>
        <div class="livro_texto">
            <h3 class="title">
                <?php
                echo $listBook->getTitulo();
                ?>
            </h3>
            <h4 class="subtitle">Descrição:</h4>
            <ul class="informacoes">
                <li><b>Autor: </b><?php echo $listBook->getAutor(); ?></li>
                <li><b>Genero: </b><?php echo $listBook->getId_genero(); ?></li>
                <li><b>N Exemplares: </b><?php echo $listBook->getExemplares(); ?></li>
                <li><b>N Disponíveis: </b><?php echo $listBook->getDisponiveis(); ?></li>
            </ul>
            <h5>Sobre a obra</h5>
            <p>
                <?php echo $listBook->getResumo(); ?>
            </p>

            <?php
            if ($_SESSION['tipo_usuario'] == 'aluno') {
            ?>
                <div class="actions">
                    <a href="" class="buttonAtividade">Editar</a>
                    <a href="" class="buttonAtividade">Excluir</a>
                </div>
            <?php } else if ($_SESSION['tpo_usuario'] == 'funcionário') { ?>
                <div class="actions">
                    <a href="" class="buttonAtividade">Empréstimo</a>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>