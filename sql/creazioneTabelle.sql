CREATE DATABASE if NOT EXISTS ecommerce_mobili;
USE ecommerce_mobili;
/*
CATEGORIA(PK: ID; CATEGORIA)
PRODOTTI(PK: ID; NOME; DESCRIZIONE; PREZZO; FK: ID_CATEGORIA, FK: ID_PRODOTTO)
IMMAGINI_PRODOTTI(PK: ID; PATH; FK: ID_PRODOTTO)
IMMAGINI_CATEGORIE(PK: ID; PATH; FK: ID_CATEGORIA)
*/
CREATE TABLE if NOT EXISTS categoria(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	categoria VARCHAR(30) NOT NULL
);
INSERT INTO categoria(categoria.categoria) VALUES
	('Divani'),
	('Letti'),
	('Illuminazione'),
	('Tavoli'),
	('Sedie'),
	('Armadi'),
	('Poltrone'),
	('Credenze'),
	('Librerie'),
	('Scaffali'),
	('Cassettiere'),
	('Mobili per il bagno'),
	('Mobili per il giardino');
	
CREATE TABLE if NOT EXISTS prodotti(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(20) NOT NULL,
	descrizione VARCHAR(250) NOT NULL,
	prezzo DOUBLE NOT NULL,
	id_categoria INT NOT NULL,
	id_prodotto INT,
	FOREIGN KEY (id_categoria) REFERENCES categoria(id),
	FOREIGN KEY (id_prodotto) REFERENCES prodotti(id)

);
CREATE TABLE if NOT EXISTS immagini_prodotti(
	id INT PRIMARY KEY AUTO_INCREMENT,
	path_immagine VARCHAR(255) NOT NULL,
	id_prodotti INT NOT NULL,
	
	FOREIGN KEY (id_prodotti) REFERENCES prodotti(id)
);
CREATE TABLE if NOT EXISTS immagini_categorie(
	id INT PRIMARY KEY AUTO_INCREMENT,
	path_immagine VARCHAR(255) NOT NULL,
	id_categoria INT NOT NULL,
	
	FOREIGN KEY (id_categoria) REFERENCES categoria(id)
);
/*
RUOLO(PK: ID; RUOLO)
UTENTE(PK: ID; NOME; COGNOME; FK: ID_RUOLO)
INDIRIZZI(PK: ID; VIA; CITTA'; STATO; FK: ID_UTENTE)
CREDENZIALI(PK: ID; NOME_UTENTE; PASSWORD; FK: ID_UTENTE)
*/
CREATE TABLE if NOT EXISTS ruolo(
	id INT PRIMARY KEY AUTO_INCREMENT,
	ruolo VARCHAR(20) NOT NULL
);
CREATE TABLE if NOT EXISTS utente(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(50) NOT NULL,
	cognome VARCHAR(50) NOT NULL,
	id_ruolo INT NOT NULL,
	
	FOREIGN KEY (id_ruolo) REFERENCES ruolo(id)
);
CREATE TABLE if NOT EXISTS indirizzi(
	id INT PRIMARY KEY AUTO_INCREMENT,
	via VARCHAR(50) NOT NULL,
	citta VARCHAR(50) NOT NULL,
	stato VARCHAR(50) NOT NULL,
	id_utente INT NOT NULL,
	
	FOREIGN KEY (id_utente) REFERENCES utente(id)	
);
CREATE TABLE if NOT EXISTS credenziali(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome_utente VARCHAR(50) NOT NULL UNIQUE,
	password_utente VARCHAR(60) NOT NULL,
	id_utente INT NOT NULL,
	
	FOREIGN KEY (id_utente) REFERENCES utente(id)
);
/*
CARRELLO(PK:ID; FK: ID_UTENTE)
DETTAGLIO_CARRELLO(PK: ID; FK: ID_PRODOTTO; QUANTITA'_PRODOTTO; FK: CARRELLO)
*/
CREATE TABLE if NOT EXISTS carrello(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_utente INT NOT NULL,
	
	FOREIGN KEY (id_utente) REFERENCES utente(id)
);
CREATE TABLE if NOT EXISTS dettaglio_carrello(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_carrello INT NOT NULL,
	id_prodotto INT NOT NULL,
	quantita_prodotto INT NOT NULL,

	FOREIGN KEY (id_prodotto) REFERENCES prodotti(id),
	FOREIGN KEY (id_carrello) REFERENCES carrello(id)
);
/*
STUTUS(PK:ID; STATUS)
ORDINE(PK:ID; FK: ID_UTENTE; FK: ID_STATUS)
DETTAGLIO_ORDINE(PK: ID; FK: ID_PRODOTTO; QUANTITA'_PRODOTTO; FK: ORDINE)
*/
CREATE TABLE if NOT EXISTS status_ordine(
	id INT AUTO_INCREMENT PRIMARY KEY,
	status_ordine VARCHAR(20) NOT NULL 
);
CREATE TABLE if NOT EXISTS ordine(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_utente INT NOT NULL,
	id_status INT NOT NULL,
	
	FOREIGN KEY (id_utente) REFERENCES utente(id),
	FOREIGN KEY (id_status) REFERENCES status_ordine(id)
);
CREATE TABLE if NOT EXISTS dettaglio_ordine(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_prodotto INT NOT NULL,
	quantita_prodotto INT NOT NULL,
	id_ordine INT NOT NULL,
	
	FOREIGN KEY (id_prodotto) REFERENCES prodotti(id),
	FOREIGN KEY (id_ordine) REFERENCES ordine(id)
);