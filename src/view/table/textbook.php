<title>Library - Tabelas livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/table.css">
<style>
    a {
        color: blue;
        margin-right: 10px;
    }
</style>
<main>
    <h1>Tabela de livros</h1>
    <a href="/tabela/livro_nao_didatico">Livros não didáticos</a>
    <a href="/tabela/livro_didatico">Livros didáticos</a>
    <a href="/tabela/livro_tecnico">Livros técnicos</a>
    <table>
        <thead>
            <td scope="col">Nome</td>
            <td scope="col">Classificao</td>
            <td scope="col">Quantidade</td>
            <td scope="col">Configurações</td>
        </thead>
        <tbody>
            <?php foreach ($listBook as $book) {?>
            <tr>
                <td><?php echo $book->getName(); ?></td>
                <td><?php echo $book->getClassification(); ?></td>
                <td><?php echo $book->getQuantity(); ?></td>
                <td>
                    <?php echo "<a href='/tabela/livro/edit?id=" .  $book->getId() . "'>EDIT</a>"; ?>
                    <?php echo "<a href='/tabela/livro/delete?id=" . $book->getId() . "'>DELETE</a>"; ?>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>