DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(255) NOT NULL,
    `documento` varchar(20),
    `email` varchar(255) NOT NULL,
    `telefone` varchar(20),
    `endereco` text,
    `status` varchar(20),
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 