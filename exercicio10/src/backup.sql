
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 25/10/2025 às 19:22
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
-- Despejando dados para a tabela `exercicio10`
--

INSERT INTO `exercicio10` (`id`, `name`, `score`, `subject`, `status`) VALUES
(1, 'Letícia Helena', 4, 'Matemática', 'Reprovado'),
(2, 'Poliana Alves', 8, 'Matemática', 'Aprovado'),
(3, 'Gabrila OLiveira', 5, 'Matemática', 'Recuperação'),
(4, 'Gabrila OLiveira', 5, 'Matemática', 'Recuperação'),
(5, 'Rafael Shrwloin', 5, 'Matemática', 'Reprovado'),
(6, 'Paola Azevedo', 9, 'Matemática', 'Aprovado');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Id do Aluno', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;