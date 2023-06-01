CREATE DATABASE Library;
USE Library;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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

INSERT INTO `usuario` ( `nome`, `email`, `senha`, `tipo_usuario`) VALUES
('Library', 'library@library', '4d70254b3a8e2bc38b6147fa6ee813be', 'funcionário');

--
-- Extraindo dados da tabela `usuario`
--


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


-- --------------------------------------------------------
--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `nome` varchar(255) NOT NULL,
  `imagemData` longblob NOT NULL,
  `imagemType` varchar(255) NOT NULL,
  `id_livro` int(11) auto_increment NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` text NOT NULL,
  `id_genero` int(11) NOT NULL,
  `exemplares` int(11) NOT NULL,
  `disponiveis` int(11) NOT NULL,
  `resumo` text NOT NULL,
  
  primary key(`id_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Extraindo dados da tabela `livro`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id` int(11) auto_increment NOT NULL,
  `genero` varchar(255) NOT NULL,
  
  primary key(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `genero`
--

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