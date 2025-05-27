ALTER TABLE `clientes`
ADD COLUMN IF NOT EXISTS `documento` varchar(20) AFTER `nome`,
ADD COLUMN IF NOT EXISTS `endereco` text AFTER `telefone`,
ADD COLUMN IF NOT EXISTS `status` varchar(20) AFTER `endereco`; 