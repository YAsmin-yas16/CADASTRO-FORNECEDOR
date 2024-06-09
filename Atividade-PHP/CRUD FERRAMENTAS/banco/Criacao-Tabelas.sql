CREATE DATABASE `almoxarifado` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

CREATE TABLE almoxarifado.tb_usuario (
	cod_usuario INT auto_increment NOT NULL,
	login_usuario varchar(30) NULL,
	senha_usuario varchar(40) NULL,
	CONSTRAINT tb_usuario_pk PRIMARY KEY (cod_usuario)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
CREATE TABLE almoxarifado.tb_ferramentas (
	cod_ferramenta INT auto_increment NOT NULL,
	nome_ferramenta varchar(80) NULL,
	marca_ferramenta varchar(60) NULL,
	CONSTRAINT tb_ferramentas_pk PRIMARY KEY (cod_ferramenta)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
CREATE TABLE almoxarifado.usuario_ferramenta (
	cod_usuario_ferramenta INT auto_increment NOT NULL,
	cod_usuario INT NOT NULL,
	cod_ferramenta INT NOT NULL,
	CONSTRAINT usuario_ferramenta_pk PRIMARY KEY (cod_usuario_ferramenta),
	CONSTRAINT usuario_ferramenta_tb_usuario_FK FOREIGN KEY (cod_usuario) REFERENCES almoxarifado.tb_usuario(cod_usuario) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT usuario_ferramenta_tb_ferramentas_FK FOREIGN KEY (cod_ferramenta) REFERENCES almoxarifado.tb_ferramentas(cod_ferramenta) ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
