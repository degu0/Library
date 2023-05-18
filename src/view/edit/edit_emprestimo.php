<title>Library - Cadastro de Empréstimos</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/cadastre/cadastre_loan.css">
<main>
    <div class="emprestimo">
        <div class="cadastro">
            <h2 id="title_cadastre">Empréstimos</h2>
            <form action="/gerenciar/emprestimo/update?id=<?php foreach($emprestimo as $loan) { echo $loan->getId(); };?>" method="POST">
                <div>
                    <label for="aluno">Nome do aluno(a):</label>
                    <select name="aluno" id="aluno">
                    <?php foreach($listaAluno as $aluno) {?>
                            <option value="<?php echo $aluno->getId();?>"><?php echo $aluno->getUsuario()->getNome();?></option>    
                        <?php }?>
                    </select>
                </div>
                <div>
                    <label for="livro">Nome do livro</label>
                    <select name="livro" id="livro">
                        <?php foreach($listaLivro as $livro) {?>
                            <option value="<?php echo $livro->getId();?>"><?php echo $livro->getTitulo();?></option>    
                        <?php }?>
                    </select>
                </div>
                <div>
                    <label for="data">Data do empréstimo:</label>
                    <input type="date" id="data" name="data" value="<? echo $emprestimo->getDataInicial()?>">
                </div>
                <div>
                    <input type="submit" id="button">
                </div>
            </form>
        </div>
    </div>
</main>

<?php require __DIR__ . "/../share/footer.php"; ?>