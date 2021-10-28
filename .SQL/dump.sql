--
-- PostgreSQL database dump
--

-- Dumped from database version 10.18
-- Dumped by pg_dump version 10.18

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- Name: products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    price character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.products OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.products_id_seq OWNER TO postgres;

--
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    dob character varying(255) NOT NULL,
    picture character varying(255),
    role character varying
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: products id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2021_08_03_112134_create_products_table	1
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (id, name, description, price, created_at, updated_at) FROM stdin;
46	Apple	Iphone 13 Pro Max	322000	2021-10-28 07:04:08	2021-10-28 07:08:54
47	Apple	Iphone 13 Pro	270000	2021-10-28 07:04:22	2021-10-28 07:09:30
48	Oppo	Reno 6	85000	2021-10-28 07:09:43	2021-10-28 07:09:53
50	Xiaomi	Redmi Note 8	28000	2021-10-28 07:14:01	2021-10-28 07:14:01
49	Oppo	Reno 6	65000	2021-10-28 07:09:53	2021-10-28 07:15:05
51	Oppo	Reno 6	85000	2021-10-28 07:15:05	2021-10-28 07:15:15
53	Oppo	Reno 6	65000	2021-10-28 07:15:26	2021-10-28 07:15:26
52	Oppo	Reno 6	65000	2021-10-28 07:15:15	2021-10-28 07:15:26
54	Samsung	Galaxy S21 Ultra	200000	2021-10-28 07:24:49	2021-10-28 07:24:49
45	Samsung	Galaxy S21 Ultra	220000	2021-10-28 07:03:15	2021-10-28 07:26:22
55	Samsung	Galaxy s20 Smartphone	250000	2021-10-28 07:47:49	2021-10-28 07:47:49
56	Apple	Iphone 13 Pro Max	32000	2021-10-28 09:21:39	2021-10-28 09:21:39
57	Samsung asdafgad	Galaxy S21 Ultra	220000	2021-10-28 09:26:51	2021-10-28 09:26:51
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, password, remember_token, created_at, updated_at, dob, picture, role) FROM stdin;
9	Asim	asim@nextgeni.com	$2y$10$sz2hDk.Pa4ah15TavW6QoupHTqoVUaoaTrqIldzljsuGufHfblQOy	qGvHKzl6YxtJPTeY0ttTDbTheRhs23WD62MKeyue2ChEBBPRTRNutsXoMZok	2021-10-21 11:24:19	2021-10-21 11:24:19	2021-08-24	2_1634815459.jpg	nuser
1	Uzair Asghar	uzairasghar83@gmail.com	$2y$10$1C4/qh13V2bzx536MWM94.owzmQFStmJ8h9Ajp64i.erWrgHQwNPO	FYBmmOlcIOsLT44iyptGgReSXqeTJLoqeaLbOAnNr5mVUeKk9X47o4DxXBkK	2021-10-20 13:44:57	2021-10-20 13:44:58	1996-03-08	mypp_1634737497.jpg	admin
8	Osama	osama@gmail.com	$2y$10$UQpXlm8WRvJoGWgqGEI2uuzsMb0YwrK.AnBXayjD5JhlWlsURINze	9yJog6C3PPdOd7NKwSstyve4MlU5sOgQUZkfOONL341aY0H6zsoX9qlTqRwB	2021-10-21 10:11:48	2021-10-21 10:11:48	2021-09-29	user1_1634811108.jpg	nuser
\.


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 3, true);


--
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_id_seq', 57, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 9, true);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: products products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- PostgreSQL database dump complete
--

