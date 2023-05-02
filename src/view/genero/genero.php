<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>

<body>
    <section>
        <div class="espaco_genero">
            <?php
            foreach ($list as $genero) {
            ?>
            <ul>
                <li><?php echo $genero->getGenero(). $genero->getClassificao();?></li>
            </ul>
            <?php } ?>
    </section>
</body>

<?php require __DIR__ . "/../share/footer.php"; ?>