create database db_pim;

use db_pim;

create table tipo_usuario(
  cd_tipo_usuario int not null AUTO_INCREMENT,
  nm_tipo_usuario varchar(60),
  constraint pk_tipo_usuario primary key(cd_tipo_usuario)
);

-- Tabela de Usuários
create table usuario(
    cd_usuario int not null AUTO_INCREMENT,
    nm_usuario varchar(60),
    nm_login varchar(60),
    nm_email varchar(250),
    ds_senha varchar(20),
    cd_tipo_usuario int(4) NOT NULL, -- Pode ser "Administrador" ou "Usuário Comum"
    constraint pk_usuario primary key(cd_usuario),
    constraint fk_usuario_tipo foreign key (cd_tipo_usuario) references tipo_usuario(cd_tipo_usuario)
);

-- Tabela de Clientes
CREATE TABLE tb_cliente (
    cd_cliente INT NOT NULL AUTO_INCREMENT,
    nm_cliente VARCHAR(50),
    nm_email VARCHAR(100),
    cd_telefone VARCHAR(20),
    ds_endereco VARCHAR(200),
    constraint pk_cliente primary key(cd_cliente)
);

-- Tabela de Produtos
CREATE TABLE tb_produto (
    cd_produto INT NOT NULL AUTO_INCREMENT,
    nm_produto VARCHAR(100),
    nm_categoria VARCHAR(50),
    dt_plantio DATE,
    dt_colheita DATE,
    qt_unidade INT,
    vl_unidade float,
    constraint pk_produto primary key(cd_produto)
);

-- Tabela de Vendas
CREATE TABLE tb_venda (
    cd_venda INT NOT NULL AUTO_INCREMENT,
    dt_venda DATE,
    hr_venda time,
    vl_total float,
    cd_cliente int,
    constraint pk_venda primary key(cd_venda),
    constraint fk_venda_cliente foreign key (cd_cliente) references tb_cliente(cd_cliente)
);

-- Tabela de ItensVenda (para registrar os produtos vendidos em cada venda)
CREATE TABLE tb_item_venda (
    cd_item INT NOT NULL AUTO_INCREMENT,
    qt_item INT,
    vl_unitario float,
    vl_total float,
    cd_produto int,
    cd_venda int,
    constraint pk_item primary key(cd_item),
    constraint fk_item_produto foreign key (cd_produto) references tb_produto(cd_produto),
    constraint fk_item_venda foreign key (cd_venda) references tb_venda(cd_venda)
);

show tables;

insert into tipo_usuario values (1,'administrador');
insert into tipo_usuario values (2,'usuário comum');

select * from tipo_usuario;

INSERT INTO usuario (nm_usuario, nm_login, nm_email, ds_senha, cd_tipo_usuario) VALUES
('Samuel Oliveira','SamuelOB','samuel_oliveirab@hotmail.com', AES_ENCRYPT('12345', 'bocal'), 1),
('Kauã Oliveira','kaua','kaua@gmail.com', AES_ENCRYPT('54321', 'bocal'), 2),
('Carlos Junior','junior','junior@gmail.com', AES_ENCRYPT('SENHA', 'bocal'), 2);

select * from usuario;

INSERT INTO tb_cliente (nm_cliente, nm_email, cd_telefone, ds_endereco) VALUES
('Alice', 'alice@example.com', '123456789', '123 Main St, Cityville'),
('Bob', 'bob@example.com', '987654321', '456 Oak St, Townsville'),
('Charlie', 'charlie@example.com', '555123456', '789 Pine St, Villagetown');

select * from tb_cliente;

INSERT INTO tb_produto (nm_produto, nm_categoria, dt_plantio, dt_colheita, qt_unidade, vl_unidade) VALUES
('Tomate', 'Vegetal', '2024-01-01', '2024-03-01', 100, 1.50),
('Alface', 'Vegetal', '2024-01-15', '2024-02-28', 200, 0.75),
('Cenoura', 'Vegetal', '2024-02-01', '2024-05-01', 150, 1.00);

select * from tb_produto;

INSERT INTO tb_venda (dt_venda, hr_venda, vl_total, cd_cliente) VALUES
('2024-05-01', '10:00:00', 150.00, 1),
('2024-05-02', '14:30:00', 75.00, 2),
('2024-05-03', '09:15:00', 50.00, 3);

select * from tb_venda;

INSERT INTO tb_item_venda (qt_item, vl_unitario, vl_total, cd_produto, cd_venda) VALUES
(50, 1.50, 75.00, 1, 1),
(100, 0.75, 75.00, 1, 2),
(50, 1.00, 50.00, 2, 3),
(20, 1.50, 30.00, 2, 1),
(50, 0.75, 37.50, 3, 2),
(12, 1.00, 12.00, 3, 3);

select * from tb_item_venda;