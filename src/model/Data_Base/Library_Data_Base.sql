create database Library;
use Library;

create table Livros (
	id int auto_increment,
	Nome varchar(50) not null,
    Classificacao enum('Nao_Didaticos', 'Didaticos', 'Tecnicos') not null, 
    Quantidade int not null,
    primary key(id)
);

create table Pessoas (
	id int auto_increment,
    Nome  varchar(100) not null,
    Oficio varchar(50), 
    Turma enum('1_MKT_A', '1_MKT_B', '1_TDS_A', '1_TDS_B','2_MTK_A', '2_MKT_B', '2_TDS_A', '2_TDS_B', '3_MKT_A', '3_MKT_B','3_TDS_A', '3_TDS_B'),
    primary key(id)
);

create table Emprestimo (
	id int auto_increment,
    Data_Entrega date not null, 
	Data_Final date not null,
    FK_id_Livro int,
    FK_id_Pessoa int,
    
    primary key(id),
    foreign key(FK_id_Livro) references Livros(id) ON DELETE CASCADE,
    foreign key(FK_id_Pessoa) references Pessoas(id) ON DELETE CASCADE
);

create table Percentual (
	id int auto_increment,
    Ano_Escolar enum('1º', '2º', '3º') not null,
    Serie_Escolar enum('MTK_A', 'MTK_B', 'TDS_A', 'TDS_B') not null,
    `Status` enum('Entregue', 'Devolvidos') not null,
    Quantidade int not null,
    Ano year not null,
    FK_id_Livro int,
    
    primary key(id), 
    foreign key(FK_id_Livro) references Livros(id) ON DELETE CASCADE
);

drop table percentual;

SELECT p.id, l.Nome as Nome_Livro, p.Ano_Escolar, p.Serie_Escolar, p.Status, p.Quantidade, p.Ano 
        FROM Percentual p 
        INNER JOIN Livros l ON l.id = p.FK_id_Livro;

SELECT * FROM percentual;
SELECT * FROM livros WHERE Classificacao = 'Tecnicos';
UPDATE Livros SET Nome = 'text', Classificacao = 'Didaticos', Quantidade = 123 WHERE id = 1;
INSERT INTO Livros (Nome, Classificacao, Quantidade) VALUES ('o', 'Didaticos', 2);


SELECT e.id, p.Nome as NomePessoa, l.Nome, e.Data_Entrega, e.Data_Final 
FROM Emprestimo e 
INNER JOIN Pessoas p ON p.id = e.FK_id_Pessoa
INNER JOIN Livros l ON l.id = e.FK_id_Livro;

DROP DATABASE Library;


SELECT e.id, p.Nome as Nome_Pessoa, l.Nome as Nome_Livro, e.Data_Entrega, e.Data_Final 
        FROM Emprestimo e 
        INNER JOIN Pessoas p ON p.id = e.FK_id_Pessoa
        INNER JOIN Livros l ON l.id = e.FK_id_Livro
        WHERE p.Nome LIKE 'dasdas';
        
SELECT e.id, p.Nome as Nome_Pessoa, l.Nome as Nome_Livro, e.Data_Entrega, e.Data_Final 
        FROM Emprestimo e 
        INNER JOIN Pessoas p ON p.id = e.FK_id_Pessoa
        INNER JOIN Livros l ON l.id = e.FK_id_Livro
        WHERE e.id = 2;
        
SELECT * FROM Pessoas;
SELECT Data_Final FROM Emprestimo WHERE id = ?;
UPDATE Emprestimo SET Daata_Final = ? WHERE id = ?;
