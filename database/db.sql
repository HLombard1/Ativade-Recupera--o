create database loja_brinquedos;
use loja_brinquedos;

create table brinquedos(
    id int auto_increment primary key,
    nome varchar(100) not null,
    categoria enum('plastico','pano','maleavel'),
    faixa_etaria enum('1-5','6-7','8-12');
    preco int auto_increment not null;
    quantidade_estoque int auto_increment not null;

);
