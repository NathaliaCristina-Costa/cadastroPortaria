CREATE DATABASE agenda;

CREATE TABLE `contato` (
  `idContato` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `identificacao` varchar(200) NOT NULL,
  `apartamento` varchar(20) NOT NULL,
  `bloco` int(11) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `saida` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;