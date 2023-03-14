<title>Library - Tabelas pessoas</title>
<?php require __DIR__ . "/../share/head.php";?>

<main>
    <h1>Tabela de pessoas</h1>
    <table>
        <thead>
            <td scope="col">Nome</td>
            <td scope="col">Oficio</td>
            <td scope="col">Turma</td>
        </thead>
        <tbody>
        <?php foreach($listPeople as $people)?>
            <tr>
                <td><?php echo $people->getName();?></td>
                <td><?php echo $people->getTrade();?></td>
                <td><?php echo $people->getClass();?></td>
            </tr>
        </tbody>
    </table>
</main>
<?php require __DIR__ . "/../share/footer.php";?>