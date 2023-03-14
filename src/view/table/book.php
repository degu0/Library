<title>Library - Tabelas livros</title>
<?php require __DIR__ . "/../share/head.php";?>

<main>
    <h1>Tabela de livros</h1>
    <table>
        <thead>
            <td scope="col">Nome</td>
            <td scope="col">Classificao</td>
            <td scope="col">Quantidade</td>
        </thead>
        <tbody>
            <?php foreach($listBook as $book)?>
            <tr>
                <td><?php echo $book->getName();?></td>
                <td><?php echo $book->getClassification();?></td>
                <td><?php echo $book->getQuantity();?></td>
            </tr>
        </tbody>
    </table>
</main>
<?php require __DIR__ . "/../share/footer.php";?>