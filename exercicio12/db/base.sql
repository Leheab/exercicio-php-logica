-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 04/11/2025 às 00:38
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
-- Estrutura para tabela `Exercicio12`
--

CREATE TABLE `Exercicio12` (
  `id` int NOT NULL COMMENT 'Identificador',
  `word` varchar(20) NOT NULL COMMENT 'Palavra usada para gerar pirâmide',
  `levels` int NOT NULL COMMENT 'Quantos níveis a pirâmide tera',
  `total_repetitions` int NOT NULL COMMENT 'Quantidade total de repetições da palavra',
  `date_created` timestamp NOT NULL COMMENT 'Data e hora'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Exercício 12: Pirâmides';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Exercicio12`
--
ALTER TABLE `Exercicio12`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Exercicio12`
--
ALTER TABLE `Exercicio12`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Identificador';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
