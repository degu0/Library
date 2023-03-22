<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre_book.css">
<main>
    <section>
        <div id="container1">
            <h1>Cadastro de livros</h1>
            <form action="/cadastro/livro/add" method="POST">
                <label for="bookName">Nome do livro: </label>
                <input type="text" name="bookName" id="bookName"> <br>
                <label for="bookClassificon">Classificação: </label>
                <select name="bookClassificon" id="bookClassificon">
                    <option value="Nao_Didaticos">Não Didáticos</option>
                    <option value="Didaticos">Didáticos</option>
                    <option value="Tecnicos">Técnicos</option>
                </select><br>
                <label for="bookQuantity">Quantidade de livros: </label>
                <input type="number" name="bookQuantity" id="bookQuantity"><br>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <div id="container2">
            <img src="/images/Book.png" alt="">
        </div>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>