CREATE DATABASE IF NOT EXISTS novos_titans_dados;
USE novos_titans_dados;

CREATE TABLE IF NOT EXISTS exercicio15 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    initial_concentration DECIMAL(10,2) NOT NULL,
    minimum_concentration DECIMAL(10,2) NOT NULL,
    time_result_hours INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;