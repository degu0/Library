<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php";?>
<link rel="stylesheet" href="/librares/css/cadastre.css">

<main>
    <h1>Cadastro de livros   
    </h1>
    <section>
        <form action="/tabela/livro/update?id=<?php echo $book->getId() ?>" method="POST">
            <label for="idBookName">Nome do livro: </label>
            <input type="text" name="bookName" id="idBookName" value="<?php echo $book->getName();?>"> <br>
            <label for="idBookClassificon">Classificação: </label>
            <select name="bookClassificon" id="idBookClassificon">
                <option value="Nao_Didaticos">Não Didáticos</option>
                <option value="Didaticos">Didáticos</option>
                <option value="Tecnicos">Técnicos</option>
            </select><br>
            <label for="">Quantidade de livros: </label>
            <input type="number" name="bookQuantity" id="idBookQuantity" value="<?php echo $book->getQuantity();?>"><br>
            <input type="submit" value="Cadastrar">
        </form>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php";?>