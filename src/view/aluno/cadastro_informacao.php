<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/librares/css/cadastre/cadastre_Genre.css">
    <title>Library - Cadastro do aluno</title>
</head>
<body>
    <main>
        <div class="cadastro">
            <form action="/cadastro-de-informacoes/add" method="POST">
                <div>
                    <label for="matricula">Numero da matricula escolar:</label><br>
                    <input type="number" id="matricula" name="matricula" class="input">
                </div>
                <div>
                    <label for="numeroAluno">Numero de celular do aluno:</label><br>
                    <input type="tel" id="numeroAluno" name="numeroAluno" class="input">
                </div>
                <div>
                    <label for="numeroResponsavel">Numero do responsavel do aluno:</label><br>
                    <input type="tel" id="numeroResponsavel" name="numeroResponsavel" class="input">
                </div>
                <div>
                    <input type="submit" id="button" value="Enviar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>