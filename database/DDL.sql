CREATE TABLE IF NOT EXISTS usuarios (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS categorias (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    nome_categoria VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS produtos (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    nome_produto VARCHAR(255) NOT NULL,
    preco NUMERIC(10, 2) NOT NULL,
    id_categoria INT NOT NULL,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_produtos_categoria FOREIGN KEY (id_categoria) 
    REFERENCES categorias(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS tamanhos (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    descricao VARCHAR(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS produto_tamanhos (
    id_produto INT NOT NULL,
    id_tamanho INT NOT NULL,
    estoque INT NOT NULL DEFAULT 0 CHECK (estoque >= 0),
    PRIMARY KEY (id_produto, id_tamanho),
    CONSTRAINT fk_pt_produto FOREIGN KEY (id_produto) 
        REFERENCES produtos(id) ON DELETE CASCADE,
    CONSTRAINT fk_pt_tamanho FOREIGN KEY (id_tamanho) 
        REFERENCES tamanhos(id) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS carrinho (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    produto VARCHAR(255) NOT NULL,
    preco NUMERIC(10, 2) NOT NULL,
    tamanho VARCHAR(10) NOT NULL,
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO categorias (nome_categoria) VALUES
('camisetas'), ('calças'), ('shorts'), ('agasalhos'), ('conjuntos'), ('acessorios');

INSERT INTO tamanhos (descricao) VALUES 
('PP'), ('P'), ('M'), ('G'), ('GG'), ('36'), ('37'), ('38'), ('39'), ('40');

INSERT INTO produtos (nome_produto, preco, id_categoria) VALUES 
('CORTEIZ C-STAR', 419.00, 2),
('CAMISETA CORTEIZ STAR', 299.00, 1),
('SHORT CORTEIZ ALCATRAZ', 449.00, 3),
('BONÉ TRUCKER CORTEIZ', 299.00, 6),
('CONJUNTO VELUDO CORTEIZ', 999.00, 5),
('JAQUETA NIKE X CORTEIZ', 819.00, 4);

INSERT INTO produto_tamanhos (id_produto, id_tamanho, estoque) VALUES
(1, 6, 1), (1, 10, 3), (2, 3, 3), (2, 2, 5),
(3, 6, 2), (4, 3, 2), (5, 3, 5), (5, 4, 4), (6, 4, 4), (6, 3, 3);