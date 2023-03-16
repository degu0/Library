<title>Library - Tabelas Emprestimos</title>
<?php require __DIR__ . "/../share/head.php";?>

<main>
    <h1>Tabela de emprestimos</h1>
    <table>
        <thead>
            <td scope="col">Nome_Pessoa</td>
            <td scope="col">Nome_Livro</td>
            <td scope="col">Dia Inicio</td>
            <td scope="col">Dia Final</td>
        </thead>
        <tbody>
        <?php foreach($listLoan as $loan) {?>
            <tr>
                <td><?php echo $loan->getPeople();?></td>
                <td><?php echo $loan->getBook();?></td>
                <td><?php echo $loan->getDate();?></td>
                <td><?php echo $loan->getDateFinal();?></td>
                <td>
                    <?php echo "<a href='/tabela/pessoa/edit?id=".$loan->getId(). "'>EDIT</a>";?>
                </td>
            </tr
            <?php }?>
        </tbody>
    </table>
</main>
<?php require __DIR__ . "/../share/footer.php";?>