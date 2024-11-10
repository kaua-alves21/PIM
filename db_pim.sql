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
CREATE TABLE Clientes (
    ID INT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Telefone VARCHAR(20),
    Endereco VARCHAR(200),
    PRIMARY KEY (ID)
);

-- Tabela de Produtos
CREATE TABLE Produtos (
    ID INT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    Categoria VARCHAR(50),
    DataPlantio DATE,
    DataColheita DATE,
    Quantidade INT,
    PrecoUnitario DECIMAL(10,2),
    PRIMARY KEY (ID)
);

-- Tabela de Vendas
CREATE TABLE Vendas (
    ID INT NOT NULL AUTO_INCREMENT,
    ClienteID INT,
    DataVenda DATETIME,
    ValorTotal DECIMAL(10,2),
    PRIMARY KEY (ID),
    FOREIGN KEY (ClienteID) REFERENCES Clientes(ID)
);

-- Tabela de ItensVenda (para registrar os produtos vendidos em cada venda)
CREATE TABLE ItensVenda (
    ID INT NOT NULL AUTO_INCREMENT,
    VendaID INT,
    ProdutoID INT,
    Quantidade INT,
    ValorUnitario DECIMAL(10,2),
    ValorTotal DECIMAL(10,2),
    PRIMARY KEY (ID),
    FOREIGN KEY (VendaID) REFERENCES Vendas(ID),
    FOREIGN KEY (ProdutoID) REFERENCES Produtos(ID)
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

INSERT INTO Clientes (Nome, Email, Telefone, Endereco) VALUES
('Alice', 'alice@example.com', '123456789', '123 Main St, Cityville'),
('Bob', 'bob@example.com', '987654321', '456 Oak St, Townsville'),
('Charlie', 'charlie@example.com', '555123456', '789 Pine St, Villagetown');

select * from Clientes;

INSERT INTO Produtos (Nome, Categoria, DataPlantio, DataColheita, Quantidade, PrecoUnitario) VALUES
('Tomate', 'Vegetal', '2024-01-01', '2024-03-01', 100, 1.50),
('Alface', 'Vegetal', '2024-01-15', '2024-02-28', 200, 0.75),
('Cenoura', 'Vegetal', '2024-02-01', '2024-05-01', 150, 1.00);

select * from Produtos;

INSERT INTO Vendas (ClienteID, DataVenda, ValorTotal) VALUES
(1, '2024-05-01 10:00:00', 150.00),
(2, '2024-05-02 14:30:00', 75.00),
(3, '2024-05-03 09:15:00', 50.00);

select * from Vendas;

INSERT INTO ItensVenda (VendaID, ProdutoID, Quantidade, ValorUnitario, ValorTotal) VALUES
(1, 1, 50, 1.50, 75.00),
(1, 2, 100, 0.75, 75.00),
(2, 3, 50, 1.00, 50.00),
(2, 1, 20, 1.50, 30.00),
(3, 2, 50, 0.75, 37.50),
(3, 3, 12, 1.00, 12.00);

select * from ItensVenda;