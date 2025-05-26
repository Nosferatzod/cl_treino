-- SQLBook: Code
-- cltreino/database/cltreino.sql

-- Criação do banco (comando opcional - você pode criar manualmente via phpMyAdmin)
CREATE DATABASE IF NOT EXISTS cltreino CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE cltreino;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de resultados
CREATE TABLE IF NOT EXISTS resultados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    area VARCHAR(50) NOT NULL,
    pontuacao INT NOT NULL,
    data_teste DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Exemplos de usuários (senha = "123456" criptografada)
INSERT INTO usuarios (nome, email, senha) VALUES
('João Silva', 'joao@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Maria Souza', 'maria@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Exemplos de resultados
INSERT INTO resultados (usuario_id, area, pontuacao) VALUES
(1, 'logistica', 80),
(2, 'seguranca', 65);

ALTER TABLE usuarios ADD COLUMN foto_perfil VARCHAR(255) DEFAULT 'assets/images/user-default.png';

ALTER TABLE resultados ADD COLUMN respostas TEXT;  -- Para armazenar as respostas

ALTER TABLE usuarios ADD COLUMN reset_token VARCHAR(64) NULL;
ALTER TABLE usuarios ADD COLUMN reset_expira DATETIME NULL;

ALTER TABLE usuarios ADD COLUMN cpf VARCHAR(14) NULL;
ALTER TABLE usuarios ADD COLUMN telefone VARCHAR(15) NULL;
ALTER TABLE usuarios ADD UNIQUE INDEX idx_cpf_unique (cpf);
-- Ou para mais detalhes:
CREATE TABLE IF NOT EXISTS respostas_quiz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    quiz_id VARCHAR(50) NOT NULL,
    pergunta_id INT NOT NULL,
    resposta VARCHAR(255) NOT NULL,
    correta BOOLEAN NOT NULL,
    data_resposta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);