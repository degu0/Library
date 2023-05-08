<title>Library - Confirmação da devolução</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="librares/css/confirmacao.css">

<main>
    <div>
        <h1>Confirmação da sua devolução</h1>
        <h2>Por favor mostre para a/o bibliotecário</h2>
        <div class="dados">
            <p class="informacoes">
                <span>Aluno:</span>
                <?php echo $loan->getAluno(); ?>
            </p>
            <p class="informacoes">
                <span>Livro:</span>
                <?php echo $loan->getLivro(); ?>
            </p>
            <p class="informacoes">
                <span>Data do empréstimo:</span>
                <?php echo $loan->getDataInicio(); ?>
            </p>
            <p class="informacoes">
                <span>Data da devolução:</span>
                <?php echo $loan->getDataFinal(); ?>
            </p>
        </div>
        <div>
            <a href="/home">Confirme aqui</a>
        </div>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>