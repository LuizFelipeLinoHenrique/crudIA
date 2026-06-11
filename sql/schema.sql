CREATE DATABASE IF NOT EXISTS gerenciador_itens;
USE gerenciador_itens;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Usuário padrão para teste (senha: admin123)
-- A senha foi gerada usando password_hash('admin123', PASSWORD_DEFAULT)
INSERT INTO usuarios (usuario, senha) VALUES ('admin', '$2y$10$8W3mP.VpZzM9U4iW/L8uX.xGjP7uYvY5u7p9F.7X/9u9V8w7V6u7a')
ON DUPLICATE KEY UPDATE usuario=usuario;
