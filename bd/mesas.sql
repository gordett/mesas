-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Dez-2016 às 00:12
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mesas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `composicao`
--

CREATE TABLE `composicao` (
  `id_mesa` int(11) NOT NULL,
  `nome_mesa` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `id_convidado` int(11) NOT NULL,
  `nome_convidado` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convidados`
--

CREATE TABLE `convidados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `convidados`
--

INSERT INTO `convidados` (`id`, `nome`) VALUES
(1, 'Paulo'),
(2, 'Luis'),
(3, 'Ana'),
(4, 'Paula'),
(5, 'Alexandre'),
(6, 'Joana'),
(7, 'Vera'),
(8, 'Rita'),
(9, 'Andreia'),
(10, 'Nelson'),
(11, 'João'),
(12, 'Jorge'),
(13, 'Maria'),
(14, 'Ilda'),
(15, 'José'),
(16, 'Francisco'),
(17, 'Rui'),
(18, 'Ruben'),
(19, 'Fabio'),
(20, 'Gelson'),
(21, 'Adrien'),
(22, 'William'),
(23, 'Bryan'),
(24, 'André'),
(25, 'Beatriz'),
(26, 'Manuela'),
(27, 'Rosario'),
(28, 'Sara'),
(29, 'Maria João'),
(30, 'Ana Filipa'),
(31, 'Ana Catarina'),
(32, 'Carolina'),
(33, 'João Carlos'),
(34, 'João José'),
(35, 'António'),
(36, 'Miguel'),
(37, 'Manuel'),
(38, 'Fátima'),
(39, 'Edgar'),
(40, 'Helena'),
(41, 'Elsa'),
(42, 'Juliana'),
(43, 'Iselia'),
(44, 'Georgina'),
(45, 'Leonardo'),
(46, 'Claudia'),
(47, 'Patricia'),
(48, 'Tiago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `lugares` int(11) NOT NULL,
  `x` varchar(7) COLLATE utf8_swedish_ci DEFAULT NULL,
  `y` varchar(7) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `nome`, `lugares`, `x`, `y`) VALUES
(1, '', 10, '501.25', '199'),
(2, '', 6, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `composicao`
--
ALTER TABLE `composicao`
  ADD PRIMARY KEY (`id_mesa`,`id_convidado`);

--
-- Indexes for table `convidados`
--
ALTER TABLE `convidados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `convidados`
--
ALTER TABLE `convidados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
