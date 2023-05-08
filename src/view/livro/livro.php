<title>Library - </title>
<?php require __DIR__ . "/../share/head.php"; ?>
<main>
    <p><?php var_dump($listBook);
        exit(); ?></p>
    <div class="livro_imagem">
        <img src="data: <?php echo $listBook->getImagem()->getType(); ?>;base64, <?php echo $listBook->getImagem()->getBase64(); ?>">
    </div>
    <div class="livro_texto">
        <h3>
            <?php
            echo $listBook->getTitulo();
            ?>
        </h3>
        <h4>Descrição:</h4>
        <ul>
            <li><b>Autor: </b><?php echo $listBook->getAutor(); ?></li>
            <li><b>Genero: </b><?php echo $listBook->getId_genero(); ?></li>
            <li><b>N Exemplares: </b><?php echo $listBook->getExemplares(); ?></li>
            <li><b>N Disponíveis: </b><?php echo $listBook->getDisponiveis(); ?></li>
        </ul>
        <h5>Sobre a obra</h5>
        <p>
            <?php echo $listBook->getResumo(); ?>
        </p>
    </div>

</main>

<?php require __DIR__ . "/../share/footer.php"; ?>