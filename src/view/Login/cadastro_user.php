<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Cadastro Login</title>
    <link rel="shortcut icon" href="/images/Library_Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="/librares/css/cadastre/cadastre_user.css">
</head>

<body>
    <section class="area_login">
        <div class="login">
            <div>
                <h1 id="titulo">Library</h1>
            </div>
            <form action="/login/cadastro/add" method="POST">
                <?php
                if (isset($SenhaIncorreta)) {
                    echo "<script>alert('A senha esta incorreto, por favor reveja')</script>";
                }
                ?>
                <div class="input">
                    <label for="email">Nome Completo:</label><br>
                    <input type="text" name="nome" id="nome" placeholder="Insira seu nome">
                </div>
                <div class="input">
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" id="email" placeholder="Insira seu email">
                </div>
                <div class="input">
                    <label for="senha">Senha:</label><br>
                    <input type="password" name="senha" id="senha" placeholder="Insira sua senha">
                </div>
                <div class="input">
                    <label for="senha">Confirma a sua senha:</label><br>
                    <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Confirma sua senha">
                </div>
                <div class="select">
                    <label for="tipoUser">Tipo de usuário: </label><br>
                    <select name="tipoUser" id="tipoUser">
                        <option value="aluno">Aluno(a)</option>
                        <option value="funcionário">Bibliotecário(a)</option>
                    </select>
                </div>
                <input type="submit" value="Entrar" id="button">
            </form>
            <div class="cadastre_google">
                <p class="blog-title">ou</p>
                <button class="link_google">
                    <a href="" class="link">
                        <img src="/images/google.png" alt="Logo da google" id="google">
                        CADASTRE-SE COM O GOOGLE
                    </a>
                </button>
            </div>
        </div>
    </section>
</body>

</html>