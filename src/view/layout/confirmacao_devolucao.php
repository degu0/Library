<title>Library - Confirmação da devolução</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="librares/css/confirmacao.css">

<main>
    <div class="confirmacao">
        <h1 class="titulo">Confirmação do seu devolução</h1>
        <h2 class="subtitulo">Por favor mostre para a/o bibliotecário</h2>
        <div class="dados">
            <p class="informacoes">
                <span class="variavel">Aluno:</span>
                <?php echo $loan->getAluno(); ?>
            </p>
            <p class="informacoes">
                <span class="variavel">Livro:</span>
                <?php echo $loan->getLivro(); ?>
            </p>
            <p class="informacoes">
                <span class="variavel">Data do empréstimo:</span>
                <?php echo $loan->getDataIncial(); ?>
            </p>
            <p class="informacoes">
                <span class="variavel">Data da entrega:</span>
                <?php echo $loan->getDataFinal(); ?>
            </p>
        </div>
        <div>
            <p>Dados incorretos? Por favor, edite o seu empréstimo. <a href="" class="link">Aqui</a></p>
        </div>
        <div>
            <a href="/home">
                <i class="fa-solid fa-circle-check fa-7x" style="color: #8c6b4f;"></i>
            </a>
        </div>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>