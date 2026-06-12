-- Script para criar o banco de dados e a tabela de alunos

CREATE DATABASE IF NOT EXISTS cadastro_ams;

USE cadastro_ams;

CREATE TABLE IF NOT EXISTS alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    ra VARCHAR(20) NOT NULL,
    curso VARCHAR(100) NOT NULL
);
