-- --------------------------------------------------------
--
-- Estrutura da tabela `Historico`
--


create table `Historico` (
	`id` int auto_increment not null,
    `Status` enum('sim', 'nao') not null,
    `Data_Emprestimo` date not null,
    `Data_devolucao` date,
    `Adiamento` int,
	`FK_id_Livro` int,
    `FK_id_Aluno` int,
    
    primary key(id),
    foreign key(FK_id_Livro) references Livro(id_livro) ON DELETE CASCADE,
    foreign key(FK_id_Aluno) references usuario_aluno(id) ON DELETE CASCADE
);