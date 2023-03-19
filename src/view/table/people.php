<title>Library - Tabelas pessoas</title>
<?php require __DIR__ . "/../share/head.php";?>
<link rel="stylesheet" href="/librares/css/table.css">

<main>
    <h1>Tabela de pessoas</h1>
    <table>
        <thead>
            <td scope="col">Nome</td>
            <td scope="col">Oficio</td>
            <td scope="col">Turma</td>
            <td scope="col">Configurações</td>
        </thead>
        <tbody>
        <?php foreach($listPeople as $people) {?>
            <tr>
                <td><?php echo $people->getName();?></td>
                <td><?php echo $people->getTrade();?></td>
                <td><?php echo $people->getClass();?></td>
                <td>
                    <?php echo "<a href='/tabela/pessoa/edit?id=".$people->getId(). "'>EDIT</a>";?>
                    <?php echo "<a href='/tabela/pessoa/delete?id=" . $people->getId() . "'>DELETE</a>"; ?>
                </td>
            </tr
            <?php }?>
        </tbody>
    </table>
</main>
<?php require __DIR__ . "/../share/footer.php";?>