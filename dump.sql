CREATE DATABASE agenda;

CREATE TABLE `contato` ( `idContato` INT(11) NOT NULL AUTO_INCREMENT ,
 `nome` VARCHAR(100) NOT NULL ,
 `empresa` VARCHAR(100) NOT NULL , 
 `identificacao` VARCHAR(200) NOT NULL , 
 `apartamento` VARCHAR(20) NOT NULL , 
 `bloco` INT NOT NULL ,
 `data_cadastro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , 
 PRIMARY KEY (`idContato`)) ENGINE = InnoDB;