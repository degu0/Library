<title>Library - Lista de livro</title>
<?php require __DIR__ . "/../share/head.php"; ?>

<body>
    <section>
        <?php
        foreach($list as $l) {
        ?>
            <a href="/livro?id=<?php echo $l->getId();?>"><?php echo $l->getTitulo();?></a><br>
        <?php }?>
    </section>
</body>





<?php require __DIR__ . "/../share/footer.php"; ?>