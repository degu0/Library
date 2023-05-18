<title>Library - Genero Didático</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/genero.css">

<body>
    <main>
        <h1 class="title">Género Didático</h1>
        <?php
        foreach ($listGenreDidatico as $list) {
        ?>
            <a href="/lista?id_genero=<?php echo $list->getId(); ?>" id="genero_link">
                <div class="tag">
                    <div class="subtag">
                        <div class="nome_genero">
                            <h3 class="genero"><?php echo $list->getGenero(); ?></h3>
                            <a href="/generos/didaticos/editar?id=<?php echo $list->getId()?>" class="superLinks" id="edit">
                                <i class="fa-solid fa-pen fa-xl" style="color: #ffffff;"></i>
                            </a>
                            <a href="/generos/didaticos/excluir?id=<?php echo $list->getId()?>" class="superLinks" id="trash">
                                <i class="fa-solid fa-trash fa-xl" style="color: #fff;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
    </main>

</body>

<?php require __DIR__ . "/../share/footer.php"; ?>