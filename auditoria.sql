-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Dez-2018 às 02:14
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auditoria`
--
CREATE DATABASE IF NOT EXISTS `auditoria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `auditoria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_usuario`
--

CREATE TABLE `endereco_usuario` (
  `idendereco_usuario` int(10) UNSIGNED NOT NULL,
  `usuario_idusuario` int(10) UNSIGNED NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `complemento` text,
  `bairro` varchar(35) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `nome` varchar(55) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(55) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `senha` varchar(72) NOT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'0',
  `chave_autenticacao` varchar(72) NOT NULL,
  `tentativa` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `cpf`, `email`, `telefone`, `sexo`, `senha`, `ativo`, `chave_autenticacao`, `tentativa`) VALUES
(1, 'Luciano arruda teran', '017.415.652-94', '2011luciano2011@gmail.com', '(91)98129-5160', 'M', 'c3f2ba930b4edda2d40db68e5bc51435c89351829af63e2f0a5deec564c4493561d3a189', b'1', '', 0),
(2, 'raonner bruno rodrigues dos santos', '032.432.621-95', 'brunoraonner@gmail.com', '(91)98155-5169', 'M', 'c3f2ba930b4edda2d40db68e5bc51435c89351829af63e2f0a5deec564c4493561d3a189', b'0', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endereco_usuario`
--
ALTER TABLE `endereco_usuario`
  ADD PRIMARY KEY (`idendereco_usuario`),
  ADD KEY `endereco_usuario_FKIndex1` (`usuario_idusuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endereco_usuario`
--
ALTER TABLE `endereco_usuario`
  MODIFY `idendereco_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
