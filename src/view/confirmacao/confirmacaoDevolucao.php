<script src="/librares/js/modal.js"></script>
<dialog class="modalDevolution">
    <button class="close-modal-devolution"> <i class="fa-solid fa-x fa-3x" style="color: #fff;"></i></button>
    <div class="confirmacao">
        <h1 class="titulo">Confirmação da devolução</h1>
        <?php foreach ($listLoan as $loan) { ?>
            <div class="dados">
                <p class="informacoes">
                    <span class="variavel">Aluno:</span>
                    <?php echo $loan->getAluno()->getUsuario()->getNome(); ?>
                </p>
                <p class="informacoes">
                    <span class="variavel">Livro:</span>
                    <?php echo $loan->getLivro()->getTitulo(); ?>
                </p>
                <p class="informacoes">
                    <span class="variavel">Data do empréstimo:</span>
                    <?php echo date('d/m/Y', strtotime($loan->getDataInicial())); ?>
                </p>
                <p class="informacoes">
                    <span class="variavel">Data da entrega:</span>
                    <?php echo date('d/m/Y', strtotime($loan->getDataFinal())); ?>
                </p>
            </div>
            <div>
                <a href="/home/delete?id=<?php echo $loan->getId(); ?>">
                    <i class="fa-solid fa-circle-check fa-3x" style="color: #8c6b4f;"></i>
                </a>
            </div>
        <?php } ?>
    </div>
</dialog>