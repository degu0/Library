<title>Library - Acervo</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/acervo.css">

<main>
    <div class="tabela">
        <h1 class="title">Empréstimo</h1>
        <table>
            <thead>
                <th scope="col">Nome de livro</th>
                <th scope="col">Numero da matricula do aluno</th>
                <th scope="col">Data de inicial</th>
                <th scope="col">Data de final</th>
            </thead>
            <tbody>
                <?php foreach ($listaEmprestimo as $list) { ?>
                    <tr>
                        <td><?php echo $list->getLivro()->getTitulo(); ?></td>
                        <td><?php echo $list->getAluno()->getMatricula(); ?></td>
                        <td><?php echo  date('d/m/Y', strtotime($list->getDataInicial())); ?></td>
                        <td><?php echo  date('d/m/Y', strtotime($list->getDataFinal())); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="tabela">
        <h1 class="title">Histórico</h1>
        <table>
            <thead>
                <th scope="col">Nome de livro</th>
                <th scope="col">Numero da matricula do aluno</th>
                <th scope="col">Data de inicial</th>
                <th scope="col">Data de final</th>
                <th scope="col">Adiamentos</th>
                <th scope="col">Status</th>
            </thead>
            <tbody>
                <?php foreach ($listaHistorico as $list) { ?>
                    <tr>
                        <td><?php echo $list->getLivro()->getTitulo(); ?></td>
                        <td><?php echo $list->getAluno()->getMatricula(); ?></td>
                        <td><?php echo  date('d/m/Y', strtotime($list->getDataInicial())); ?></td>
                        <td><?php echo  date('d/m/Y', strtotime($list->getDataFinal())); ?></td>
                        <td><?php echo  $list->getAdiamento(); ?></td>
                        <td><?php 
                        if (date('d/m/Y', strtotime($list->getDataFinal())) < strtotime(date("Y/m/d"))) {
                            echo "Atrasado";
                        }else if ($list->getStatus() == 'sim') {
                            echo "Devolvido";
                        }else if($list->getStatus() == 'nao') {
                            echo "Em empréstimo";
                        } ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>


<?php require __DIR__ . "/../share/footer.php"; ?>