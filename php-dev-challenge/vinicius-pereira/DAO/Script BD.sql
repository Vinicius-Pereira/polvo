CREATE DATABASE testepolvo;

USE testepolvo;

CREATE TABLE IF NOT EXISTS Produto (
id_produto INT AUTO_INCREMENT NOT NULL,
sku VARCHAR(10) NOT NULL,
nome VARCHAR(50) NOT NULL,
descricao VARCHAR(100),
preco DOUBLE NOT NULL,
PRIMARY KEY (id_produto)
)engine=InnoDB;

CREATE TABLE IF NOT EXISTS Pedido (
id_pedido INT AUTO_INCREMENT NOT NULL,
total DOUBLE NOT NULL,
data_pedido DATE NOT NULL,
PRIMARY KEY (id_pedido)
)engine=InnoDB;

CREATE TABLE IF NOT EXISTS Produto_Pedido (
id_pedido INT NOT NULL,
id_produto INT NOT NULL,
PRIMARY KEY (id_pedido, id_produto),
CONSTRAINT fk_pedido FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido) ON DELETE CASCADE,
CONSTRAINT fk_pedido FOREIGN KEY (id_produto) REFERENCES produto(id_produto) ON DELETE NO ACTION
)engine=InnoDB;
