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
INSERT INTO immagini_categorie(immagini_categorie.path_immagine, immagini_categorie.id_categoria) VALUES 
	('divano.jpg', 1),
	('letto.jpg', 2),
	('illuminazione.jpg', 3),
	('tavolo.jpg', 4),
	('sedie.jpg', 5),
	('armadio.jpg', 6),
	('poltrona.jpg', 7),
	('credenza.jpeg', 8),
	('libreria.jpg', 9),
	('scaffali.jpg', 10),
	('cassettiera.jpg', 11),
	('mobili_bagno.jpg', 12),
	('mobili_giardino.jpg', 13);
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
INSERT INTO ruolo(ruolo) VALUES ('USER'), ('ADMIN'), ('DELETED');
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

/*
INSERT INTO utente (nome, cognome, id_ruolo) VALUES ('Jacopo', 'Corbani', 2);
INSERT INTO credenziali (nome_utente, password_utente, id_utente) VALUES ('jacopocorbani', '$2y$10$EmSbNtztnB7zmUD3ijYob.cq8h5sQbbtZInA1DzWSZYUw.ctKMhv2', 1);
*/