<script src="/librares/js/modal.js"></script>
<dialog class="modalLoan">
    <button class="close-modal-loan"> <i class="fa-solid fa-x fa-3x" style="color: #fff;"></i></button>
    <div class="confirmacao">
        <h1 class="titulo">Confirmação do empréstimo</h1>
        <?php foreach ($listRequest as $request) { ?>
            <div class="dados">
                <p class="informacoes">
                    <span class="variavel">Aluno:</span>
                    <?php echo $request->getAluno()->getUsuario()->getNome(); ?>
                </p>
                <p class="informacoes">
                    <span class="variavel">Livro:</span>
                    <?php echo $request->getLivro()->getTitulo(); ?>
                </p>
                <p class="informacoes">
                    <span class="variavel">Data do empréstimo:</span>
                    <?php echo date('d/m/Y', strtotime($request->getData())); ?>
                </p>
            </div>
            <div>
                <p class="erro">Dados incorretos? Por favor, edite o seu empréstimo. <br> <a href="/gerenciar/emprestimo/editar?id=<?php echo $request->getId(); ?>" class="link">Aqui</a></p>
            </div>
        <?php } ?>
        <div>
            <a href="/solicitacao/add?id_solicitacao=<?php echo $request->getId(); ?>&aluno=<?php echo $request->getAluno()->getId(); ?>&livro=<?php echo $request->GetLivro()->getId(); ?>&data=<?php echo $request->getData(); ?>" class="confirmation">
                <i class="fa-solid fa-circle-check fa-3x" style="color: #8c6b4f;"></i>
            </a>
        </div>
    </div>
</dialog>