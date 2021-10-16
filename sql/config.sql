-- Cria o banco
create database sisweb;

-- Usa o banco criado
use sisweb;

-- Exclui a tabela admin se não existir
drop table if exists administrador;

-- Cria a tabela admin
CREATE TABLE administrador (
    email VARCHAR(100) NOT NULL PRIMARY KEY,
    senha VARCHAR(100) NOT NULL
);

-- Insere o primeiro admin
INSERT INTO `administrador` (`email`,`senha`) VALUES ("admin@admin.com","admin");

-- Cria a tabela membro
CREATE TABLE membro (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    senha VARCHAR(100),
    cpf VARCHAR(100),
    apelido VARCHAR(100) NOT NULL,
    nome_compl VARCHAR(100),
    data_nasci VARCHAR(100),
    localizacao VARCHAR(100),
    telefone VARCHAR(100),
    obs VARCHAR(100)
);
