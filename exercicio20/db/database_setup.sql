CREATE DATABASE IF NOT EXISTS novos_titans_dados;
USE novos_titans_dados;

CREATE TABLE IF NOT EXISTS exercicio20 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jogador_1_partida_1 INT, jogador_1_partida_2 INT, jogador_1_partida_3 INT, jogador_1_partida_4 INT, jogador_1_partida_5 INT,
    jogador_2_partida_1 INT, jogador_2_partida_2 INT, jogador_2_partida_3 INT, jogador_2_partida_4 INT, jogador_2_partida_5 INT,
    jogador_3_partida_1 INT, jogador_3_partida_2 INT, jogador_3_partida_3 INT, jogador_3_partida_4 INT, jogador_3_partida_5 INT,
    jogador_4_partida_1 INT, jogador_4_partida_2 INT, jogador_4_partida_3 INT, jogador_4_partida_4 INT, jogador_4_partida_5 INT,
    jogador_5_partida_1 INT, jogador_5_partida_2 INT, jogador_5_partida_3 INT, jogador_5_partida_4 INT, jogador_5_partida_5 INT,
    
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;