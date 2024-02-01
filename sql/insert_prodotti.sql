USE ecommerce_mobili;
#INSERT INTO utente (nome, cognome, id_ruolo) VALUES ('Jacopo', 'Corbani', 2);
#INSERT INTO credenziali (nome_utente, password_utente, id_utente) VALUES ('jacopocorbani', '$2y$10$EmSbNtztnB7zmUD3ijYob.cq8h5sQbbtZInA1DzWSZYUw.ctKMhv2', 1);

INSERT INTO prodotti(id, nome, descrizione, prezzo, id_categoria) VALUES
	(1,'Divano Moderno', 'Elegante e confortevole, il divano moderno in pelle aggiunge stile contemporaneo al tuo spazio abitativo.', 1200.00, 1),
	(2,'Letto Matrimoniale', 'Un letto matrimoniale in legno massello per notti serene, con un design che unisce comfort e estetica moderna.', 800.00, 2),
	(3,'Lampada da Tavolo', 'Illumina con stile ogni angolo della tua casa con questa raffinata lampada da tavolo in stile industriale.', 70.00, 3),
	(4,'Tavolo da Pranzo', 'Riunisci famiglia e amici attorno a questo tavolo da pranzo in rovere, unendo funzionalità e design moderno.', 600.00, 4),
	(5,'Sedia da Ufficio', 'Confortevole e funzionale, la sedia da ufficio ergonomica offre supporto per lunghe ore di lavoro.', 150.00, 5),
	(6,'Armadio a Due Ante', 'Organizza il tuo spazio con questo elegante armadio a due ante in legno di pino.', 500.00, 6),
	(7,'Poltrona Reclinabile', 'Rilassati in totale comfort con questa poltrona reclinabile in tessuto, ideale per momenti di puro relax.', 250.00, 7),
	(8,'Credenza Vintage', 'Aggiungi un tocco retrò al tuo arredamento con questa credenza vintage in legno massello.', 700.00, 8),
	(9,'Libreria a Muro', 'Esponi i tuoi libri con stile su questa libreria a muro in metallo e legno, un\'opzione pratica e decorativa.', 200.00, 9),
	(10,'Scaffale Metallico', 'Robusto e moderno, lo scaffale metallico offre un\'opzione di stoccaggio resistente e contemporanea per il garage.', 100.00, 10),
	(11,'Cassettiera Bianca', 'Organizza con stile con questa cassettiera bianca con 5 cassetti, un elemento pratico per ogni stanza.', 80.00, 11),
	(12,'Mobile da Bagno', 'Funzionale e moderno, il mobile da bagno con specchio offre spazio di archiviazione e un design accattivante.', 300.00, 12),
	(13,'Tavolo da Giardino', 'Goditi il tuo spazio esterno con questo tavolo da giardino in rattan, perfetto per pranzi all\'aperto e momenti di relax.', 120.00, 13),
	(14,'Divano Chesterfield', 'Un\'icona di eleganza, il divano Chesterfield in pelle aggiunge un tocco di classe e comfort al tuo salotto.', 1500.00, 1),
	(15,'Letto Singolo', 'Compatto e accogliente, il letto singolo con contenitore è ideale per camere più piccole o come soluzione per gli ospiti.', 400.00, 2),
	(16,'Lampada da Terra', 'Illumina il tuo spazio con stile grazie a questa lampada da terra in stile moderno.', 90.00, 3),
	(17,'Tavolino da Caffè', 'Aggiungi un tocco di praticità al tuo salotto con questo tavolino da caffè in vetro, perfetto per riunioni informali.', 200.00, 4),
	(18,'Sedia da Pranzo', 'Comfort e stile si fondono in questa sedia da pranzo in legno massello, ideale per creare un\'atmosfera accogliente a tavola.', 60.00, 5),
	(19,'Armadio a Tre Ante', 'Massimo spazio e stile con questo armadio a tre ante in legno di quercia, perfetto per organizzare il tuo guardaroba.', 800.00, 6),
	(20,'Poltrona da Lettura', 'Un\'oasi di comfort, la poltrona da lettura in tessuto offre un luogo accogliente per immergersi nei tuoi libri preferiti.', 300.00, 7),
	(21,'Divano in Tessuto', 'Confortevole e moderno, il divano in tessuto color grigio aggiunge calore e stile al tuo soggiorno.', 900.00, 1),
	(22,'Letto a Castello', 'Ottimizza lo spazio con questo pratico letto a castello in metallo, ideale per camere con più occupanti.', 500.00, 2),
	(23,'Lampada da Soffitto', 'Illumina con eleganza ogni angolo della tua casa con questa lampada da soffitto a LED.', 120.00, 3),
	(24,'Tavolo da Cucina', 'Funzionale e accattivante, il tavolo da cucina in acciaio inossidabile è il cuore della tua area gastronomica.', 350.00, 4),
	(25,'Sedia da Giardino', 'Coniuga comodità e resistenza con questa sedia da giardino in plastica, perfetta per momenti all\'aria aperta.', 30.00, 5),
	(26,'Armadio a Quattro Ante', 'Massimo spazio di archiviazione con stile, grazie a questo ampio armadio a quattro ante in legno di faggio.', 1000.00, 6),
	(27,'Poltrona da Ufficio', 'Coniuga comfort e design nella tua area lavorativa con questa poltrona da ufficio in pelle.', 200.00, 7),
	(28,'Credenza Moderna', 'Unisce funzionalità e design contemporaneo, la credenza moderna in MDF è perfetta per l\'organizzazione degli spazi.', 400.00, 8),
	(29,'Libreria a Colonna', 'Ottimizza lo spazio verticale con questa libreria a colonna in legno massello, ideale per esporre libri e oggetti d\'arte.', 250.00, 9),
	(30,'Scaffale in Plastica', 'Leggero e pratico, lo scaffale in plastica offre soluzioni di stoccaggio flessibili in ogni ambiente domestico.', 50.00, 10),
	(31,'Cassettiera in Legno', 'Organizza con stile con questa cassettiera in legno con 3 cassetti, un elemento versatile per diverse stanze.', 120.00, 11),
	(32,'Mobile da Bagno Moderno', 'Unisce funzionalità e design contemporaneo, il mobile da bagno moderno con lavabo è perfetto per lo spazio dedicato all\'igiene personale.', 450.00, 12),
	(33,'Sedia da Giardino', 'Confortevole e resistente alle intemperie, la sedia da giardino in legno è l\'ideale per godersi gli spazi esterni.', 80.00, 13),
	(34,'Divano Classico', 'Elegante e raffinato, il divano classico in tessuto aggiunge un tocco di tradizione al tuo salotto.', 700.00, 1),
	(35,'Letto Singolo Moderno', 'Letto singolo moderno con contenitore, perfetto per ottimizzare lo spazio con stile contemporaneo.', 300.00, 2),
	(36,'Lampada da Parete', 'Illumina con eleganza ogni angolo con la lampada da parete a LED, un elemento moderno e funzionale.', 50.00, 3),
	(37,'Tavolo da Caffè Moderno', 'Tavolo da caffè moderno in vetro, un\'opzione chic per arricchire il tuo salotto con stile.', 150.00, 4),
	(38,'Sedia da Pranzo Moderna', 'Sedia da pranzo moderna in legno, unisce comfort e design contemporaneo per cene indimenticabili.', 40.00, 5),
	(39,'Armadio a Cinque Ante', 'Massimo spazio e stile con l\'armadio a cinque ante in legno di faggio, perfetto per organizzare la tua stanza.', 1200.00, 6),
	(40,'Poltrona da Ufficio Moderna', 'Confortevole e professionale, la poltrona da ufficio moderna in pelle rende il lavoro più piacevole.', 180.00, 7),
	(41,'Credenza Classica', 'Credenza classica in legno massello, un pezzo d\'arredamento che aggiunge charme e praticità.', 500.00, 8),
	(42,'Libreria a Terra', 'Esponi i tuoi libri con stile su questa libreria a terra in metallo e legno, perfetta per un tocco moderno.', 220.00, 9),
	(43,'Scaffale in Legno', 'Scaffale in legno per uso domestico, un\'opzione versatile per organizzare gli spazi con gusto.', 70.00, 10),
	(44,'Cassettiera Moderna', 'Cassettiera moderna con 4 cassetti, un elemento pratico e contemporaneo per la tua stanza.', 100.00, 11),
	(45,'Mobile da Bagno Classico', 'Elegante e funzionale, il mobile da bagno classico con lavabo aggiunge stile al tuo spazio dedicato all\'igiene.', 350.00, 12),
	(46,'Sedia da Giardino Moderna', 'Confortevole e moderna, la sedia da giardino in legno è ideale per momenti di relax all\'aperto.', 60.00, 13),
	(47,'Divano in Pelle', 'Raffinato e lussuoso, il divano in pelle color marrone aggiunge un tocco di eleganza al tuo salotto.', 1300.00, 1),
	(48,'Letto Matrimoniale Moderno', 'Letto matrimoniale moderno con contenitore, unisce comfort e praticità in una soluzione di design.', 900.00, 2),
	(49,'Lampada da Soffitto Moderna', 'Illumina con stile grazie alla lampada da soffitto moderna a LED, perfetta per creare atmosfere accoglienti.', 140.00, 3),
	(50,'Tavolo da Cucina Moderno', 'Il tavolo da cucina moderno in acciaio inossidabile è il centro conviviale della tua cucina con stile.', 400.00, 4),
	(51,'Sedia da Giardino Classica', 'Coniuga tradizione e comfort con la sedia da giardino classica in plastica, perfetta per il tuo spazio all\'aperto.', 20.00, 5),
	(52,'Armadio a Sei Ante', 'Massimo spazio di archiviazione con stile, grazie all\'armadio a sei ante in legno di quercia.', 1400.00, 6),
	(53,'Poltrona da Lettura Moderna', 'La poltrona da lettura moderna in tessuto offre un luogo accogliente per immergersi nei tuoi libri preferiti.', 280.00, 7),
	(54,'Divano in Velluto', 'Lussuoso e accogliente, il divano in velluto color blu aggiunge un tocco di ricercatezza al tuo salotto.', 1100.00, 1),
	(55,'Letto Singolo Classico', 'Letto singolo classico in legno, un elemento affascinante per camere con un tocco tradizionale.', 350.00, 2),
	(56,'Lampada da Tavolo Moderna', 'La lampada da tavolo moderna a LED unisce design contemporaneo e illuminazione funzionale.', 60.00, 3),
	(57,'Tavolo da Caffè Classico', 'Tavolo da caffè classico in legno, perfetto per un\'atmosfera accogliente e tradizionale nel tuo salotto.', 180.00, 4),
	(58,'Sedia da Pranzo Classica', 'Comfort e eleganza si incontrano nella sedia da pranzo classica in legno, ideale per cene indimenticabili.', 50.00, 5),
	(59,'Armadio a Sette Ante', 'Massimo spazio di archiviazione con stile, grazie all\'armadio a sette ante in legno di quercia.', 1600.00, 6),
	(60,'Poltrona da Lettura Classica', 'La poltrona da lettura classica in tessuto offre comfort e charme in ogni angolo della tua casa.', 260.00, 7),
	(61,'Divano in Tessuto Moderno', 'Confortevole e moderno, il divano in tessuto moderno color grigio aggiunge stile al tuo soggiorno.', 1000.00, 1),
	(62,'Letto Matrimoniale Classico', 'Letto matrimoniale classico in legno, un elemento affascinante per camere dal tocco tradizionale.', 850.00, 2),
	(63,'Lampada da Soffitto Classica', 'Illumina con eleganza grazie alla lampada da soffitto classica a LED, perfetta per atmosfere raffinate.', 130.00, 3),
	(64,'Tavolo da Cucina Classico', 'Il tavolo da cucina classico in legno è il cuore conviviale della tua cucina, unendo tradizione e funzionalità.', 380.00, 4),
	(65,'Sedia da Giardino Moderna', 'Confortevole e moderna, la sedia da giardino moderna in plastica è ideale per momenti di relax all\'aperto.', 40.00, 5),
	(66,'Armadio a Otto Ante', 'Massimo spazio di archiviazione con stile, grazie all\'armadio a otto ante in legno di faggio.', 1800.00, 6),
	(67,'Poltrona da Ufficio Classica', 'Elegante e funzionale, la poltrona da ufficio classica in pelle offre comfort e stile nella tua area lavorativa.', 220.00, 7);

