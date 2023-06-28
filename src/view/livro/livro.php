<?php 

foreach ($listBook as $book) { ?>
<title>Library -             <?php
            echo $book->getTitulo();
            ?></title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="librares/css/book.css">
<main>
        <h3 class="title">
            <?php
            echo $book->getTitulo();
            ?>
        </h3>
        <hr id="linha">
        <div class="livro">
            <div class="livro_imagem">
                <img src="data: <?php echo $book->getImagem()->getType(); ?>;base64, <?php echo $book->getImagem()->getBase64(); ?>" id="imagem">
            </div>
            <div class="livro_texto">
                <h4 class="subtitle">Descrição:</h4>
                <ul class="informacoes">
                    <li class="text"><b>Autor: </b><?php echo $book->getAutor(); ?></li>
                    <li class="text"><b>N Exemplares: </b><?php echo $book->getExemplares(); ?></li>
                    <li class="text"><b>N Disponíveis: </b><?php echo $book->getDisponiveis(); ?></li>
                </ul>
                <h5 class="subtitle">Sobre a obra</h5>
                <p class="text">
                    <?php echo $book->getResumo(); ?>
                </p>

                <?php
                if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'adm') {
                ?>
                    <div class="actions">
                        <a href="/livro/editar?id_livro=<?php echo $book->getId(); ?>" class="buttonAtividade">
                            <p>Editar</p>
                        </a>
                        <a href="/livro/excluir?id_livro=<?php echo $book->getId();?>&id_genero=<?php echo $book->getId_genero();?>" class="buttonAtividade">
                            <p>Excluir</p>
                        </a>
                    </div>
                <?php } else if (array_key_exists('tipo_usuario', $_SESSION) && $_SESSION['tipo_usuario'] == 'aluno' && $_SESSION['emprestimo'] == false) {?>
                    <div class="actions">
                        <a href="/livro/emprestimo?id_livro=<?php echo $book->getId(); ?>&id_usuario=<?php echo $_SESSION['id_usuario'];?>" class="buttonAtividade" id="solicitacao-emprestimo">
                            <p>Solicitação do empréstimo</p>
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>