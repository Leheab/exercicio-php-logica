-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 18/11/2025 às 10:29
-- Versão do servidor: 8.0.43
-- Versão do PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `novos_titans_dados`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `exercicio13`
--

CREATE TABLE `exercicio13` (
  `id` int NOT NULL COMMENT 'Identificador único de cada registro',
  `preco` decimal(10,2) NOT NULL COMMENT 'Preço digitado pelo usuário',
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data e hora em que o preço foi registrado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='exercício 13: Tabela usada para guardar os preços digitados';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `exercicio13`
--
ALTER TABLE `exercicio13`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exercicio13`
--
ALTER TABLE `exercicio13`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de cada registro';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
