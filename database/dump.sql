--
-- PostgreSQL database dump
--

\restrict qgTRyidNjlU2Jj3T7GpLh3KeWpxAXNCd1va5e5OjGB7hfcakuxXoVHIac65Sj7u

-- Dumped from database version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: biblioteca_user
--

CREATE TABLE public.admin (
    id integer NOT NULL,
    nome character varying(100),
    email character varying(100),
    senha character varying(100)
);


ALTER TABLE public.admin OWNER TO biblioteca_user;

--
-- Name: admin_id_seq; Type: SEQUENCE; Schema: public; Owner: biblioteca_user
--

CREATE SEQUENCE public.admin_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.admin_id_seq OWNER TO biblioteca_user;

--
-- Name: admin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: biblioteca_user
--

ALTER SEQUENCE public.admin_id_seq OWNED BY public.admin.id;


--
-- Name: emprestimos; Type: TABLE; Schema: public; Owner: biblioteca_user
--

CREATE TABLE public.emprestimos (
    id integer NOT NULL,
    usuario_id integer,
    livro_id integer,
    data_emprestimo date,
    data_devolucao date,
    multa numeric(10,2)
);


ALTER TABLE public.emprestimos OWNER TO biblioteca_user;

--
-- Name: emprestimos_id_seq; Type: SEQUENCE; Schema: public; Owner: biblioteca_user
--

CREATE SEQUENCE public.emprestimos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.emprestimos_id_seq OWNER TO biblioteca_user;

--
-- Name: emprestimos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: biblioteca_user
--

ALTER SEQUENCE public.emprestimos_id_seq OWNED BY public.emprestimos.id;


--
-- Name: livros; Type: TABLE; Schema: public; Owner: biblioteca_user
--

CREATE TABLE public.livros (
    id integer NOT NULL,
    titulo character varying(150),
    autor character varying(100),
    genero character varying(50),
    ano integer,
    disponivel boolean,
    quantidade integer DEFAULT 1
);


ALTER TABLE public.livros OWNER TO biblioteca_user;

--
-- Name: livros_id_seq; Type: SEQUENCE; Schema: public; Owner: biblioteca_user
--

CREATE SEQUENCE public.livros_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.livros_id_seq OWNER TO biblioteca_user;

--
-- Name: livros_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: biblioteca_user
--

ALTER SEQUENCE public.livros_id_seq OWNED BY public.livros.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: biblioteca_user
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nome character varying(100),
    email character varying(100),
    nascimento date,
    senha character varying(100)
);


ALTER TABLE public.usuarios OWNER TO biblioteca_user;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: biblioteca_user
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO biblioteca_user;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: biblioteca_user
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- Name: admin id; Type: DEFAULT; Schema: public; Owner: biblioteca_user
--

ALTER TABLE ONLY public.admin ALTER COLUMN id SET DEFAULT nextval('public.admin_id_seq'::regclass);


--
-- Name: emprestimos id; Type: DEFAULT; Schema: public; Owner: biblioteca_user
--

ALTER TABLE ONLY public.emprestimos ALTER COLUMN id SET DEFAULT nextval('public.emprestimos_id_seq'::regclass);


--
-- Name: livros id; Type: DEFAULT; Schema: public; Owner: biblioteca_user
--

ALTER TABLE ONLY public.livros ALTER COLUMN id SET DEFAULT nextval('public.livros_id_seq'::regclass);


--
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: biblioteca_user
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: biblioteca_user
--

COPY public.admin (id, nome, email, senha) FROM stdin;
1	Administrador	admin@gmail.com	123456
\.


--
-- Data for Name: emprestimos; Type: TABLE DATA; Schema: public; Owner: biblioteca_user
--

COPY public.emprestimos (id, usuario_id, livro_id, data_emprestimo, data_devolucao, multa) FROM stdin;
1	23	5	2026-10-20	\N	\N
\.


--
-- Data for Name: livros; Type: TABLE DATA; Schema: public; Owner: biblioteca_user
--

COPY public.livros (id, titulo, autor, genero, ano, disponivel, quantidade) FROM stdin;
10	Para Todos os Garotos que Já Amei	Jenny Han	Romance	2014	t	3
12	Com Amor, Simon	Becky Albertalli	Romance	2015	t	4
14	A Probabilidade Estatística do Amor à Primeira Vista	Jennifer E. Smith	Romance	2011	t	2
15	O Príncipe Cruel	Holly Black	Fantasia	2018	t	7
16	Caraval	Stephanie Garber	Fantasia	2017	t	4
17	O Ladrão de Raios	Rick Riordan	Fantasia	2005	t	9
18	As Crônicas de Nárnia	C. S. Lewis	Fantasia	1950	t	2
1	Jantar Secreto	Raphael Montes	Suspense	2016	t	9
3	E Não Sobrou Nenhum	Agatha Christie	Mistério	1939	t	5
2	Um de Nós Está Mentindo	Karen M. McManus	Mistério	2017	t	7
13	Amor & Gelato	Jenna Evans Welch	Romance	2016	t	9
6	A Good Girl's Guide to Murder	Holly Jackson	Mistério	2019	t	11
19	Harry Potter e a Pedra Filosofal	J. K. Rowling	Fantasia	1997	\N	10
4	Imperfeitos	Christina Lauren	Romance	2022	t	5
11	P.S.: Ainda Amo Você	Jenny Han	Romance	2015	t	8
9	Dois Podem Guardar um Segredo	Karen M. McManus	Mistério	2019	t	0
7	Os Dois Morrem no Final	Adam Silvera	Romance	2017	t	3
5	Melhor que nos Filmes	Lynn Painter	Romance	2021	t	3
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: biblioteca_user
--

COPY public.usuarios (id, nome, email, nascimento, senha) FROM stdin;
10	Isabela Zamai	Zamai@zamai.com.br	2026-10-06	123456
11	Gabi	Gabi@gabi.com	2026-10-06	123456
12	Julia Batagin	jubataginsou@gmail.com	2010-03-21	21032010
13	Zamai	Zamai@gmail.com.br	2010-03-08	123456
14	Gabi	gabi@gmail.com	2026-10-08	123456
15	seila	seila@gmail.com	2026-10-08	123456
16	Cauê Pícoli Andréo da Silva	caue.p.silva@edu.senai.br	2005-06-15	123
17	Elis 	elis.perin6@gmail.com	2009-11-19	1234
18	ELOÁ MUNIZ	eloa.muniz@gmail	2026-10-08	123
19	Catarina Costa	catarinacostta.maria@gmail.com	2010-02-27	CatAmaJu
20	Pietra	pietra@hotmail.com	2010-04-01	1234
21	yuri	yuri@hotmail.com	2010-04-01	1234
22	Mayara	mayara@gmail.com	2009-08-04	123456
23	azaazaz	admin@gmail.com	2026-10-06	123456
\.


--
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: biblioteca_user
--

SELECT pg_catalog.setval('public.admin_id_seq', 1, true);


--
-- Name: emprestimos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: biblioteca_user
--

SELECT pg_catalog.setval('public.emprestimos_id_seq', 1, true);


--
-- Name: livros_id_seq; Type: SEQUENCE SET; Schema: public; Owner: biblioteca_user
--

SELECT pg_catalog.setval('public.livros_id_seq', 19, true);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: biblioteca_user
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 23, true);


--
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: biblioteca_user
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id);


--
-- Name: emprestimos emprestimos_pkey; Type: CONSTRAINT; Schema: public; Owner: biblioteca_user
--

ALTER TABLE ONLY public.emprestimos
    ADD CONSTRAINT emprestimos_pkey PRIMARY KEY (id);


--
-- Name: livros livros_pkey; Type: CONSTRAINT; Schema: public; Owner: biblioteca_user
--

ALTER TABLE ONLY public.livros
    ADD CONSTRAINT livros_pkey PRIMARY KEY (id);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: biblioteca_user
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: emprestimos emprestimos_livro_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: biblioteca_user
--

ALTER TABLE ONLY public.emprestimos
    ADD CONSTRAINT emprestimos_livro_id_fkey FOREIGN KEY (livro_id) REFERENCES public.livros(id);


--
-- Name: emprestimos emprestimos_usuario_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: biblioteca_user
--

ALTER TABLE ONLY public.emprestimos
    ADD CONSTRAINT emprestimos_usuario_id_fkey FOREIGN KEY (usuario_id) REFERENCES public.usuarios(id);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: pg_database_owner
--

GRANT ALL ON SCHEMA public TO biblioteca_user;


--
-- PostgreSQL database dump complete
--

\unrestrict qgTRyidNjlU2Jj3T7GpLh3KeWpxAXNCd1va5e5OjGB7hfcakuxXoVHIac65Sj7u

