-- --------------------------------------------------------
--
-- Estrutura da tabela `usuario_aluno`
--

CREATE TABLE `usuario_aluno` (
  `nome` varchar(55) NOT NULL,
  `numero_aluno` varchar(11) NOT NULL,
  `numero_responsavel` varchar(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `Fk_id_Usuario` int(11) NOT NULL,
  `id` int(11) auto_increment NOT NULL,
  
  primary key(id),
  foreign key(FK_id_Usuario) references usuario(id_usuario) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


