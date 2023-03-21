<title>Library - Tabelas Emprestimos</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/table.css">

<main>
    <h1>Tabela de emprestimos</h1>
    <table>
        <thead>
            <td scope="col">Nome_Pessoa</td>
            <td scope="col">Nome_Livro</td>
            <td scope="col">Dia Inicio</td>
            <td scope="col">Dia Final</td>
            <td scope="col">Configurações</td>
        </thead>
        <tbody>
            <?php foreach ($listLoan as $loan) { ?>
                <tr>
                    <td><?php echo $loan->getPeople(); ?></td>
                    <td><?php echo $loan->getBook(); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($loan->getDate())); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($loan->getDateFinal())); ?></td>
                    <td>
                        <?php echo "<a href='/emprestimo/tabela/edit?id=" . $loan->getId() . "'>EDIT</a>"; ?>
                        <?php echo "<a href='/emprestimo/tabela/delete?id=" . $loan->getId() . "'>DELETE</a>"; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>