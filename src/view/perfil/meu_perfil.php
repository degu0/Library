<title>Library - Perfil</title>
<?php require __DIR__ . "/../share/head.php"; ?>

<main>
    <div class="perfil">
        <h1>Meu Perfil</h1>
        <div class="division"></div>
        <div class="division">
            <div class="infomation">
                <p>Nome: <span><?php echo $perfil->getNome(); ?></span></p>
            </div>
            <div class="infomation">
                <p>Email:<span><?php echo $perfil->getEmail(); ?></span></p>
            </div>
            <div class="infomation">
                <p>Função:<span><?php echo $perfil->getTipoUser() ?></span></p>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>