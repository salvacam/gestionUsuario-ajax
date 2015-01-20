create database bd2015 default character set utf8 collate utf8_unicode_ci;
grant all on bd2015.* to u2015@localhost identified by 'clave2015';
flush privileges;

use bd2015;

create table usuario (
  login varchar(30) not null primary key,
  clave varchar(40) not null,
  nombre varchar(30) not null,
  apellidos varchar(60) not null,
  email varchar(40) not null,
  fechaalta date not null,
  isactivo tinyint(1) not null default 0,
  isroot tinyint(1) not null default 0,
  rol enum('administrador','usuario') not null default 'usuario',
  fechalogin datetime
) engine=innodb charset=utf8 collate=utf8_unicode_ci;