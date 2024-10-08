-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Out-2024 às 11:53
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
CREATE DATABASE IF NOT EXISTS `erp_logistica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `email_empresa`, `senha_empresa`) VALUES
(1, 'Admin', 'adm@adm.com', 'hm_acesso123'),
(2, 'Camisetas', 'camisas@empresa.com', 'camiseta_acesso'),
(3, 'Jeans', 'jeans@empresa.com', 'jeans_acesso'),
(4, 'Paçoca', 'pacoca@empresa.com', 'pacoca_acesso'),
(5, 'Macarrão', 'macarrao@empresa.com', 'macarrao_acesso'),
(6, 'Tenis', 'tenis@empresa.com', 'tenis_acesso'),
(7, 'Brigadeiro', 'brigadeiro@empresa.com', 'brigadeiro_acesso');

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
  `qtd_estoque` int NOT NULL DEFAULT '0',
  `unidade_medida` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'em_uso',
  PRIMARY KEY (`id_materiaPrima`),
  KEY `id_empresa` (`id_empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

DROP TABLE IF EXISTS `nota`;
CREATE TABLE IF NOT EXISTS `nota` (
  `id_nota` int NOT NULL AUTO_INCREMENT,
  `id_empresa` int NOT NULL,
  `produto_nota` int NOT NULL,
  `qtd_produto` int NOT NULL,
  `data_nota` date DEFAULT NULL,
  `estado_nota` varchar(15) NOT NULL DEFAULT 'Requisitada',
  PRIMARY KEY (`id_nota`),
  KEY `id_empresa` (`id_empresa`),
  KEY `produto_nota` (`produto_nota`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `id_registro` int NOT NULL AUTO_INCREMENT,
  `id_empresa` int NOT NULL,
  `id_nota` int NOT NULL,
  `qtd_recebida` int DEFAULT NULL,
  `data_registro` date DEFAULT NULL,
  `estado_registro` varchar(20) NOT NULL DEFAULT 'Requisitado',
  PRIMARY KEY (`id_registro`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_nota` (`id_nota`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
