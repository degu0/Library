<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<style>
    main {
        height: 100vh;
    }
</style>
<body>
    <main>
        <div class="genero">
            <?php
                foreach($listGenreDidatico as $list) {
            ?>
                <a href="/lista?id_genero=<?php echo $list->getId();?>">
                    <div class="nome_genero">
                        <h3><?php echo $list->getGenero();?></h3>
                    </div>
                </a>
            <?php } ?>
        </div>
    </main>

</body>

<?php require __DIR__ . "/../share/footer.php"; ?>