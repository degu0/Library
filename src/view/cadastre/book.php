<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre_book.css">
<main>
    <section>
        <div id="container1">
            <h2>Cadastro de livros</h2>
            <form action="/cadastro/livro/add" method="POST">
                <label for="bookName">Nome do livro: </label><br>
                <input type="text" name="bookName" id="bookName" placeholder="Insira o titulo do livro" required> <br>
                <label for="bookClassificon">Classificação: </label><br>
                <select name="bookClassificon" id="bookClassificon">
                    <option value="Nao_Didaticos">Não Didáticos</option>
                    <option value="Didaticos">Didáticos</option>
                    <option value="Tecnicos">Técnicos</option>
                </select><br>
                <label for="bookQuantity">Quantidade de livros: </label><br>
                <input type="number" name="bookQuantity" id="bookQuantity" placeholder="Insira a quantidade dos livros" required><br>
                <input type="submit" value="Cadastrar" id="buttom">
            </form>
        </div>
        <div id="container2">
            <img src="/images/Book.png" alt="livro aberto" id="imgCadastre">
        </div>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>