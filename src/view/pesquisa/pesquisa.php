<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>

<body>
    <main>
        <h1>
            <?php
            if ($listaLivro == null) {
                echo "Nenhum resultado encontrado";
            } else {
                echo "Resultado da pesquisa " . $_GET['searchNav'];
            }
            ?>
        </h1>
        <?php
        foreach ($listaLivro as $list) {
        ?>
            <div class="livro">
                <div class="fotoLink">
                    <a href="#">
                        <img src="data: <?php echo $list->getImagem()->getType()?>;base64, <?php echo $list->getImagem()->getBase64();?>">
                    </a>
                </div>
                <div class="sobre">
                    <div class="titulo">
                        <h3><?php
                            $nome = $list->getTitulo();
                            if (strlen($nome) > 30) {
                                echo substr($nome, 0, 30) . "...";
                            } else {
                                echo $nome;
                            }
                            ?></h3>
                        <span class=<?php
                                    if (strlen($nome) > 30) {
                                        echo "toolip_texto";
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
                    <div class="autor">
                        <p>
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
                    <div class="verMais">
                        <a class="visualizar" href="/livro?titulo=<?php $list->getTituloLink();?>">Ver Livro</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </main>
</body>





<?php require __DIR__ . "/../share/footer.php"; ?>