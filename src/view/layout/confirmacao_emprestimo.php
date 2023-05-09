<title>Library - Confirmação de devolução</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="librares/css/confirmacao.css">

<main>
    <div class="confirmacao">
        <h1 class="titulo">Confirmação do seu empréstimo</h1>
        <h2 class="subtitulo">Por favor mostre para a/o bibliotecário</h2>
        <div class="dados">
            <p class="informacoes">
                <span class="variavel">Aluno:</span>
                <?php echo $loan->getAluno();?>
            </p>
            <p class="informacoes">
                <span class="variavel">Livro:</span>
                <?php echo $loan->getLivro();?>
            </p>
            <p class="informacoes">
                <span class="variavel">Data do empréstimo:</span>
                <?php echo $loan->getDataIncial();?>
            </p>
        </div>
        <div>
            <p>Dados incorretos? Por favor, edite o seu empréstimo. <a href="" class="link">Aqui</a></p>
        </div>
        <div>
            <a href="/home">
                <img src="/public/images/accept.png" alt="Confirmação">
            </a>
        </div>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>