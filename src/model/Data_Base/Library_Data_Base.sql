create database Library;
use Library;

create table Livros (
	id int auto_increment,
	Nome varchar(50) not null,
    Classificacao enum('Nao_Ditaticos', 'Ditaticos', 'Tecnicos') not null, 
    Quantidade int not null,
    primary key(id)
);

create table Funcionarios (
	id int auto_increment,
    Nome varchar(50) not null,
    Oficio varchar(50) not null, 
    primary key(id)
);

create table Alunos (
	id int auto_increment, 
	Nome varchar(50) not null,
    Turma enum('1_MKT_A', '1_MKT_B', '1_TDS_A', '1_TDS_B','2_MTK_A', '2_MKT_B', '2_TDS_A', '2_TDS_B', '3_MKT_A', '3_MKT_B','3_TDS_A', '3_TDS_B') not null,
    primary key(id)
);
