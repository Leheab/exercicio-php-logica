USE novos_titans_dados;

CREATE TABLE IF NOT EXISTS exercicio17 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    temperatura_maxima DECIMAL(5,2) NOT NULL,
    temperatura_minima DECIMAL(5,2) NOT NULL,
    temperatura_media DECIMAL(5,2) NOT NULL,
    percentual_calor INT NOT NULL,
    dados_completos_json TEXT NOT NULL,
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;