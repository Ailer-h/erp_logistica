-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Set-2024 às 14:12
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `erp_logistica`
--
CREATE DATABASE IF NOT EXISTS `erp_logistica` DEFAULT CHARACTER SET utf8mb4;
USE `erp_logistica`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(50) NOT NULL,
  `email_empresa` varchar(50) NOT NULL,
  `senha_empresa` varchar(50) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `email_empresa`, `senha_empresa`) VALUES
(1, 'Admin', 'adm@adm.com', 'adm123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id_materiaPrima` int NOT NULL AUTO_INCREMENT,
  `id_empresa` int NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `qtd_padrao` int NOT NULL,
  `qtd_estoque` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_materiaPrima`),
  KEY `id_empresa` (`id_empresa`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

DROP TABLE IF EXISTS `nota`;
CREATE TABLE IF NOT EXISTS `nota` (
  `id_nota` int NOT NULL AUTO_INCREMENT,
  `id_empresa` int NOT NULL,
  `produto_nota` varchar(100) NOT NULL,
  `qtd_produto` int NOT NULL,
  `data_nota` date DEFAULT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `id_empresa` (`id_empresa`)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `id_registro` int NOT NULL AUTO_INCREMENT,
  `id_empresa` int NOT NULL,
  `id_nota` int NOT NULL,
  `qtd_recebida` int NOT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'requisitado',
  PRIMARY KEY (`id_registro`),
  KEY `id_nota` (`id_nota`),
  KEY `id_empresa` (`id_empresa`)
);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
