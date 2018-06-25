CREATE SCHEMA `scapeh` ;

CREATE TABLE `scapeh`.`funcionario` (
  `fun_cod` INT NOT NULL AUTO_INCREMENT,
  `fun_nome` VARCHAR(50) NOT NULL,
  `fun_user` VARCHAR(20) NOT NULL,
  `fun_senha` VARCHAR(20) NOT NULL,
  `fun_email` VARCHAR(50) NULL,
  `fun_data_admissao` DATE NULL,
  PRIMARY KEY (`fun_cod`),
  UNIQUE INDEX `fun_user_UNIQUE` (`fun_user` ASC));
  
INSERT INTO FUNCIONARIO VALUES (1, 'Mauricio Yassunaga', 'user1', 'fatec', 'mauricio@scapeh.com.br', '2018/02/01');
INSERT INTO FUNCIONARIO VALUES (2, 'Guilherme Pinto', 'user2', 'fatec', 'guilherme@scapeh.com.br', '2017/05/30');
INSERT INTO FUNCIONARIO VALUES (3, 'Felipe Rodolfo', 'user3', 'fatec', 'felipe@scapeh.com.br', '2018/05/25');
INSERT INTO FUNCIONARIO VALUES (4, 'Administrador', 'adm', '123', 'adm@scapeh.com.br', '2017/05/30');
  
select * from reserva;  
select * from telefone; 
select * from cliente;   
select * from quarto;  
 
CREATE TABLE `scapeh`.`cliente` (
  `cli_cod` INT NOT NULL AUTO_INCREMENT,
  `cli_nome` VARCHAR(50) NOT NULL,
  `cli_rg` BIGINT(9) NULL,
  `cli_cpf` BIGINT(11) NULL,
  `cli_email` VARCHAR(50) NULL,
  `cli_endereco` VARCHAR(100) NULL,
  `fun_cod` INT NOT NULL,
  PRIMARY KEY (`cli_cod`),
  UNIQUE INDEX `cli_cpf_UNIQUE` (`cli_cpf` ASC),
  INDEX `fun_cod_idx` (`fun_cod` ASC),
  CONSTRAINT `fun_cod`
    FOREIGN KEY (`fun_cod`)
    REFERENCES `scapeh`.`funcionario` (`fun_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
	
CREATE TABLE `scapeh`.`telefone` (
  `tel_cod` INT NOT NULL AUTO_INCREMENT,
  `tel_numero` BIGINT(11) NOT NULL,
  `tel_descricao` VARCHAR(50) NOT NULL,
  `cli_cod` INT NOT NULL,
  PRIMARY KEY (`tel_cod`),
  INDEX `cli_cod_idx` (`cli_cod` ASC),
  CONSTRAINT `cli_cod`
    FOREIGN KEY (`cli_cod`)
    REFERENCES `scapeh`.`cliente` (`cli_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `scapeh`.`quarto` (
  `qua_cod` INT NOT NULL AUTO_INCREMENT,
  `qua_numero` INT(2) NOT NULL,
  `qua_situacao` VARCHAR(20) NOT NULL,
  `fun_cod` INT NOT NULL,
  PRIMARY KEY (`qua_cod`),
  UNIQUE INDEX `qua_numero_UNIQUE` (`qua_numero` ASC),
  INDEX `fun_cod_idx` (`fun_cod` ASC),
  CONSTRAINT `fun_cod`
    FOREIGN KEY (`fun_cod`)
    REFERENCES `scapeh`.`funcionario` (`fun_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `scapeh`.`reserva` (
  `res_cod` INT NOT NULL AUTO_INCREMENT,
  `res_data_entrada` DATE NOT NULL,
  `res_data_saida` DATE NOT NULL,
  `res_valor` DECIMAL(10,2) NOT NULL,
  `fun_cod` INT NOT NULL,
  `cli_cod` INT NOT NULL,
  `qua_cod` INT NOT NULL,
  PRIMARY KEY (`res_cod`),
  INDEX `fun_cod_idx` (`fun_cod` ASC),
  INDEX `cli_cod_idx` (`cli_cod` ASC),
  INDEX `qua_cod_idx` (`qua_cod` ASC),
  CONSTRAINT `fun_cod`
    FOREIGN KEY (`fun_cod`)
    REFERENCES `scapeh`.`funcionario` (`fun_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cli_cod`
    FOREIGN KEY (`cli_cod`)
    REFERENCES `scapeh`.`cliente` (`cli_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `qua_cod`
    FOREIGN KEY (`qua_cod`)
    REFERENCES `scapeh`.`quarto` (`qua_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);