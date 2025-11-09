-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 28/10/2025 às 23:57
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
-- Despejando dados para a tabela `exercicio11`
--

INSERT INTO `exercicio11` (`id`, `base_number`, `quantity`, `average`, `created_at`) VALUES
(1, 10, 14, 75.00000, '2025-10-28 22:50:29'),
(2, 10, 14, 75.00000, '2025-10-28 22:50:39'),
(3, 2, 4, 5.00000, '2025-10-28 22:50:47'),
(4, 1, 2, 1.50000, '2025-10-28 22:51:05'),
(5, 5, 4, 12.50000, '2025-10-28 23:04:34'),
(6, 48, 14, 360.00000, '2025-10-28 23:05:49'),
(7, 48, 14, 360.00000, '2025-10-28 23:24:05'),
(8, 24, 10, 132.00000, '2025-10-28 23:24:38'),
(9, 24, 10, 132.00000, '2025-10-28 23:26:26'),
(10, 38, 12, 247.00000, '2025-10-28 23:26:43'),
(11, 38, 12, 247.00000, '2025-10-28 23:28:28'),
(12, 38, 12, 247.00000, '2025-10-28 23:33:18'),
(13, 5, 15, 40.00000, '2025-10-28 23:33:53'),
(14, 5, 15, 40.00000, '2025-10-28 23:52:24');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
