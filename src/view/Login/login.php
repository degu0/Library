<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Login</title>
    <link rel="shortcut icon" href="/images/Library_Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="/librares/css/login.css">
</head>

<body>
    <section class="area_login">
        <div class="login">
            <div>
                <h1 id="titulo">Library</h1>
            </div>
            <form action="/login/logar" method="POST">
                <?php
                if (isset($loginIncorreto)) {
                    echo "<script>alert('Email ou senha esta incorreto, por favor reveja')</script>";
                }
                ?>
                <div class="input">
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" id="email" placeholder="Insira seu email">
                </div>
                <div class="input" id="input_senha">
                    <label for="senha">Senha:</label><br>
                    <input type="password" name="senha" id="password" placeholder="Insira sua senha">
                    <div id="icon" onclick="showHide()"></div>
                </div>
                <input type="submit" value="Entrar" id="button">
            </form>
            <!-- <div class="cadastre_google">
                <p class="blog-title">ou</p>
                <a href="" class="link">
                    <img src="/images/google.png" alt="Logo da google" id="google">
                    CADASTRE-SE COM O GOOGLE
                </a>
            </div> -->
            <!-- <div class="cadastre">
                <p>Você não têm conta?</p>
                <a href="/login/cadastro">CADASTRE AQUI</a>
            </div> -->
        </div>
    </section>
    <script src="/librares/js/senha.js"></script>
</body>

</html>