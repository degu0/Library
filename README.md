<h1 align='center'>Library</h1>
<p align='center'>
<img src="http://img.shields.io/static/v1?label=License&message=MIT&color=green&style=for-the-badge"/>
<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
<img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white">
<img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white">
<img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white">
<img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black">
<img src="http://img.shields.io/static/v1?label=STATUS&message=CONCLUIDO&color=GREEN&style=for-the-badge"/>
</p>


![Group 3 (1)](https://user-images.githubusercontent.com/87346972/229935098-bc755f28-ecdd-4175-b40f-2885f22abdd2.png)

> 🛑 EM FINALIZAÇÃO 🛑

Este é um website desenvolvido para facilitar a organização dos livros da biblioteca da Escola Técnica Estadual Ministro Fernando Lyra. Com um sistema de armazenamento de dados simplificado e fácil de usar, os usuário poderão facilmente gerenciar o acervo da biblioteca.

Esperamos que este website ajude a melhorar a experiência de pesquisa e empréstimo de livros na Escola Técnica Estadual Ministro Fernando Lyra.

## Funcionalidade do projeto.

* `Funcionalidade 1` : Adicionar novos livros e usuários ao sistema;
* `Funcionalidade 2` : Registrar empréstimos e devoluções de livros;
* `Funcionalidade 3` : Acompanhar o status de reserva de cada livro;
* `Funcionalidade 4` : Gerenciar o acervo da biblioteca.

## Técnicas e tecnologia utilizadas

 * `PHP`;
 * `HTML, CSS e JavaScript`;
 * `Google charts`;
 * `MVC`;
 * `Composer`.

## Como rodar a aplicação

Primeiramente, antes de baixar o arquivo. Baixe o [composer](https://www.hostinger.com.br/tutoriais/como-instalar-e-usar-o-composer) no seu computador.

No terminal do git use o comando clone para baixar o projeto: 

```
git clone https://github.com/degu0/Library.git
```

Quando estiver com o arquivo baixado, abrira com seu editor de código e após para o terminal. E executará: 

```
composer install
```

E logo depois:

```
composer update
```

## Inciando com o Banco de Dados

Para rodar o banco de dados do projeto, tera que coloca-lo no seu MySQL Worbench. Logo depois, ira para o arquivo Schron/src/model/BD/conexao.php.
E lá mudará para a suas informações: 
* Hostname;
* Username;
* Senha;
* Database.

Ex:
```
private $endereco = "127.0.0.1";
private $login = "root";
private $senha = "root";
private $banco = "exemplo";
```

Assim tera o acesso do banco de dados para a ferramenta.

## Como rodar os testes

Quando efetuar os comandos com o composer, criará um servidor web com php. No seu terminal ainda, efetue o comando:

```
php -S localhost:8080 -t public
```

Agora no explorador de escolha coloque barra de pesquisa a localização do servidor web:

```
localhost:8080
```

## Autor


| Programador |
| ------------- | 
| <img src='https://user-images.githubusercontent.com/87346972/217927708-f2a659a3-d43e-417a-a549-c30942a122d6.jpeg' width="150" height="150">  |
| [Deyvid Gustavo](https://www.linkedin.com/in/deyvid-gustavo-0642a2235/)  |


## Licença

The MIT License (MIT)

Copyright :copyright: 2022 - Library
