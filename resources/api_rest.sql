CREATE TABLE IF NOT EXISTS Setor (
    ID_setor INT AUTO_INCREMENT PRIMARY KEY
);

INSERT INTO Setor (ID_setor) VALUES (1), (2);

CREATE TABLE IF NOT EXISTS Responsavel (
    ID_responsavel INT AUTO_INCREMENT PRIMARY KEY,
    NOME VARCHAR(100) NOT NULL,
    EMAIL VARCHAR(255) NOT NULL,
    SENHA VARCHAR(255),
    ID_setor INT,
    FOREIGN KEY (ID_setor) REFERENCES Setor(ID_setor)
);

INSERT INTO Responsavel (ID_responsavel, NOME, EMAIL, SENHA, ID_setor) 
VALUES (1, 'Henrique Arroyo', 'henrique.arroyo@adm.com', '3232', 1), 
       (2, 'Eduardo Ananias', 'eduardo.ananias@adm.com', '2012', 2), 
       (3, 'Leonardo Vitalino', 'leonardo.vitalino@adm.com', '123', 2);

CREATE TABLE IF NOT EXISTS Sala (
    ID_sala INT AUTO_INCREMENT PRIMARY KEY,
    ID_setor INT,
    FOREIGN KEY (ID_setor) REFERENCES Setor(ID_setor)
);

INSERT INTO Sala (ID_sala, ID_setor) 
VALUES (1, 1), (2, 1), (3, 1), (4, 2), (5, 2), (6, 2);

CREATE TABLE IF NOT EXISTS Funcionario (
    ID_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    NOME VARCHAR(100) NOT NULL,
    EMAIL VARCHAR(255) NOT NULL,
    SENHA VARCHAR(255), 
    ID_responsavel INT,
    FOREIGN KEY (ID_responsavel) REFERENCES Responsavel(ID_responsavel),  
    ID_sala INT,
    FOREIGN KEY (ID_sala) REFERENCES Sala(ID_sala)
);

INSERT INTO Funcionario (NOME, EMAIL, SENHA, ID_responsavel, ID_sala)
VALUES ('Claudio', 'claudio@gmail.com', '1234', 1, 1);

CREATE TABLE IF NOT EXISTS Estoque (
    ID_estoque INT AUTO_INCREMENT PRIMARY KEY,
    item VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    ID_sala INT,
    FOREIGN KEY (ID_sala) REFERENCES Sala(ID_sala)
);

CREATE TABLE IF NOT EXISTS Patrimonio (
    codigo VARCHAR(100) PRIMARY KEY,
    item VARCHAR(100) NOT NULL,
    status VARCHAR(100) NOT NULL,
    ID_sala INT,
    FOREIGN KEY (ID_sala) REFERENCES Sala(ID_sala)
);
