-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.28-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database ecommerce_mobili
CREATE DATABASE IF NOT EXISTS `ecommerce_mobili` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ecommerce_mobili`;

-- Dump della struttura di tabella ecommerce_mobili.carrello
CREATE TABLE IF NOT EXISTS `carrello` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utente` (`id_utente`),
  CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.credenziali
CREATE TABLE IF NOT EXISTS `credenziali` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_utente` varchar(50) NOT NULL,
  `password_utente` varchar(60) NOT NULL,
  `id_utente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_utente` (`nome_utente`),
  KEY `id_utente` (`id_utente`),
  CONSTRAINT `credenziali_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.dettaglio_carrello
CREATE TABLE IF NOT EXISTS `dettaglio_carrello` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_carrello` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `quantita_prodotto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_prodotto` (`id_prodotto`),
  KEY `id_carrello` (`id_carrello`),
  CONSTRAINT `dettaglio_carrello_ibfk_1` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`),
  CONSTRAINT `dettaglio_carrello_ibfk_2` FOREIGN KEY (`id_carrello`) REFERENCES `carrello` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.dettaglio_ordine
CREATE TABLE IF NOT EXISTS `dettaglio_ordine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodotto` int(11) NOT NULL,
  `quantita_prodotto` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_prodotto` (`id_prodotto`),
  KEY `id_ordine` (`id_ordine`),
  CONSTRAINT `dettaglio_ordine_ibfk_1` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`),
  CONSTRAINT `dettaglio_ordine_ibfk_2` FOREIGN KEY (`id_ordine`) REFERENCES `ordine` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.immagini_categorie
CREATE TABLE IF NOT EXISTS `immagini_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path_immagine` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `immagini_categorie_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.immagini_prodotti
CREATE TABLE IF NOT EXISTS `immagini_prodotti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path_immagine` varchar(255) NOT NULL,
  `id_prodotti` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_prodotti` (`id_prodotti`),
  CONSTRAINT `immagini_prodotti_ibfk_1` FOREIGN KEY (`id_prodotti`) REFERENCES `prodotti` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.indirizzi
CREATE TABLE IF NOT EXISTS `indirizzi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `via` varchar(50) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `stato` varchar(50) NOT NULL,
  `id_utente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utente` (`id_utente`),
  CONSTRAINT `indirizzi_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.ordine
CREATE TABLE IF NOT EXISTS `ordine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utente` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utente` (`id_utente`),
  KEY `id_status` (`id_status`),
  CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`),
  CONSTRAINT `ordine_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status_ordine` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.prodotti
CREATE TABLE IF NOT EXISTS `prodotti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `descrizione` varchar(250) DEFAULT NULL,
  `prezzo` double NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_prodotto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_prodotto` (`id_prodotto`),
  CONSTRAINT `prodotti_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  CONSTRAINT `prodotti_ibfk_2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1274 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.ruolo
CREATE TABLE IF NOT EXISTS `ruolo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruolo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.status_ordine
CREATE TABLE IF NOT EXISTS `status_ordine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_ordine` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

-- Dump della struttura di tabella ecommerce_mobili.utente
CREATE TABLE IF NOT EXISTS `utente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `id_ruolo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ruolo` (`id_ruolo`),
  CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`id_ruolo`) REFERENCES `ruolo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- L’esportazione dei dati non era selezionata.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
