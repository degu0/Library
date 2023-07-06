<title>Library - Genero Paradidático</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/genero.css">

<body>
    <main>
        <h1 class="title">            <?php
                if($listGenreParadidatico == null) {
                    echo "Nenhum cadastro do gênero.";
                } else {
                    echo "Gênero Paradidático.";
                }
            ?></h1>
            <hr id="hr-title">
        <?php
        foreach ($listGenreParadidatico as $list) {
        ?>
            <a href="/lista?id_genero=<?php echo $list->getId(); ?>" id="genero_link" title="<?php echo 'Gênero: '. $list->getGenero(); ?>">
                <div class="tag">
                    <div class="subtag">
                        <div class="nome_genero">
                            <h3 class="genero"><?php echo $list->getGenero(); ?></h3>
                            <?php if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'adm') { ?>
                                <a href="/generos/literatura/editar?id=<?php echo $list->getId() ?>" class="superLinks" id="edit"  title="Editar o gênero">
                                    <i class="fa-solid fa-pen fa-xl" style="color: #ffffff;"></i>
                                </a>
                                <a href="" class="superLinks" id="trash" title="Excluir o gênero">
                                    <i class="fa-solid fa-trash fa-xl" style="color: #fff;"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
        </div>
    </main>

</body>

<?php require __DIR__ . "/../share/footer.php"; ?>