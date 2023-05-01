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
                <div class="input">
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" id="email" placeholder="Insira seu email">
                </div>
                <div class="input">
                    <label for="senha">Senha:</label><br>
                    <input type="password" name="senha" id="senha" placeholder="Insira sua senha">
                </div>
                <input type="submit" value="Entrar" id="button">
            </form>
            <div class="cadastre_google">
                <p class="blog-title">ou</p>
                <button class="link_google">
                    <a href="">
                        <img src="/images/google.png" alt="Logo da google">
                    </a>
                </button>
            </div>
            <div class="cadastre">
                <p>Voce nao tem conta?</p>
                <a href="/cadastro/usuario">CADASTRE AQUI</a>
            </div>
        </div>
    </section>
</body>

</html>