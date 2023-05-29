
-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Dez-2020 às 16:56
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
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

INSERT INTO `genero` ( `genero`) VALUES
( 'Histórico'),
( 'Conto'),
( 'Cordel'),
('Ficção'),
( 'Escolar'),
( 'Crônica'),
( 'Literatura Juvenil'),
( 'Mistério'),
( 'Romance'),
( 'Épico'),
( 'Literatura Infantil'),
( 'Drama'),
( 'Poema'),
( 'Terror'),
( 'Pedagógico'),
( 'Fantasia'),
( 'Religioso'),
( 'Ciências Sociais'),
( 'Saúde');