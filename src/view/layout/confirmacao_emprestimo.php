<title>Library - Confirmação de empréstimo</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/confirmacao.css">

<main>
    <div class="confirmacao">
        <h1 class="titulo">Confirmação do seu empréstimo</h1>
        <h2 class="subtitulo">Por favor mostre para a/o bibliotecário</h2>
        <?php  foreach ($listInformation as $loan) { ?>
            <div class="dados">
                <p class="informacoes">
                    <span class="variavel">Aluno:</span>
                    <?php echo $loan->getAluno()->getUsuario()->getNome(); ?>
                </p>
                <p class="informacoes">
                    <span class="variavel">Livro:</span>
                    <?php echo $loan->getLivro()->getTitulo(); ?>
                </p>
                <p class="informacoes">
                    <span class="variavel">Data do empréstimo:</span>
                    <?php echo date('d/m/Y', strtotime($loan->getDataInicial())); ?>
                </p>
            </div>
            <div>
                <p class="erro">Dados incorretos? Por favor, edite o seu empréstimo. <br>
                 <a href="/gerenciar/emprestimo/editar?id=<?php echo $loan->getId();?>" class="link">Aqui</a></p>
            </div>
        <?php } ?>
        <div>
            <a href="/home" class="confirmation">
            <i class="fa-solid fa-circle-check fa-7x" style="color: #8c6b4f;"></i>
            </a>
        </div>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>