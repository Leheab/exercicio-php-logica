-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 15/10/2025 às 23:57
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
-- Estrutura para tabela `exercicio10`
--

CREATE TABLE `exercicio10` (
  `id` int NOT NULL COMMENT 'Id do Aluno',
  `name` varchar(256) NOT NULL COMMENT 'Nome do Aluno',
  `score` decimal(7,0) NOT NULL COMMENT 'Nota do Aluno',
  `subject` varchar(125) NOT NULL COMMENT 'Disciplina',
  `status` varchar(125) NOT NULL COMMENT 'Situação da Disciplina'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Tabela para o exercício 10: Relação de Notas e status';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `exercicio10`
--
ALTER TABLE `exercicio10`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exercicio10`
--
ALTER TABLE `exercicio10`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Id do Aluno';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;