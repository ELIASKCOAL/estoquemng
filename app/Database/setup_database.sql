-- Criar o banco de dados se não existir
CREATE DATABASE IF NOT EXISTS `clientesdb`;

-- Usar o banco de dados
USE `clientesdb`;

-- Dropar a tabela se existir
DROP TABLE IF EXISTS `clientes`;

-- Criar a tabela com todas as colunas necessárias
CREATE TABLE `clientes` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(255) NOT NULL,
    `documento` varchar(20) DEFAULT NULL,
    `email` varchar(255) NOT NULL,
    `telefone` varchar(20) DEFAULT NULL,
    `endereco` text DEFAULT NULL,
    `status` varchar(20) DEFAULT NULL,
    `created_at` datetime DEFAULT NULL,
    `updated_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Verificar se as colunas existem e adicionar se não existirem
ALTER TABLE `clientes`
ADD COLUMN IF NOT EXISTS `created_at` datetime DEFAULT NULL AFTER `status`,
ADD COLUMN IF NOT EXISTS `updated_at` datetime DEFAULT NULL AFTER `created_at`; 