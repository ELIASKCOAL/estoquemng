-- Deletar a tabela se existir
DROP TABLE IF EXISTS `clientes`;

-- Criar a tabela de forma mais simples
CREATE TABLE `clientes` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(255) NOT NULL,
    `documento` varchar(20) NULL,
    `email` varchar(255) NOT NULL,
    `telefone` varchar(20) NULL,
    `endereco` text NULL,
    `status` varchar(20) NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 