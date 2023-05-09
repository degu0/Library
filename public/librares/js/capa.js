function capaClick() {
    document.getElementById("imagem_livro").click();
}

function exibirCapa(e) {

    if (e.files[0]) {
        var leitor = new FileReader();

        leitor.onload = function (e) {
            document.getElementById("placeholder").setAttribute('src', e.target.result);
        }

        leitor.readAsDataURL(e.files[0]);
    }
}