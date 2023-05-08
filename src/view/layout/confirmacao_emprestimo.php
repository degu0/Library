<title>Library - Confirmação de devolução</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="librares/css/confirmacao.css">

<main>
    <div>
        <h1>Confirmação do seu empréstimo</h1>
        <h2>Por favor mostre para a/o bibliotecário</h2>
        <div class="dados">
            <p class="informacoes">
                <span>Aluno:</span>
                <?php echo $loan->getAluno();?>
            </p>
            <p class="informacoes">
                <span>Livro:</span>
                <?php echo $loan->getLivro();?>
            </p>
            <p class="informacoes">
                <span>Data do empréstimo:</span>
                <?php echo $loan->getDataInicio();?>
            </p>
        </div>
        <div>
            <p>Dados incorretos? Por favor, edite o seu empréstimo. <a href="">Aqui</a></p>
        </div>
        <div>
            <a href="/home">Confirme aqui</a>
        </div>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>