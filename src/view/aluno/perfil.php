<title>Library - Perfil</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/perfil.css">

<main>
    <div class="perfil">
        <?php foreach ($meuPerfil as $perfil) { ?>
            <h1 class="title">Meu Perfil</h1>
            <hr id="hr-title">
            <div class="division">
                <div class="aboutPerfil">
                    <p>Matricula: <span><?php echo $perfil->getMatricula(); ?></span></p>
                </div>
                <div class="aboutPerfil">
                    <p>Nome: <span><?php echo $perfil->getUsuario()->getNome(); ?></span></p>
                </div>
                <div class="aboutPerfil">
                    <p>Email: <span><?php echo $perfil->getUsuario()->getEmail(); ?></span></p>
                </div>
                <div class="aboutPerfil">
                    <p>Numero do aluno: <span><?php echo $perfil->getNumero(); ?></span></p>
                </div>
                <div class="aboutPerfil">
                    <p>Numero do responsável: <span><?php echo $perfil->getNumeroResponsavel(); ?></span></p>
                </div>
            </div>
        <?php } ?>
        <?php if ($ListLoan != null) { ?>
            <div class="tabela">
                <table>
                    <thead>
                        <th scope="col">Nome de livro</th>
                        <th scope="col">Data de inicial</th>
                        <th scope="col">Data de final</th>
                    </thead>
                    <tbody>
                        <?php foreach ($ListLoan as $loan) { ?>
                            <tr>
                                <td><?php echo $loan->getLivro()->getTitulo(); ?></td>
                                <td><?php echo  date('d/m/Y', strtotime($loan->getDataInicial())); ?></td>
                                <td><?php echo  date('d/m/Y', strtotime($loan->getDataFinal())); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>