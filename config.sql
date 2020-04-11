-- Cria o banco
create database sisweb;

-- Usa o banco criado
use sisweb;

-- Exclui a tabela usuario se existir
drop table if exists usuario;

-- Cria a tabela usuario
CREATE TABLE usuario (
    email VARCHAR(100) NOT NULL PRIMARY KEY,
    senha VARCHAR(100) NOT NULL
);

-- Insere o primeiro usuario no banco
INSERT INTO `usuario` (`email`,`senha`) VALUES ("gabriel@ranstech.com","ranstech");