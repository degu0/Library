-- --------------------------------------------------------
--
-- Estrutura da tabela `emprestimo`
--

create table `emprestimo`(
	`id` int auto_increment,
    `Data_Entrega` date not null, 
	`Data_Final` date not null,
    `FK_id_Livro` int,
    `FK_id_Aluno` int,
    
    primary key(id),
    foreign key(FK_id_Livro) references Livro(id_livro) ON DELETE CASCADE,
    foreign key(FK_id_Aluno) references usuario_aluno(id) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;