CREATE DATABASE IF NOT EXISTS greensmiley;

USE greensmiley;

CREATE TABLE usuarios (
	id INT AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    PRIMARY KEY (id)
);	

CREATE TABLE categorias (
	id INT AUTO_INCREMENT,
    nome_categoria VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE produtos (
	id INT AUTO_INCREMENT,
    nome_produto VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2),
    id_categoria INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);

CREATE TABLE tamanhos (
	id INT AUTO_INCREMENT,
    descricao VARCHAR(255),
    PRIMARY KEY (id)
);

CREATE TABLE produto_tamanhos (
	id_produto INT,
    id_tamanho INT,
    estoque INT,
    PRIMARY KEY (id_produto, id_tamanho),
    FOREIGN KEY (id_produto) REFERENCES produtos(id),
    FOREIGN KEY (id_tamanho) REFERENCES tamanhos(id)
);

CREATE TABLE carrinho(
	id INT AUTO_INCREMENT,
    produto VARCHAR(255),
    preco VARCHAR(255),
    tamanho VARCHAR(3),
    PRIMARY KEY (id)
);

INSERT INTO produtos (nome_produto, preco, id_categoria) VALUES 
('CORTEIZ C-STAR', 419.00, 2),
('CAMISETA CORTEIZ STAR', 299.00, 1),
('SHORT CORTEIZ ALCATRAZ', 449.00, 3),
('BONÉ TRUCKER CORTEIZ', 299.00, 6),
('CONJUNTO VELUDO CORTEIZ', 999.00, 5),
('JAQUETA NIKE X CORTEIZ', 819.00, 4);

INSERT INTO categorias (nome_categoria) VALUES
('camisetas'),
('calças'),
('shorts'),
('agasalhos'),
('conjuntos'),
('acessorios');

INSERT INTO tamanhos (descricao) VALUES 
('PP'),
('P'),
('M'),
('G'),
('GG'),
('36'),
('37'),
('38'),
('39'),
('40');

INSERT INTO produto_tamanhos (id_produto, id_tamanho, estoque) VALUES
(1, 6, 1),
(1, 10, 3),
(2, 3, 3),
(2, 2, 5),
(3, 6, 2),
(4, 3, 2),
(5, 3, 5),
(5, 4, 4),
(6, 4, 4),
(6, 3, 3);