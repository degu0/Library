-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) auto_increment NOT NULL,
  `nome` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` enum('aluno', 'funcionário') NOT NULL	,
  
  primary key(`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` ( `nome`, `email`, `senha`, `tipo_usuario`) VALUES
('asd', 'asd@asd', '8af3982673455323883c06fa59d2872a', 'funcionário');
