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

-- CREATE TABLE admin (
--     id SERIAL PRIMARY KEY,
--     nome VARCHAR(100),
--     email VARCHAR(100),
--     senha VARCHAR(100)
-- );

-- INSERT INTO admin (nome, email, senha)
-- VALUES ('Administrador', 'admin@gmail.com', '123456');


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

-- SELECT * FROM livros;

-- INSERT INTO livros (titulo, autor, genero, ano, disponivel)
-- VALUES
-- ('Jantar Secreto', 'Raphael Montes', 'Suspense', 2016, TRUE),
-- ('Um de Nós Está Mentindo', 'Karen M. McManus', 'Mistério', 2017, TRUE),
-- ('E Não Sobrou Nenhum', 'Agatha Christie', 'Mistério', 1939, TRUE),
-- ('Imperfeitos', 'Christina Lauren', 'Romance', 2022, TRUE),
-- ('Melhor que nos Filmes', 'Lynn Painter', 'Romance', 2021, TRUE),
-- ('A Good Girl''s Guide to Murder', 'Holly Jackson', 'Mistério', 2019, TRUE),
-- ('Os Dois Morrem no Final', 'Adam Silvera', 'Romance', 2017, TRUE),
-- ('Truly Devious', 'Maureen Johnson', 'Mistério', 2018, TRUE),
-- ('Dois Podem Guardar um Segredo', 'Karen M. McManus', 'Mistério', 2019, TRUE),
-- ('Para Todos os Garotos que Já Amei', 'Jenny Han', 'Romance', 2014, TRUE),
-- ('P.S.: Ainda Amo Você', 'Jenny Han', 'Romance', 2015, TRUE),
-- ('Com Amor, Simon', 'Becky Albertalli', 'Romance', 2015, TRUE),
-- ('Amor & Gelato', 'Jenna Evans Welch', 'Romance', 2016, TRUE),
-- ('A Probabilidade Estatística do Amor à Primeira Vista', 'Jennifer E. Smith', 'Romance', 2011, TRUE),
-- ('O Príncipe Cruel', 'Holly Black', 'Fantasia', 2018, TRUE),
-- ('Caraval', 'Stephanie Garber', 'Fantasia', 2017, TRUE),
-- ('O Ladrão de Raios', 'Rick Riordan', 'Fantasia', 2005, TRUE),
-- ('As Crônicas de Nárnia', 'C. S. Lewis', 'Fantasia', 1950, TRUE);

-- ALTER TABLE livros
-- ADD COLUMN quantidade INT DEFAULT 1;

-- UPDATE livros SET quantidade = 5 WHERE id = 1;
-- UPDATE livros SET quantidade = 3 WHERE id = 2;
-- UPDATE livros SET quantidade = 4 WHERE id = 3;
-- UPDATE livros SET quantidade = 2 WHERE id = 4;
-- UPDATE livros SET quantidade = 1 WHERE id = 5;

-- SELECT id, titulo, quantidade
-- FROM livros;

-- UPDATE livros
-- SET quantidade = 2
-- WHERE id = 18;