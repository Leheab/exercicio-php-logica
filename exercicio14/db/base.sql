CREATE TABLE `exercicio14` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome1` varchar(100) NOT NULL,
  `valor1_inicial` decimal(10,2) NOT NULL,
  `taxa1` decimal(5,2) NOT NULL,
  `nome2` varchar(100) NOT NULL,
  `valor2_inicial` decimal(10,2) NOT NULL,
  `taxa2` decimal(5,2) NOT NULL,
  `meses` int NOT NULL,
  `valor1_final` decimal(10,2) NOT NULL,
  `valor2_final` decimal(10,2) NOT NULL,
  `data_calculo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_data` (`data_calculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;