-- CREATE TABLE usuarios (
--     id SERIAL PRIMARY KEY,
--     nome VARCHAR(100),
--     email VARCHAR(100),
--     nascimento DATE,
--     senha VARCHAR(100)
-- );

-- CREATE TABLE livros (
--     id SERIAL PRIMARY KEY,
--     titulo VARCHAR(150),
--     autor VARCHAR(100),
--     genero VARCHAR(50),
--     ano INT,
--     disponivel BOOLEAN
-- );

-- CREATE TABLE emprestimos (
--     id SERIAL PRIMARY KEY,
--     usuario_id INT,
--     livro_id INT,
--     data_emprestimo DATE,
--     data_devolucao DATE,
--     multa DECIMAL(10,2),

--     FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
--     FOREIGN KEY (livro_id) REFERENCES livros(id)
-- );

-- SELECT * FROM emprestimos;
