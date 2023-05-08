<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Cadastro do aluno</title>
</head>
<body>
    <main>
        <div class="cadastro">
            <form action="/cadastro-de-informacoes/add" method="POST">
                <div class="input">
                    <label for="matricula">Numero da matricula escolar:</label><br>
                    <input type="number" id="matricula" name="matricula">
                </div>
                <div class="input">
                    <label for="numeroAluno">Numero de celular do aluno:</label><br>
                    <input type="tel" id="numeroAluno" name="numeroAluno">
                </div>
                <div class="input">
                    <label for="numeroResponsavel">Numero do responsavel do aluno:</label><br>
                    <input type="tel" id="numeroResponsavel" name="numeroResponsavel">
                </div>
                <div class="input">
                    <input type="submit" id="button" value="Enviar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>