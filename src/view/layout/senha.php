<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/librares/css/cadastre/cadastre_additional.css">
    <link rel="shortcut icon" href="/images/LIbrary_Icon.png" type="image/x-icon">
    <title>Library - Cadastro do aluno</title>
</head>
<body>
    <main>
        <div class="cadastro">
            <form action="/confirmacao/emprestimo" method="POST">
            <?php
                if ($senhaIncorreta) {
                    echo "<script>alert('Senha Incorreta! Por favor, reveja!')</script>";
                }
                ?>
                <h2>Insira a senha</h2>
                <div>
                    <label for="senha">Senha:</label><br>
                    <input type="password" id="password" name="senha" class="input">
                    <div id="icon" onclick="showHide()"></div>
                </div>
                <div>
                    <input type="submit" id="button" value="Enviar">
                </div>
            </form>
        </div>
    </main>
    <script src="/librares/js/senha.js"></script>
</body>
</html>