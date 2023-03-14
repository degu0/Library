<title>Library - Cadastro Livros</title>
<?php require __DIR__ . "/../share/head.php";?>

<main>
    <h1>Cadastro de livros   
    </h1>
    <section>
        <form action="/cadastro/livro/add">
            <label for="idBookName">Nome do livro: </label>
            <input type="text" name="bookName" id="idBookName"> <br>
            <label for="idBookClassificon">Classificação: </label>
            <select name="bookClassificon" id="idBookClassificon">
                <option value="Nao_Didaticos">Não Didáticos</option>
                <option value="Didaticos">Didáticos</option>
                <option value="Tecnicos">Técnicos</option>
            </select><br>
            <label for="">Quantidade de livros: </label>
            <input type="number" name="bookQuantity" id="idBookQuantity"><br>
            <input type="submit" value="Cadastrar">
        </form>
    </section>
</main>
<?php require __DIR__ . "/../share/footer.php";?>