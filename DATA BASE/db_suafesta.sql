-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.

DROP DATABASE IF EXISTS bd_suafesta;

CREATE DATABASE bd_suafesta;

USE bd_suafesta;

CREATE TABLE tb_chat (
id_chat INTEGER(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
te_assunto VARCHAR(50),
dt_data VARCHAR(10),
id_usuario INTEGER(5) NOT NULL
);

CREATE TABLE tb_msg (
id_msg INTEGER(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
te_msgDe VARCHAR(50),
te_msgPara VARCHAR(50),
te_msg TEXT(1000),
dt_data VARCHAR(10),
hr_hora VARCHAR(10),
id_chat INTEGER(5) NOT NULL,
FOREIGN KEY(id_chat) REFERENCES tb_chat (id_chat)
);

CREATE TABLE tb_festa (
id_festa INTEGER(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nm_festa VARCHAR(45),
nm_aniversariante VARCHAR(50),
dt_dataFesta VARCHAR(10),
hr_horaFesta VARCHAR(10),
nm_cidade VARCHAR(50),
nm_bairro VARCHAR(50),
te_logradouro VARCHAR(50),
nu_numero VARCHAR(6),
img_perfil LONGBLOB,
id_usuario INTEGER(5) NOT NULL
);

CREATE TABLE tb_servicosUsuarios (
id_servicosUsuarios INTEGER(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nm_servico VARCHAR(45) NOT NULL,
id_usuario INTEGER(5) NOT NULL
);

CREATE TABLE tb_usuario (
id_usuario INTEGER(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nm_usuario VARCHAR(100) NOT NULL,
te_email VARCHAR(50) NOT NULL,
pw_senha VARCHAR(50) NOT NULL,
fn_usuario VARCHAR(15),
nm_empresa VARCHAR(50),
te_descricao TEXT(1000),
nm_cidade VARCHAR(30) NOT NULL,
nm_bairro VARCHAR(50),
te_logradouro VARCHAR(50),
nu_numero VARCHAR(6),
tp_user VARCHAR(20) NOT NULL,
img_logo LONGBLOB,
img_foto4 LONGBLOB,
img_foto3 LONGBLOB,
img_foto2 LONGBLOB,
img_foto1 LONGBLOB
);

CREATE TABLE tb_festasServicos (
id_usuario INTEGER(5) NOT NULL,
id_festa INTEGER(5) NOT NULL,
FOREIGN KEY(id_usuario) REFERENCES tb_usuario (id_usuario),
FOREIGN KEY(id_festa) REFERENCES tb_festa (id_festa)
);

ALTER TABLE tb_chat ADD FOREIGN KEY(id_usuario) REFERENCES tb_usuario (id_usuario);
ALTER TABLE tb_festa ADD FOREIGN KEY(id_usuario) REFERENCES tb_usuario (id_usuario);
ALTER TABLE tb_servicosUsuarios ADD FOREIGN KEY(id_usuario) REFERENCES tb_usuario (id_usuario);