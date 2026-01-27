CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    papel ENUM('aluno', 'mentor') NOT NULL,
    UNIQUE KEY nome_papel_unico (nome, papel)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO usuarios (nome, papel) VALUES 
('Davi Leandro', 'aluno'), ('Enedson Gomes', 'aluno'), ('Fernanda Maressa', 'aluno'), 
('Julia Anjos', 'aluno'), ('Letícia Helena', 'aluno'), ('Rayane Duarte', 'aluno'), 
('Valéria Mazok', 'aluno'), ('Jean Prado', 'aluno'), ('Edmar Gomes', 'mentor'), 
('Liliane Paixão', 'mentor'), ('Pamela Neco', 'mentor');

CREATE TABLE IF NOT EXISTS exercicio18 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno_id INT NOT NULL,
    mentor_id INT NOT NULL,
    nvts_aluno TEXT NOT NULL,
    nvts_mentor TEXT NOT NULL,
    exclusivos_json TEXT NOT NULL,
    status ENUM('Pendente', 'Corrigido', 'Validado') DEFAULT 'Pendente',
    data_registro DATETIME NOT NULL,
    FOREIGN KEY (aluno_id) REFERENCES usuarios(id),
    FOREIGN KEY (mentor_id) REFERENCES usuarios(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;