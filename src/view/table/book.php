<title>Library - Tabelas livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/table_book.css">
<main>
    <section>
        <h1>Tabela de livros</h1>
        <div id="classification_book">
            <a href="/tabela/livro_nao_didatico">Livros não didáticos</a>
            <a href="/tabela/livro_didatico">Livros didáticos</a>
            <a href="/tabela/livro_tecnico">Livros técnicos</a>
        </div>
        <div id="containerTable">
            <table>
                <thead>
                    <td scope="col">Nome</td>
                    <td scope="col">Classificao</td>
                    <td scope="col">Quantidade</td>
                    <td scope="col">Configurações</td>
                </thead>
                <tbody>
                    <?php foreach ($listBook as $book) { ?>
                        <tr>
                            <td><?php echo $book->getName(); ?></td>
                            <td><?php echo $book->getClassification(); ?></td>
                            <td><?php echo $book->getQuantity(); ?></td>
                            <td id="superLinks">
                                <?php echo "<a href='/tabela/livro_nao_didatico/edit?id=" .  $book->getId() . "'>EDIT</a>"; ?>
                                <?php echo "<a href='/tabela/livro_nao_didatico/delete?id=" . $book->getId() . "'>DELETE</a>"; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>