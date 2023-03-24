<title>Library - Tabelas percentual</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/table.css">
<main>
    <section>
        <h1>Tabela de percentual</h1>
        <div id="containerTable">
            <table>
                <thead>
                    <td scope="col">Nome do Livro</td>
                    <td scope="col">Turma</td>
                    <td scope="col">Quantidade</td>
                    <td scope="col">Status</td>
                    <td scope="col">Ano</td>
                    <td scope="col">Configurações</td>
                </thead>
                <tbody>
                    <?php foreach ($listPercentage as $list) { ?>
                        <tr>
                            <td><?php echo $list->getBook(); ?></td>
                            <td><?php echo $list->getAnoEscolar(). " " . $list->getserieEscolar(); ?></td>
                            <td><?php echo $list->getQuantidade(); ?></td>
                            <td><?php echo $list->getStatus(); ?></td>
                            <td><?php echo $list->getAno(); ?></td>
                            <td id="superLinks">
                                <?php echo "<a href='/percentual/tabela/edit?id=" .  $list->getId() . "'>EDIT</a>"; ?>
                                <?php echo "<a href='/percentual/tabela/delete?id=" . $list->getId() . "'>DELETE</a>"; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>