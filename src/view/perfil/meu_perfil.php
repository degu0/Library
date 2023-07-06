<title>Library - Perfil</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/perfil.css">

<main>
    <div class="perfil-funcionario">
        <?php foreach ($meuPerfil as $perfil) { ?>
            <h1 class="title">Meu Perfil</h1>
            <hr id="hr-title">
            <div class="division">
                <div class="aboutPerfil">
                    <p>Nome: <span><?php echo $perfil->getNome(); ?></span></p>
                </div>
                <div class="aboutPerfil">
                    <p>Email: <span><?php echo $perfil->getEmail(); ?></span></p>
                </div>
                <div class="aboutPerfil">
                    <p>Função: <span><?php echo $perfil->getTipoUser() ?></span></p>
                </div>
                <a href="/excel">EXCEL</a>
            </div>
        <?php } ?>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>