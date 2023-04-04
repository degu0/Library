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
    Turma enum('1 MKT A', '1 MKT B', '1 TDS A', '1 TDS B','2 MTK A', '2 MKT B', '2 TDS A', '2 TDS B', '3 MKT A', '3 MKT B','3 TDS A', '3 TDS B'),
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
    Serie_Escolar enum('MTK A', 'MTK B', 'TDS A', 'TDS B') not null,
    `Status` enum('Entregue', 'Devolvidos') not null,
    Quantidade int not null,
    Ano year not null,
    FK_id_Livro int,
    
    primary key(id), 
    foreign key(FK_id_Livro) references Livros(id) ON DELETE CASCADE
);

drop table livros;

SELECT p.id, l.Nome as Nome_Livro, p.Ano_Escolar, p.Serie_Escolar, p.Status, p.Quantidade, p.Ano 
        FROM Percentual p 
        INNER JOIN Livros l ON l.id = p.FK_id_Livro;

SELECT * FROM percentual;

DROP DATABASE Library;

        
SELECT p.id, l.Nome as Nome_Livro, p.Ano_Escolar, p.Serie_Escolar, p.Quantidade, p.`Status`, p.Ano
        FROM Percentual p
        INNER JOIN Livros l on l.id = p.FK_id_Livro
        ORDER BY Nome_Livro, Ano_Escolar, Serie_Escolar, `Status` ;

SELECT p.id, l.Nome as Nome_Livro, p.Ano_Escolar, p.Serie_Escolar, p.Quantidade, p.`Status`, p.Ano
        FROM Percentual p
        INNER JOIN Livros l on l.id = p.FK_id_Livro
        WHERE Ano_Escolar = "1º"
        ORDER BY Nome_Livro, Ano_Escolar, Serie_Escolar ;