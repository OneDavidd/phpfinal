create database php;

USE php;

CREATE TABLE IF NOT EXISTS prova_final (
    idFornecedor INT NOT NULL AUTO_INCREMENT,
    razaoSocial VARCHAR(50) NOT NULL,
    nomeFantasia VARCHAR(50) NOT NULL,
    cnpj CHAR(14) NOT NULL,
    responsavel VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    ddd CHAR(3) NOT NULL,
    telefone CHAR(10) NOT NULL,
    PRIMARY KEY (idFornecedor)
);