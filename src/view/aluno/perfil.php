<title>Library - Perfil</title>
<?php require __DIR__ . "/../share/head.php"; ?>

<main>
    <div class="perfil">
        <h1>Meu Perfil</h1>
        <div class="division"></div>
        <div class="division">
            <div class="infomation">
                <p>Matricula: <span><?php echo $perfil->getMatricula(); ?></span></p>
            </div>
            <div class="infomation">
                <p>Nome: <span><?php echo $perfil->getUsuario()->getNome(); ?></span></p>
            </div>
            <div class="infomation">
                <p>Email:<span><?php echo $perfil->getUsuario()->getEmail(); ?></span></p>
            </div>
            <div class="infomation">
                <p>Numero do aluno: <span><?php echo $perfil->getNumero(); ?></span></p>
            </div>
            <div class="infomation">
                <p>Numero do responsável: <span><?php echo $perfil->getNumeroResponsavel(); ?></span></p>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>