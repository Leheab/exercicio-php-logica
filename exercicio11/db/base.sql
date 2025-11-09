-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 27/10/2025 às 20:14
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
-- Estrutura para tabela `exercicio11`
--

CREATE TABLE `exercicio11` (
  `id` int NOT NULL COMMENT 'Id',
  `base_number` int NOT NULL COMMENT 'Número Base',
  `quantity` int NOT NULL COMMENT 'Quantidade de Múltiplos',
  `average` decimal(10,5) NOT NULL COMMENT 'Média dos valores',
  `created_at` timestamp NOT NULL COMMENT 'Data de registro do cálculo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabela para o exercício 11: Sistema de Gerador de Sequências';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `exercicio11`
--
ALTER TABLE `exercicio11`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exercicio11`
--
ALTER TABLE `exercicio11`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Id';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
