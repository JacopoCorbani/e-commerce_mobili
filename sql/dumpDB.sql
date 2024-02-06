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

-- Dump dei dati della tabella ecommerce_mobili.carrello: ~1 rows (circa)
INSERT INTO `carrello` (`id`, `id_utente`) VALUES
	(11, 1);

-- Dump della struttura di tabella ecommerce_mobili.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce_mobili.categoria: ~13 rows (circa)
INSERT INTO `categoria` (`id`, `categoria`) VALUES
	(1, 'Divani'),
	(2, 'Letti'),
	(3, 'Illuminazione'),
	(4, 'Tavoli'),
	(5, 'Sedie'),
	(6, 'Armadi'),
	(7, 'Poltrone'),
	(8, 'Credenze'),
	(9, 'Librerie'),
	(10, 'Scaffali'),
	(11, 'Cassettiere'),
	(12, 'Mobili per il bagno'),
	(13, 'Mobili giardino');

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

-- Dump dei dati della tabella ecommerce_mobili.credenziali: ~1 rows (circa)
INSERT INTO `credenziali` (`id`, `nome_utente`, `password_utente`, `id_utente`) VALUES
	(1, 'jacopocorbani', '$2y$10$EmSbNtztnB7zmUD3ijYob.cq8h5sQbbtZInA1DzWSZYUw.ctKMhv2', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce_mobili.dettaglio_carrello: ~0 rows (circa)

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce_mobili.dettaglio_ordine: ~9 rows (circa)
INSERT INTO `dettaglio_ordine` (`id`, `id_prodotto`, `quantita_prodotto`, `id_ordine`) VALUES
	(1, 1, 1, 3),
	(2, 1074, 1, 3),
	(3, 6, 1, 3),
	(4, 1090, 1, 3),
	(5, 2, 1, 3),
	(6, 1076, 1, 3),
	(7, 1077, 1, 3),
	(8, 3, 1, 3),
	(9, 1081, 1, 3),
	(10, 1, 1, 4);

-- Dump della struttura di tabella ecommerce_mobili.immagini_categorie
CREATE TABLE IF NOT EXISTS `immagini_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path_immagine` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `immagini_categorie_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce_mobili.immagini_categorie: ~13 rows (circa)
INSERT INTO `immagini_categorie` (`id`, `path_immagine`, `id_categoria`) VALUES
	(1, 'divano.jpg', 1),
	(2, 'letto.jpg', 2),
	(3, 'illuminazione.jpg', 3),
	(4, 'tavolo.jpg', 4),
	(5, 'sedie.jpg', 5),
	(6, 'armadio.jpg', 6),
	(7, 'poltrona.jpg', 7),
	(8, 'credenza.jpeg', 8),
	(9, 'libreria.jpg', 9),
	(10, 'scaffali.jpg', 10),
	(11, 'cassettiera.jpg', 11),
	(12, 'mobili_bagno.jpg', 12),
	(13, 'mobili_giardino.jpg', 13);

-- Dump della struttura di tabella ecommerce_mobili.immagini_prodotti
CREATE TABLE IF NOT EXISTS `immagini_prodotti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path_immagine` varchar(255) NOT NULL,
  `id_prodotti` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_prodotti` (`id_prodotti`),
  CONSTRAINT `immagini_prodotti_ibfk_1` FOREIGN KEY (`id_prodotti`) REFERENCES `prodotti` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce_mobili.immagini_prodotti: ~67 rows (circa)
INSERT INTO `immagini_prodotti` (`id`, `path_immagine`, `id_prodotti`) VALUES
	(1, 'divano_moderno.jpg', 1),
	(2, 'letto_matrimoniale.jpg', 2),
	(3, 'lampada_da_tavolo.webp', 3),
	(4, 'tavolo-da-pranzo.jpg', 4),
	(5, 'sedia_da_ufficio.jpg', 5),
	(6, 'armadio_due_ante.webp', 6),
	(7, 'poltrona_reclinabile.jpeg', 7),
	(8, 'credenza_vintage.jpg', 8),
	(9, 'libreria_muro.jpg', 9),
	(10, 'scaffale_metallico.webp', 10),
	(11, 'cassettiera_bianca.jpg', 11),
	(12, 'mobile_bagno.jpg', 12),
	(13, 'tavolo_giardino.jpg', 13),
	(14, 'divano_chesterfield.jpeg', 14),
	(15, 'letto_singolo.jpg', 15),
	(16, 'lampada-da-terra.webp', 16),
	(17, 'tavolino_caffe.jpg', 17),
	(18, 'sedia-da-pranzo.jpg', 18),
	(19, 'armadio_3_ante.jpg', 19),
	(20, 'poltrona_lettura.jpeg', 20),
	(21, 'divano_tessuto.jpeg', 21),
	(22, 'letto-castello.jpg', 22),
	(23, 'placeholder.jpg', 23),
	(24, 'placeholder.jpg', 24),
	(25, 'placeholder.jpg', 25),
	(26, 'placeholder.jpg', 26),
	(27, 'placeholder.jpg', 27),
	(28, 'placeholder.jpg', 28),
	(29, 'placeholder.jpg', 29),
	(30, 'placeholder.jpg', 30),
	(31, 'placeholder.jpg', 31),
	(32, 'placeholder.jpg', 32),
	(33, 'placeholder.jpg', 33),
	(34, 'placeholder.jpg', 34),
	(35, 'placeholder.jpg', 35),
	(36, 'placeholder.jpg', 36),
	(37, 'placeholder.jpg', 37),
	(38, 'placeholder.jpg', 38),
	(39, 'placeholder.jpg', 39),
	(40, 'placeholder.jpg', 40),
	(41, 'placeholder.jpg', 41),
	(42, 'placeholder.jpg', 42),
	(43, 'placeholder.jpg', 43),
	(44, 'placeholder.jpg', 44),
	(45, 'placeholder.jpg', 45),
	(46, 'placeholder.jpg', 46),
	(47, 'placeholder.jpg', 47),
	(48, 'placeholder.jpg', 48),
	(49, 'placeholder.jpg', 49),
	(50, 'placeholder.jpg', 50),
	(51, 'placeholder.jpg', 51),
	(52, 'placeholder.jpg', 52),
	(53, 'placeholder.jpg', 53),
	(54, 'placeholder.jpg', 54),
	(55, 'placeholder.jpg', 55),
	(56, 'placeholder.jpg', 56),
	(57, 'placeholder.jpg', 57),
	(58, 'placeholder.jpg', 58),
	(59, 'placeholder.jpg', 59),
	(60, 'placeholder.jpg', 60),
	(61, 'placeholder.jpg', 61),
	(62, 'placeholder.jpg', 62),
	(63, 'placeholder.jpg', 63),
	(64, 'placeholder.jpg', 64),
	(65, 'placeholder.jpg', 65),
	(66, 'placeholder.jpg', 66),
	(67, 'placeholder.jpg', 67);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce_mobili.indirizzi: ~1 rows (circa)
INSERT INTO `indirizzi` (`id`, `via`, `citta`, `stato`, `id_utente`) VALUES
	(1, 'via Montanara 7', 'Parma', 'Italia', 1);

-- Dump della struttura di tabella ecommerce_mobili.ordine
CREATE TABLE IF NOT EXISTS `ordine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utente` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `costo_consegna` int(11) NOT NULL,
  `data_ordine` date NOT NULL,
  `id_indirizzo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utente` (`id_utente`),
  KEY `id_status` (`id_status`),
  KEY `id_indirizzo` (`id_indirizzo`),
  CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id`),
  CONSTRAINT `ordine_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status_ordine` (`id`),
  CONSTRAINT `ordine_ibfk_3` FOREIGN KEY (`id_indirizzo`) REFERENCES `indirizzi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce_mobili.ordine: ~2 rows (circa)
INSERT INTO `ordine` (`id`, `id_utente`, `id_status`, `costo_consegna`, `data_ordine`, `id_indirizzo`) VALUES
	(3, 1, 1, 15, '2024-02-05', 1),
	(4, 1, 1, 16, '0000-00-00', 1);

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

-- Dump dei dati della tabella ecommerce_mobili.prodotti: ~268 rows (circa)
INSERT INTO `prodotti` (`id`, `nome`, `descrizione`, `prezzo`, `id_categoria`, `id_prodotto`) VALUES
	(1, 'Divano Moderno', 'Elegante e confortevole, il divano moderno in pelle aggiunge stile contemporaneo al tuo spazio abitativo.', 1200, 1, NULL),
	(2, 'Letto Matrimoniale', 'Un letto matrimoniale in legno massello per notti serene, con un design che unisce comfort e estetica moderna.', 800, 2, NULL),
	(3, 'Lampada da Tavolo', 'Illumina con stile ogni angolo della tua casa con questa raffinata lampada da tavolo in stile industriale.', 70, 3, NULL),
	(4, 'Tavolo da Pranzo', 'Riunisci famiglia e amici attorno a questo tavolo da pranzo in rovere, unendo funzionalità e design moderno.', 600, 4, NULL),
	(5, 'Sedia da Ufficio', 'Confortevole e funzionale, la sedia da ufficio ergonomica offre supporto per lunghe ore di lavoro.', 150, 5, NULL),
	(6, 'Armadio a Due Ante', 'Organizza il tuo spazio con questo elegante armadio a due ante in legno di pino.', 500, 6, NULL),
	(7, 'Poltrona Reclinabile', 'Rilassati in totale comfort con questa poltrona reclinabile in tessuto, ideale per momenti di puro relax.', 250, 7, NULL),
	(8, 'Credenza Vintage', 'Aggiungi un tocco retrò al tuo arredamento con questa credenza vintage in legno massello.', 700, 8, NULL),
	(9, 'Libreria a Muro', 'Esponi i tuoi libri con stile su questa libreria a muro in metallo e legno, un\'opzione pratica e decorativa.', 200, 9, NULL),
	(10, 'Scaffale Metallico', 'Robusto e moderno, lo scaffale metallico offre un\'opzione di stoccaggio resistente e contemporanea per il garage.', 100, 10, NULL),
	(11, 'Cassettiera Bianca', 'Organizza con stile con questa cassettiera bianca con 5 cassetti, un elemento pratico per ogni stanza.', 80, 11, NULL),
	(12, 'Mobile da Bagno', 'Funzionale e moderno, il mobile da bagno con specchio offre spazio di archiviazione e un design accattivante.', 300, 12, NULL),
	(13, 'Tavolo da Giardino', 'Goditi il tuo spazio esterno con questo tavolo da giardino in rattan, perfetto per pranzi all\'aperto e momenti di relax.', 120, 13, NULL),
	(14, 'Divano Chesterfield', 'Un\'icona di eleganza, il divano Chesterfield in pelle aggiunge un tocco di classe e comfort al tuo salotto.', 1500, 1, NULL),
	(15, 'Letto Singolo', 'Compatto e accogliente, il letto singolo con contenitore è ideale per camere più piccole o come soluzione per gli ospiti.', 400, 2, NULL),
	(16, 'Lampada da Terra', 'Illumina il tuo spazio con stile grazie a questa lampada da terra in stile moderno.', 90, 3, NULL),
	(17, 'Tavolino da Caffè', 'Aggiungi un tocco di praticità al tuo salotto con questo tavolino da caffè in vetro, perfetto per riunioni informali.', 200, 4, NULL),
	(18, 'Sedia da Pranzo', 'Comfort e stile si fondono in questa sedia da pranzo in legno massello, ideale per creare un\'atmosfera accogliente a tavola.', 60, 5, NULL),
	(19, 'Armadio a Tre Ante', 'Massimo spazio e stile con questo armadio a tre ante in legno di quercia, perfetto per organizzare il tuo guardaroba.', 800, 6, NULL),
	(20, 'Poltrona da Lettura', 'Un\'oasi di comfort, la poltrona da lettura in tessuto offre un luogo accogliente per immergersi nei tuoi libri preferiti.', 300, 7, NULL),
	(21, 'Divano in Tessuto', 'Confortevole e moderno, il divano in tessuto color grigio aggiunge calore e stile al tuo soggiorno.', 900, 1, NULL),
	(22, 'Letto a Castello', 'Ottimizza lo spazio con questo pratico letto a castello in metallo, ideale per camere con più occupanti.', 500, 2, NULL),
	(23, 'Lampada da Soffitto', 'Illumina con eleganza ogni angolo della tua casa con questa lampada da soffitto a LED.', 120, 3, NULL),
	(24, 'Tavolo da Cucina', 'Funzionale e accattivante, il tavolo da cucina in acciaio inossidabile è il cuore della tua area gastronomica.', 350, 4, NULL),
	(25, 'Sedia da Giardino', 'Coniuga comodità e resistenza con questa sedia da giardino in plastica, perfetta per momenti all\'aria aperta.', 30, 5, NULL),
	(26, 'Armadio a Quattro Ante', 'Massimo spazio di archiviazione con stile, grazie a questo ampio armadio a quattro ante in legno di faggio.', 1000, 6, NULL),
	(27, 'Poltrona da Ufficio', 'Coniuga comfort e design nella tua area lavorativa con questa poltrona da ufficio in pelle.', 200, 7, NULL),
	(28, 'Credenza Moderna', 'Unisce funzionalità e design contemporaneo, la credenza moderna in MDF è perfetta per l\'organizzazione degli spazi.', 400, 8, NULL),
	(29, 'Libreria a Colonna', 'Ottimizza lo spazio verticale con questa libreria a colonna in legno massello, ideale per esporre libri e oggetti d\'arte.', 250, 9, NULL),
	(30, 'Scaffale in Plastica', 'Leggero e pratico, lo scaffale in plastica offre soluzioni di stoccaggio flessibili in ogni ambiente domestico.', 50, 10, NULL),
	(31, 'Cassettiera in Legno', 'Organizza con stile con questa cassettiera in legno con 3 cassetti, un elemento versatile per diverse stanze.', 120, 11, NULL),
	(32, 'Mobile da Bagno Moderno', 'Unisce funzionalità e design contemporaneo, il mobile da bagno moderno con lavabo è perfetto per lo spazio dedicato all\'igiene personale.', 450, 12, NULL),
	(33, 'Sedia da Giardino', 'Confortevole e resistente alle intemperie, la sedia da giardino in legno è l\'ideale per godersi gli spazi esterni.', 80, 13, NULL),
	(34, 'Divano Classico', 'Elegante e raffinato, il divano classico in tessuto aggiunge un tocco di tradizione al tuo salotto.', 700, 1, NULL),
	(35, 'Letto Singolo Moderno', 'Letto singolo moderno con contenitore, perfetto per ottimizzare lo spazio con stile contemporaneo.', 300, 2, NULL),
	(36, 'Lampada da Parete', 'Illumina con eleganza ogni angolo con la lampada da parete a LED, un elemento moderno e funzionale.', 50, 3, NULL),
	(37, 'Tavolo da Caffè Moderno', 'Tavolo da caffè moderno in vetro, un\'opzione chic per arricchire il tuo salotto con stile.', 150, 4, NULL),
	(38, 'Sedia da Pranzo Moderna', 'Sedia da pranzo moderna in legno, unisce comfort e design contemporaneo per cene indimenticabili.', 40, 5, NULL),
	(39, 'Armadio a Cinque Ante', 'Massimo spazio e stile con l\'armadio a cinque ante in legno di faggio, perfetto per organizzare la tua stanza.', 1200, 6, NULL),
	(40, 'Poltrona da Ufficio Moderna', 'Confortevole e professionale, la poltrona da ufficio moderna in pelle rende il lavoro più piacevole.', 180, 7, NULL),
	(41, 'Credenza Classica', 'Credenza classica in legno massello, un pezzo d\'arredamento che aggiunge charme e praticità.', 500, 8, NULL),
	(42, 'Libreria a Terra', 'Esponi i tuoi libri con stile su questa libreria a terra in metallo e legno, perfetta per un tocco moderno.', 220, 9, NULL),
	(43, 'Scaffale in Legno', 'Scaffale in legno per uso domestico, un\'opzione versatile per organizzare gli spazi con gusto.', 70, 10, NULL),
	(44, 'Cassettiera Moderna', 'Cassettiera moderna con 4 cassetti, un elemento pratico e contemporaneo per la tua stanza.', 100, 11, NULL),
	(45, 'Mobile da Bagno Classico', 'Elegante e funzionale, il mobile da bagno classico con lavabo aggiunge stile al tuo spazio dedicato all\'igiene.', 350, 12, NULL),
	(46, 'Sedia da Giardino Moderna', 'Confortevole e moderna, la sedia da giardino in legno è ideale per momenti di relax all\'aperto.', 60, 13, NULL),
	(47, 'Divano in Pelle', 'Raffinato e lussuoso, il divano in pelle color marrone aggiunge un tocco di eleganza al tuo salotto.', 1300, 1, NULL),
	(48, 'Letto Matrimoniale Moderno', 'Letto matrimoniale moderno con contenitore, unisce comfort e praticità in una soluzione di design.', 900, 2, NULL),
	(49, 'Lampada da Soffitto Moderna', 'Illumina con stile grazie alla lampada da soffitto moderna a LED, perfetta per creare atmosfere accoglienti.', 140, 3, NULL),
	(50, 'Tavolo da Cucina Moderno', 'Il tavolo da cucina moderno in acciaio inossidabile è il centro conviviale della tua cucina con stile.', 400, 4, NULL),
	(51, 'Sedia da Giardino Classica', 'Coniuga tradizione e comfort con la sedia da giardino classica in plastica, perfetta per il tuo spazio all\'aperto.', 20, 5, NULL),
	(52, 'Armadio a Sei Ante', 'Massimo spazio di archiviazione con stile, grazie all\'armadio a sei ante in legno di quercia.', 1400, 6, NULL),
	(53, 'Poltrona da Lettura Moderna', 'La poltrona da lettura moderna in tessuto offre un luogo accogliente per immergersi nei tuoi libri preferiti.', 280, 7, NULL),
	(54, 'Divano in Velluto', 'Lussuoso e accogliente, il divano in velluto color blu aggiunge un tocco di ricercatezza al tuo salotto.', 1100, 1, NULL),
	(55, 'Letto Singolo Classico', 'Letto singolo classico in legno, un elemento affascinante per camere con un tocco tradizionale.', 350, 2, NULL),
	(56, 'Lampada da Tavolo Moderna', 'La lampada da tavolo moderna a LED unisce design contemporaneo e illuminazione funzionale.', 60, 3, NULL),
	(57, 'Tavolo da Caffè Classico', 'Tavolo da caffè classico in legno, perfetto per un\'atmosfera accogliente e tradizionale nel tuo salotto.', 180, 4, NULL),
	(58, 'Sedia da Pranzo Classica', 'Comfort e eleganza si incontrano nella sedia da pranzo classica in legno, ideale per cene indimenticabili.', 50, 5, NULL),
	(59, 'Armadio a Sette Ante', 'Massimo spazio di archiviazione con stile, grazie all\'armadio a sette ante in legno di quercia.', 1600, 6, NULL),
	(60, 'Poltrona da Lettura Classica', 'La poltrona da lettura classica in tessuto offre comfort e charme in ogni angolo della tua casa.', 260, 7, NULL),
	(61, 'Divano in Tessuto Moderno', 'Confortevole e moderno, il divano in tessuto moderno color grigio aggiunge stile al tuo soggiorno.', 1000, 1, NULL),
	(62, 'Letto Matrimoniale Classico', 'Letto matrimoniale classico in legno, un elemento affascinante per camere dal tocco tradizionale.', 850, 2, NULL),
	(63, 'Lampada da Soffitto Classica', 'Illumina con eleganza grazie alla lampada da soffitto classica a LED, perfetta per atmosfere raffinate.', 130, 3, NULL),
	(64, 'Tavolo da Cucina Classico', 'Il tavolo da cucina classico in legno è il cuore conviviale della tua cucina, unendo tradizione e funzionalità.', 380, 4, NULL),
	(65, 'Sedia da Giardino Moderna', 'Confortevole e moderna, la sedia da giardino moderna in plastica è ideale per momenti di relax all\'aperto.', 40, 5, NULL),
	(66, 'Armadio a Otto Ante', 'Massimo spazio di archiviazione con stile, grazie all\'armadio a otto ante in legno di faggio.', 1800, 6, NULL),
	(67, 'Poltrona da Ufficio Classica', 'Elegante e funzionale, la poltrona da ufficio classica in pelle offre comfort e stile nella tua area lavorativa.', 220, 7, NULL),
	(1073, 'Cuscini Decorativi', NULL, 30, NULL, 1),
	(1074, 'Pouf in Pelle', NULL, 100, NULL, 1),
	(1075, 'Tappeto Moderno', NULL, 80, NULL, 1),
	(1076, 'Parure di Lenzuola', NULL, 50, NULL, 2),
	(1077, 'Comodino Design', NULL, 120, NULL, 2),
	(1078, 'Lampada da Tavolo in Legno', NULL, 40, NULL, 2),
	(1079, 'Lampadina LED', NULL, 10, NULL, 3),
	(1080, 'Porta Riviste Moderno', NULL, 60, NULL, 3),
	(1081, 'Cornice Foto in Metallo', NULL, 20, NULL, 3),
	(1082, 'Set di Piatti Eleganti', NULL, 70, NULL, 4),
	(1083, 'Centrotavola Moderno', NULL, 30, NULL, 4),
	(1084, 'Sottobicchieri in Vetro', NULL, 15, NULL, 4),
	(1085, 'Cuscino Ergonomico per Sedia', NULL, 25, NULL, 5),
	(1086, 'Tappetino per Sedia in PVC', NULL, 20, NULL, 5),
	(1087, 'Supporto Lombare Regolabile', NULL, 35, NULL, 5),
	(1088, 'Scatola Organizer in Legno', NULL, 50, NULL, 6),
	(1089, 'Specchio da Terra Design', NULL, 180, NULL, 6),
	(1090, 'Appendiabiti Moderno', NULL, 40, NULL, 6),
	(1091, 'Poggiapiedi Imbottito', NULL, 80, NULL, 7),
	(1092, 'Coperta Morbida in Pile', NULL, 45, NULL, 7),
	(1093, 'Cuscino Poggiatesta', NULL, 20, NULL, 7),
	(1094, 'Tavola da Cucina Pieghevole', NULL, 60, NULL, 8),
	(1095, 'Vassoio Vintage', NULL, 25, NULL, 8),
	(1096, 'Set di Coltelli da Cucina', NULL, 90, NULL, 8),
	(1097, 'Mensole Moderne', NULL, 30, NULL, 9),
	(1098, 'Vaso Decorativo', NULL, 15, NULL, 9),
	(1099, 'Cornice Foto a Parete', NULL, 25, NULL, 9),
	(1100, 'Cestino Portarifiuti', NULL, 15, NULL, 10),
	(1101, 'Contenitori Organizer Traspare', NULL, 40, NULL, 10),
	(1102, 'Sgabello Pieghevole', NULL, 18, NULL, 10),
	(1103, 'Set di Tovagliette', NULL, 25, NULL, 11),
	(1104, 'Candeliere Classico', NULL, 40, NULL, 11),
	(1105, 'Vaso di Fiori Artificiali', NULL, 20, NULL, 11),
	(1106, 'Set di Asciugamani di Design', NULL, 35, NULL, 12),
	(1107, 'Porta Spazzolino Moderno', NULL, 15, NULL, 12),
	(1108, 'Set Accessori da Bagno in Cera', NULL, 50, NULL, 12),
	(1109, 'Tavolino da Giardino Pieghevol', NULL, 50, NULL, 13),
	(1110, 'Ombrellone Moderno', NULL, 120, NULL, 13),
	(1111, 'Cuscini per Sedie da Giardino', NULL, 25, NULL, 13),
	(1112, 'Copridivano in Velluto', NULL, 60, NULL, 14),
	(1113, 'Cuscino a Forma di Cuore', NULL, 18, NULL, 14),
	(1114, 'Vaso di Fiori Secchi', NULL, 25, NULL, 14),
	(1115, 'Set di Asciugamani a Righe', NULL, 30, NULL, 15),
	(1116, 'Portaoggetti Integrato al Lett', NULL, 40, NULL, 15),
	(1117, 'Appendiabiti da Parete', NULL, 15, NULL, 15),
	(1118, 'Lampada da Terra con Bracci Re', NULL, 75, NULL, 16),
	(1119, 'Vaso di Fiori in Ceramica', NULL, 22, NULL, 16),
	(1120, 'Specchio Moderno da Parete', NULL, 50, NULL, 16),
	(1121, 'Tavolino da Salotto in Legno', NULL, 120, NULL, 17),
	(1122, 'Set di Tovaglioli Eleganti', NULL, 28, NULL, 17),
	(1123, 'Candelabro in Metallo', NULL, 35, NULL, 17),
	(1124, 'Cuscino Seduta in Paglia', NULL, 15, NULL, 18),
	(1125, 'Centrotavola Classico', NULL, 35, NULL, 18),
	(1126, 'Tovaglia a Quadretti', NULL, 22, NULL, 18),
	(1127, 'Set di Appendiabiti in Legno', NULL, 40, NULL, 19),
	(1128, 'Portaombrelli Design', NULL, 70, NULL, 19),
	(1129, 'Set di Portaoggetti in Bambù', NULL, 25, NULL, 19),
	(1130, 'Cuscino Lombare Decorativo', NULL, 20, NULL, 20),
	(1131, 'Lampada da Lettura Flessibile', NULL, 30, NULL, 20),
	(1132, 'Coperta in Pile Morbido', NULL, 40, NULL, 20),
	(1133, 'Tovaglia Elegante', NULL, 35, NULL, 21),
	(1134, 'Set di Piatti da Portata', NULL, 45, NULL, 21),
	(1135, 'Candelabro da Tavolo', NULL, 28, NULL, 21),
	(1136, 'Quadro Moderno Astratto', NULL, 60, NULL, 22),
	(1137, 'Set di Scatole Organizer Color', NULL, 18, NULL, 22),
	(1138, 'Tappeto da Parete Vintage', NULL, 40, NULL, 22),
	(1139, 'Scaffale Portaoggetti', NULL, 25, NULL, 23),
	(1140, 'Scatola in Tessuto per Riporre', NULL, 15, NULL, 23),
	(1141, 'Sgabello da Bar Moderno', NULL, 50, NULL, 23),
	(1142, 'Cuscino Seduta in Pelle', NULL, 35, NULL, 24),
	(1143, 'Vaso di Fiori in Vetro', NULL, 20, NULL, 24),
	(1144, 'Tappeto da Cucina Antiscivolo', NULL, 18, NULL, 24),
	(1145, 'Set di Asciugamani da Bagno', NULL, 30, NULL, 25),
	(1146, 'Sgabello da Giardino Pieghevol', NULL, 22, NULL, 25),
	(1147, 'Lampada Solare da Giardino', NULL, 45, NULL, 25),
	(1148, 'Copridivano Elastico', NULL, 50, NULL, 26),
	(1149, 'Set di Tazze da Caffè', NULL, 18, NULL, 26),
	(1150, 'Ombrellone da Giardino', NULL, 120, NULL, 26),
	(1151, 'Portaoggetti da Parete', NULL, 30, NULL, 27),
	(1152, 'Lampada da Scrivania Moderna', NULL, 40, NULL, 27),
	(1153, 'Set di Contenitori in Vetro', NULL, 25, NULL, 27),
	(1154, 'Vaso di Fiori in Porcellana', NULL, 28, NULL, 28),
	(1155, 'Set di Scatole Organizer in Pl', NULL, 15, NULL, 28),
	(1156, 'Tappeto da Cucina Colorato', NULL, 18, NULL, 28),
	(1157, 'Sgabello in Legno Massello', NULL, 40, NULL, 29),
	(1158, 'Lampada da Tavolo Classica', NULL, 25, NULL, 29),
	(1159, 'Scatola Portagioie Vintage', NULL, 30, NULL, 29),
	(1160, 'Set di Piatti da Portata', NULL, 45, NULL, 30),
	(1161, 'Vaso di Fiori in Vetro', NULL, 22, NULL, 30),
	(1162, 'Centrotavola da Tavolo', NULL, 28, NULL, 30),
	(1163, 'Appendiabiti da Parete Moderno', NULL, 30, NULL, 31),
	(1164, 'Cornice Foto Design', NULL, 18, NULL, 31),
	(1165, 'Scatola Organizer in Rattan', NULL, 25, NULL, 31),
	(1166, 'Tappeto da Bagno Morbido', NULL, 20, NULL, 32),
	(1167, 'Set di Accessori da Bagno in A', NULL, 50, NULL, 32),
	(1168, 'Sgabello da Bagno Design', NULL, 30, NULL, 32),
	(1169, 'Cuscino Decorativo Floreale', NULL, 18, NULL, 33),
	(1170, 'Lampada da Tavolo in Ceramica', NULL, 35, NULL, 33),
	(1171, 'Candelabro da Terra Moderno', NULL, 60, NULL, 33),
	(1172, 'Tovaglia a Quadretti', NULL, 25, NULL, 34),
	(1173, 'Set di Posate da Tavola', NULL, 40, NULL, 34),
	(1174, 'Vaso di Fiori Secchi', NULL, 18, NULL, 34),
	(1175, 'Cornice Foto a Parete', NULL, 30, NULL, 35),
	(1176, 'Lampada da Terra in Legno', NULL, 60, NULL, 35),
	(1177, 'Set di Portacandele Moderni', NULL, 22, NULL, 35),
	(1178, 'Scaffale da Parete in Legno', NULL, 35, NULL, 36),
	(1179, 'Scatola Portariviste Design', NULL, 18, NULL, 36),
	(1180, 'Orologio da Parete Moderno', NULL, 40, NULL, 36),
	(1181, 'Cuscino Lombare Decorativo', NULL, 22, NULL, 37),
	(1182, 'Tappeto da Soggiorno', NULL, 40, NULL, 37),
	(1183, 'Lampada da Tavolo Classica', NULL, 28, NULL, 37),
	(1184, 'Set di Tovagliette in Rattan', NULL, 25, NULL, 38),
	(1185, 'Vaso di Fiori in Ceramica', NULL, 30, NULL, 38),
	(1186, 'Centrotavola Moderno', NULL, 22, NULL, 38),
	(1187, 'Scaffale Portaoggetti', NULL, 35, NULL, 39),
	(1188, 'Cuscino Decorativo Floreale', NULL, 18, NULL, 39),
	(1189, 'Lampada da Scrivania Moderna', NULL, 40, NULL, 39),
	(1190, 'Scatola Organizer in Tessuto', NULL, 15, NULL, 40),
	(1191, 'Tappeto da Cucina Antiscivolo', NULL, 22, NULL, 40),
	(1192, 'Sgabello da Bar in Legno', NULL, 50, NULL, 40),
	(1193, 'Cuscino per Sedia Imbottito', NULL, 20, NULL, 41),
	(1194, 'Lampada da Tavolo in Vetro', NULL, 30, NULL, 41),
	(1195, 'Set di Contenitori in Metallo', NULL, 35, NULL, 41),
	(1196, 'Vaso di Fiori in Vetro', NULL, 28, NULL, 42),
	(1197, 'Set di Scatole Organizer Color', NULL, 18, NULL, 42),
	(1198, 'Tappeto da Cucina Morbido', NULL, 25, NULL, 42),
	(1199, 'Scaffale in Metallo', NULL, 30, NULL, 43),
	(1200, 'Cuscino Lombare Decorativo', NULL, 22, NULL, 43),
	(1201, 'Lampada da Terra Moderna', NULL, 45, NULL, 43),
	(1202, 'Set di Tovaglioli Eleganti', NULL, 40, NULL, 44),
	(1203, 'Vaso di Fiori Secchi', NULL, 18, NULL, 44),
	(1204, 'Centrotavola da Tavolo', NULL, 28, NULL, 44),
	(1205, 'Appendiabiti da Parete Design', NULL, 30, NULL, 45),
	(1206, 'Specchio da Bagno Moderno', NULL, 60, NULL, 45),
	(1207, 'Set Accessori da Bagno in Porc', NULL, 22, NULL, 45),
	(1208, 'Tappeto da Bagno Antiscivolo', NULL, 20, NULL, 46),
	(1209, 'Sgabello da Bagno Design', NULL, 35, NULL, 46),
	(1210, 'Cuscino per Vasca da Bagno', NULL, 18, NULL, 46),
	(1211, 'Copridivano Elasticizzato', NULL, 50, NULL, 47),
	(1212, 'Set di Posate da Tavola', NULL, 40, NULL, 47),
	(1213, 'Candelabro da Tavolo Moderno', NULL, 28, NULL, 47),
	(1214, 'Cornice Foto a Parete', NULL, 30, NULL, 48),
	(1215, 'Lampada da Terra in Legno', NULL, 60, NULL, 48),
	(1216, 'Set di Portacandele Moderni', NULL, 22, NULL, 48),
	(1217, 'Scaffale da Parete in Legno', NULL, 35, NULL, 49),
	(1218, 'Scatola Portariviste Design', NULL, 18, NULL, 49),
	(1219, 'Orologio da Parete Moderno', NULL, 40, NULL, 49),
	(1220, 'Cuscino Lombare Decorativo', NULL, 22, NULL, 50),
	(1221, 'Tappeto da Soggiorno', NULL, 40, NULL, 50),
	(1222, 'Lampada da Tavolo Classica', NULL, 28, NULL, 50),
	(1223, 'Set di Tovagliette in Rattan', NULL, 25, NULL, 51),
	(1224, 'Vaso di Fiori in Ceramica', NULL, 30, NULL, 51),
	(1225, 'Centrotavola Moderno', NULL, 22, NULL, 51),
	(1226, 'Scaffale Portaoggetti', NULL, 35, NULL, 52),
	(1227, 'Cuscino Decorativo Floreale', NULL, 18, NULL, 52),
	(1228, 'Lampada da Scrivania Moderna', NULL, 40, NULL, 52),
	(1229, 'Scatola Organizer in Tessuto', NULL, 15, NULL, 53),
	(1230, 'Tappeto da Cucina Antiscivolo', NULL, 22, NULL, 53),
	(1231, 'Sgabello da Bar in Legno', NULL, 50, NULL, 53),
	(1232, 'Cuscino per Sedia Imbottito', NULL, 20, NULL, 54),
	(1233, 'Lampada da Tavolo in Vetro', NULL, 30, NULL, 54),
	(1234, 'Set di Contenitori in Metallo', NULL, 35, NULL, 54),
	(1235, 'Vaso di Fiori in Vetro', NULL, 28, NULL, 55),
	(1236, 'Set di Scatole Organizer Color', NULL, 18, NULL, 55),
	(1237, 'Tappeto da Cucina Morbido', NULL, 25, NULL, 55),
	(1238, 'Scaffale in Metallo', NULL, 30, NULL, 56),
	(1239, 'Cuscino Lombare Decorativo', NULL, 22, NULL, 56),
	(1240, 'Lampada da Terra Moderna', NULL, 45, NULL, 56),
	(1241, 'Set di Tovaglioli Eleganti', NULL, 40, NULL, 57),
	(1242, 'Vaso di Fiori Secchi', NULL, 18, NULL, 57),
	(1243, 'Centrotavola da Tavolo', NULL, 28, NULL, 57),
	(1244, 'Appendiabiti da Parete Design', NULL, 30, NULL, 58),
	(1245, 'Specchio da Bagno Moderno', NULL, 60, NULL, 58),
	(1246, 'Set Accessori da Bagno in Porc', NULL, 22, NULL, 58),
	(1247, 'Tappeto da Bagno Antiscivolo', NULL, 20, NULL, 59),
	(1248, 'Sgabello da Bagno Design', NULL, 35, NULL, 59),
	(1249, 'Cuscino per Vasca da Bagno', NULL, 18, NULL, 59),
	(1250, 'Copridivano Elasticizzato', NULL, 50, NULL, 60),
	(1251, 'Set di Posate da Tavola', NULL, 40, NULL, 60),
	(1252, 'Candelabro da Tavolo Moderno', NULL, 28, NULL, 60),
	(1253, 'Cornice Foto a Parete', NULL, 30, NULL, 61),
	(1254, 'Lampada da Terra in Legno', NULL, 60, NULL, 61),
	(1255, 'Set di Portacandele Moderni', NULL, 22, NULL, 61),
	(1256, 'Scaffale da Parete in Legno', NULL, 35, NULL, 62),
	(1257, 'Scatola Portariviste Design', NULL, 18, NULL, 62),
	(1258, 'Orologio da Parete Moderno', NULL, 40, NULL, 62),
	(1259, 'Cuscino Lombare Decorativo', NULL, 22, NULL, 63),
	(1260, 'Tappeto da Soggiorno', NULL, 40, NULL, 63),
	(1261, 'Lampada da Tavolo Classica', NULL, 28, NULL, 63),
	(1262, 'Set di Tovagliette in Rattan', NULL, 25, NULL, 64),
	(1263, 'Vaso di Fiori in Ceramica', NULL, 30, NULL, 64),
	(1264, 'Centrotavola Moderno', NULL, 22, NULL, 64),
	(1265, 'Scaffale Portaoggetti', NULL, 35, NULL, 65),
	(1266, 'Cuscino Decorativo Floreale', NULL, 18, NULL, 65),
	(1267, 'Lampada da Scrivania Moderna', NULL, 40, NULL, 65),
	(1268, 'Scatola Organizer in Tessuto', NULL, 15, NULL, 66),
	(1269, 'Tappeto da Cucina Antiscivolo', NULL, 22, NULL, 66),
	(1270, 'Sgabello da Bar in Legno', NULL, 50, NULL, 66),
	(1271, 'Cuscino per Sedia Imbottito', NULL, 20, NULL, 67),
	(1272, 'Lampada da Tavolo in Vetro', NULL, 30, NULL, 67),
	(1273, 'Set di Contenitori in Metallo', NULL, 35, NULL, 67);

-- Dump della struttura di tabella ecommerce_mobili.ruolo
CREATE TABLE IF NOT EXISTS `ruolo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruolo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce_mobili.ruolo: ~3 rows (circa)
INSERT INTO `ruolo` (`id`, `ruolo`) VALUES
	(1, 'USER'),
	(2, 'ADMIN'),
	(3, 'DELETED');

-- Dump della struttura di tabella ecommerce_mobili.status_ordine
CREATE TABLE IF NOT EXISTS `status_ordine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_ordine` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella ecommerce_mobili.status_ordine: ~6 rows (circa)
INSERT INTO `status_ordine` (`id`, `status_ordine`) VALUES
	(1, 'In attesa di conferma'),
	(2, 'Confermato'),
	(3, 'In elaborazione'),
	(4, 'Spedito'),
	(5, 'Consegnato'),
	(6, 'Annullato');

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

-- Dump dei dati della tabella ecommerce_mobili.utente: ~1 rows (circa)
INSERT INTO `utente` (`id`, `nome`, `cognome`, `id_ruolo`) VALUES
	(1, 'Jacopo', 'Corbani', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
