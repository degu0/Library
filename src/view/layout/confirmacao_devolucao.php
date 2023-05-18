<title>Library - Confirmação da devolução</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="librares/css/confirmacao.css">
<link rel="stylesheet" href="/librares/css/confirmacao.css">

<main>
    <div class="confirmacao">
        <h1 class="titulo">Confirmação do seu devolução</h1>
        <h2 class="subtitulo">Por favor mostre para a/o bibliotecário</h2>
        <?php foreach ($listInformation as $loan) { ?>
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
            <p class="informacoes">
                <span class="variavel">Data da entrega:</span>
                <?php echo date('d/m/Y', strtotime($loan->getDataFinal())); ?>
            </p>
        </div>
        <div>
            <a href="/home/delete?id=<?php echo $loan->getId();?>">
                <i class="fa-solid fa-circle-check fa-7x" style="color: #8c6b4f;"></i>
            </a>
        </div>
        <?php } ?>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>