<title>Library - Acervo</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/acervo.css">

<main>
    <h1 class="title">Empréstimo</h1>
    <?php if ($listaEmprestimo != null) { ?>
        <div class="tabela">
            <table>
                <thead>
                    <th scope="col">Nome de livro</th>
                    <th scope="col">Numero do(a) aluno(a)</th>
                    <th scope="col">Data de inicial</th>
                    <th scope="col">Data de final</th>
                </thead>
                <tbody>
                    <?php foreach ($listaEmprestimo as $list) { ?>
                        <tr>
                            <td><?php echo $list->getLivro()->getTitulo(); ?></td>
                            <td> <a href="/meu-perfil?id=<?php echo $list->getAluno()->getId(); ?>&aluno=<?php echo $list->getAluno()->getUsuario()->getNome(); ?>" id="link-aluno">
                                    <?php echo $list->getAluno()->getUsuario()->getNome(); ?>
                                </a></td>
                            <td><?php echo  date('d/m/Y', strtotime($list->getDataInicial())); ?></td>
                            <td><?php echo  date('d/m/Y', strtotime($list->getDataFinal())); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else { ?>
            <div class="alert">
                <h1 class="semCadastro">Sem empréstimo no momento!</h1>
                <i class="fa-solid fa-triangle-exclamation fa-3x" id="icon-alert"></i>
            </div>
        <?php } ?>
    <h1 class="title">Histórico</h1>
    <?php if ($listaHistorico != null) { ?>
        <div class="tabela">
            <table>
                <thead>
                    <th scope="col">Nome de livro</th>
                    <th scope="col">Numero do(a) aluno(a)</th>
                    <th scope="col">Data de inicial</th>
                    <th scope="col">Data de final</th>
                    <th scope="col">Adiamentos</th>
                    <th scope="col">Status</th>
                </thead>
                <tbody>
                    <?php foreach ($listaHistorico as $list) { ?>
                        <tr>
                            <td><?php echo $list->getLivro()->getTitulo(); ?></td>
                            <td>
                                <a href="/meu-perfil?id=<?php echo $list->getAluno()->getId(); ?>&aluno=<?php echo $list->getAluno()->getUsuario()->getNome(); ?>" id="link-aluno">
                                    <?php echo $list->getAluno()->getUsuario()->getNome(); ?>
                                </a>
                            </td>
                            <td><?php echo  date('d/m/Y', strtotime($list->getDataInicial())); ?></td>
                            <td><?php echo  date('d/m/Y', strtotime($list->getDataFinal())); ?></td>
                            <td><?php echo  $list->getAdiamento(); ?></td>
                            <td><?php
                                if (date('d/m/Y', strtotime($list->getDataFinal())) < strtotime(date("Y/m/d"))) {
                                    echo "Atrasado";
                                } else if ($list->getStatus() == 'entregue') {
                                    echo "Devolvido";
                                } else if ($list->getStatus() == 'espera') {
                                    echo "Em empréstimo";
                                } ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else { ?>
            <div class="alert">
                <h1 class="semCadastro">Sem histórico no momento!</h1>
                <i class="fa-solid fa-triangle-exclamation fa-3x" id="icon-alert"></i>
            </div>
        <?php } ?>
</main>


<?php require __DIR__ . "/../share/footer.php"; ?>