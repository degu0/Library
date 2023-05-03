<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>

<body>
    <section>
        <?php
        foreach($list as $l) {
        ?>
            <p><?php echo $l->getTitulo();?></p>
        <?php }?>
    </section>
</body>





<?php require __DIR__ . "/../share/footer.php"; ?>