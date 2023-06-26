<title>Library - Lista de livro</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/lista.css">

<body>
    <main>
        <h1 id="title">
            <?php
            if ($listaLivro == null) {
                echo "Nenhum livro cadastrado";
            } else {
                echo "Gênero";
            }
            ?>
        </h1>
        <hr id="divisao">
        <div class="lista">
            <?php
            foreach ($listaLivro as $list) {
            ?>
                <div class="livro">
                    <div class="fotoLink">
                        <a href="#">
                            <img src="data: <?php echo $list->getImagem()->getType() ?>;base64, <?php echo $list->getImagem()->getBase64(); ?>" class="imagemLivro">
                        </a>
                    </div>
                    <div class="sobre">
                        <div class="tooltip_space">
                            <div class="titulo">
                                <h3 class="text"><?php
                                                    $nome = $list->getTitulo();
                                                    if (strlen($nome) > 30) {
                                                        echo substr($nome, 0, 30) . "...";
                                                    } else {
                                                        echo $nome;
                                                    }
                                                    ?></h3>
                                <span class=<?php
                                            if (strlen($nome) > 30) {
                                                echo "tooltip_text";
                                            } else {
                                                echo "none";
                                            }
                                            ?>>
                                    <?php
                                    if (strlen($nome) > 30) {
                                        echo $nome;
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="autor">
                            <p class="text">
                                <?php
                                $autor = $list->getAutor();
                                if (strlen($autor) > 30) {
                                    echo "Autor: " . substr($autor, 0, 30) . "...";
                                } else {
                                    echo "Autor: " . $autor;
                                }
                                ?>
                            </p>
                        </div>
                        <div id="divVerMais">
                            <a class="visualizar" href="/livro?id_livro=<?php echo $list->getId(); ?>" id="verMais" class="text-button">Ver Livro</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</body>



<?php require __DIR__ . "/../share/footer.php"; ?>