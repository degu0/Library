<title>Library - Acervo</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/acervo.css">

<main>
    <div class="tabela">
        <h1 class="title">Acervo</h1>
        <table>
            <thead>
                <th scope="col">Nome de livro</th>
                <th scope="col">Nome do aluno</th>
                <th scope="col">Data de inicial</th>
                <th scope="col">Data de final</th>
            </thead>
            <tbody>
                <?php foreach ($listaEmprestimo as $list) { ?>
                    <tr>
                        <td><?php echo $list->getLivro()->getTitulo(); ?></td>
                        <td><?php echo $list->getAluno()->getMatricula(); ?></td>
                        <td><?php echo  date('d/m/Y', strtotime($loan->getDataInicial())); ?></td>
                        <td><?php echo  date('d/m/Y', strtotime($loan->getDataFinal())); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>


<?php require __DIR__ . "/../share/footer.php"; ?>