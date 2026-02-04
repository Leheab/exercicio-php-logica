CREATE DATABASE IF NOT EXISTS novos_titans_dados;
USE novos_titans_dados;

CREATE TABLE IF NOT EXISTS exercicio19 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    state_1_product_1 DECIMAL(10,2), state_1_product_2 DECIMAL(10,2), state_1_product_3 DECIMAL(10,2), state_1_product_4 DECIMAL(10,2), state_1_product_5 DECIMAL(10,2),
    state_2_product_1 DECIMAL(10,2), state_2_product_2 DECIMAL(10,2), state_2_product_3 DECIMAL(10,2), state_2_product_4 DECIMAL(10,2), state_2_product_5 DECIMAL(10,2),
    state_3_product_1 DECIMAL(10,2), state_3_product_2 DECIMAL(10,2), state_3_product_3 DECIMAL(10,2), state_3_product_4 DECIMAL(10,2), state_3_product_5 DECIMAL(10,2),
    state_4_product_1 DECIMAL(10,2), state_4_product_2 DECIMAL(10,2), state_4_product_3 DECIMAL(10,2), state_4_product_4 DECIMAL(10,2), state_4_product_5 DECIMAL(10,2),
    state_5_product_1 DECIMAL(10,2), state_5_product_2 DECIMAL(10,2), state_5_product_3 DECIMAL(10,2), state_5_product_4 DECIMAL(10,2), state_5_product_5 DECIMAL(10,2),
    
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;