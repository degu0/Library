<title>Library</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/home.css">
<style>
    #green {
        background-color: green;
    }

    #yellow {
        background-color: yellow;
    }

    #red {
        background-color: red;
    }
</style>
<main>
    <h1>Home</h1>
    <div>
        <input type="search" name="search" id="search">
    </div>
    <div id="tableInfo">
        <table>
            <thead>
                <th scope="col">Cor</th>
                <th scope="col">Nome de livro</th>
                <th scope="col">Nome da pessoa</th>
                <th scope="col">Excluir</th>
                <th scope="col">Adiar</th>
            </thead>
            <tbody>
                <tr>
                    <td id="green"></td>
                    <td>Harry Potter</td>
                    <td>Zezinho</td>
                    <td>X</td>
                    <td>+</td>
                </tr>
                <tr>
                    <td id="yellow"></td>
                    <td>Narnia</td>
                    <td>Maria</td>
                    <td>X</td>
                    <td>+</td>
                </tr>
                <tr>
                    <td id="red"></td>
                    <td>Pequeno principe</td>
                    <td>Joazinho</td>
                    <td>X</td>
                    <td>+</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <a href="/cadastro/pessoa">Pessoa</a>
        <a href="/cadastro/livro">Livro</a>
        <a href="/tabela/livro">Livro</a>
        <a href="/tabela/livro">Pessoa</a>
    </div>
    <div>
        <h2>Percentual</h2>
    </div>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>