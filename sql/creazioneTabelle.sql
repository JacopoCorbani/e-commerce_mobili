CREATE DATABASE if NOT EXISTS ecommerce_mobili;
USE ecommerce_mobili;
/*
CATEGORIA(PK: ID; CATEGORIA)
PRODOTTI(PK: ID; NOME; DESCRIZIONE; PREZZO; FK: ID_CATEGORIA)
ACCESSORI(PK: ID; DESCRIZIONE; PREZZO; FK: ID:PRODOTTO)
IMMAGINI(PK: ID; PATH; FK: ID_PRODOTTO)
*/
CREATE TABLE if NOT EXISTS categoria(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	categoria VARCHAR(20) NOT NULL
);
CREATE TABLE if NOT EXISTS prodotti(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(20) NOT NULL,
	descrizione VARCHAR(250) NOT NULL,
	prezzo DOUBLE NOT NULL,
	id_categoria INT NOT NULL,
		
	FOREIGN KEY (id_categoria) REFERENCES categoria(id)
);
CREATE TABLE if NOT EXISTS accessori(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(20) NOT NULL,
	descrizione VARCHAR(250) NOT NULL,
	prezzo DOUBLE NOT NULL,
	id_prodotto INT NOT NULL,
		
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
UTENTE(PK: ID; NOME; PASSWORD; FK: ID_RUOLO)
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
DETTAGLIO_CARRELLO_PRODOTTI(PK: ID; FK: ID_PRODOTTO; QUANTITA'_PRODOTTO; FK: CARRELLO)
DETTAGLIO_CARRELLO_ACCESSORI(PK: ID; FK: ID_ACCESSORIO; QUANTITA'_ACCESSORIO; FK: CARRELLO)
*/
CREATE TABLE if NOT EXISTS carrello(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_utente INT NOT NULL,
	FOREIGN KEY (id_utente) REFERENCES utente(id)
);
CREATE TABLE if NOT EXISTS dettaglio_carrello_prodotti(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_prodotto INT NOT NULL,
	quantita_prodotto INT NOT NULL,
	id_carrello INT NOT NULL,
	
	FOREIGN KEY (id_prodotto) REFERENCES prodotti(id),
	FOREIGN KEY (id_carrello) REFERENCES carrello(id)
);
CREATE TABLE if NOT EXISTS dettaglio_carrello_accessori(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_accessorio INT NOT NULL,
	quantita_accessorio INT NOT NULL,
	id_carrello INT NOT NULL,
	
	FOREIGN KEY (id_accessorio) REFERENCES accessori(id),
	FOREIGN KEY (id_carrello) REFERENCES carrello(id)
);
/*
STUTUS(PK:ID; STATUS)
ORDINE(PK:ID; FK: ID_UTENTE; FK: ID_STATUS)
DETTAGLIO_ORDINE_PRODOTTI(PK: ID; FK: ID_PRODOTTO; QUANTITA'_PRODOTTO; FK: ORDINE)
DETTAGLIO_ORDINE_ACCESSORI(PK: ID; FK: ID_ACCESSORIO; QUANTITA'_ACCESSORIO; FK: ORDINE)
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
CREATE TABLE if NOT EXISTS dettaglio_ordine_prodotti(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_prodotto INT NOT NULL,
	quantita_prodotto INT NOT NULL,
	id_ordine INT NOT NULL,
	
	FOREIGN KEY (id_prodotto) REFERENCES prodotti(id),
	FOREIGN KEY (id_ordine) REFERENCES ordine(id)
);
CREATE TABLE if NOT EXISTS dettaglio_ordine_accessori(
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_accessorio INT NOT NULL,
	quantita_accessorio INT NOT NULL,
	id_ordine INT NOT NULL,
	
	FOREIGN KEY (id_accessorio) REFERENCES accessori(id),
	FOREIGN KEY (id_ordine) REFERENCES ordine(id)
);