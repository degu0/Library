<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre_book.css">

<main>
    <section>
        <div id="container1">
            <h1>Cadastro de livros</h1>
            <form action="/tabela/livro_nao_didatico/update?id=<?php echo $book->getId() ?>" method="POST">
                <label for="idBookName">Nome do livro: </label> <br>
                <input type="text" name="bookName" id="idBookName" value="<?php echo $book->getName(); ?>"> <br>
                <label for="idBookClassificon">Classificação: </label> <br>
                <select name="bookClassificon" id="idBookClassificon">
                    <option value="Nao_Didaticos">Não Didáticos</option>
                    <option value="Didaticos">Didáticos</option>
                    <option value="Tecnicos">Técnicos</option>
                </select><br>
                <label for="idBookQuantity">Quantidade de livros: </label><br>
                <input type="number" name="bookQuantity" id="idBookQuantity" value="<?php echo $book->getQuantity(); ?>"><br>
                <input type="submit" value="Cadastrar" id="buttom">
            </form>
        </div>
            <div id="container2">
                <img src="/images/Book.png" alt="">
            </div>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>