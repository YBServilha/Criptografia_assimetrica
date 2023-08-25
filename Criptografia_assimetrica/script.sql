create database atv_criptografia_yan_danilo;

use atv_criptografia_yan_danilo;

create table adm(
    id int not null auto_increment,
    email varchar(100) not null,
    senha varchar(100) not null,
    primary key(id)
);

create table chaves(
    id INT(11) NOT NULL AUTO_INCREMENT,
    key_public VARCHAR(12) NOT NULL,
    key_private VARCHAR(12) NOT NULL,
    primary key(id)
);

create table mensagens(
    id int not null auto_increment,
    codnome varchar(100) not null,
    mensagem varchar(100) not null,
    primary key(id)
);

insert into adm(email, senha) values('adm@gmail.com', 123);