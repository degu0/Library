<title>Library - EmprestimoP</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/acervo.css">

<main>
<?php foreach ($listLoan  as $loan) { ?>
    <div class="tabela">
        <table>
            <thead>
                <th scope="col">Nome de livro</th>
                <th scope="col">Data de inicial</th>
                <th scope="col">Data de final</th>
            </thead>
            <tbody>

                <tr>
                    <td><?php echo $loan->getLivro()->getTitulo(); ?></td>
                    <td><?php echo  date('d/m/Y', strtotime($loan->getDataInicial())); ?></td>
                    <td><?php echo  date('d/m/Y', strtotime($loan->getDataFinal())); ?></td>
                </tr>

            </tbody>
        </table>
    </div>
<?php } ?>
</main>




<?php require __DIR__ . "/../share/footer.php"; ?>