USE ecommerce_mobili;
#INSERT INTO utente (nome, cognome, id_ruolo) VALUES ('Jacopo', 'Corbani', 2);
#INSERT INTO credenziali (nome_utente, password_utente, id_utente) VALUES ('jacopocorbani', '$2y$10$EmSbNtztnB7zmUD3ijYob.cq8h5sQbbtZInA1DzWSZYUw.ctKMhv2', 1);

INSERT INTO prodotti(nome, descrizione, prezzo, id_categoria) VALUES
	('Divano Moderno', 'Divano moderno in pelle', 1200.00, 1),
	('Letto Matrimoniale', 'Letto matrimoniale in legno massello', 800.00, 2),
	('Lampada da Tavolo', 'Lampada da tavolo in stile industriale', 70.00, 3),
	('Tavolo da Pranzo', 'Tavolo da pranzo in rovere', 600.00, 4),
	('Sedia da Ufficio', 'Sedia da ufficio ergonomica', 150.00, 5),
	('Armadio a Due Ante', 'Armadio a due ante in legno di pino', 500.00, 6),
	('Poltrona Reclinabile', 'Poltrona reclinabile in tessuto', 250.00, 7),
	('Credenza Vintage', 'Credenza vintage in legno massello', 700.00, 8),
	('Libreria a Muro', 'Libreria a muro in metallo e legno', 200.00, 9),
	('Scaffale Metallico', 'Scaffale metallico per garage', 100.00, 10),
	('Cassettiera Bianca', 'Cassettiera bianca con 5 cassetti', 80.00, 11),
	('Mobile da Bagno', 'Mobile da bagno con specchio', 300.00, 12),
	('Tavolo da Giardino', 'Tavolo da giardino in rattan', 120.00, 13),
	('Divano Chesterfield', 'Divano Chesterfield in pelle', 1500.00, 1),
	('Letto Singolo', 'Letto singolo con contenitore', 400.00, 2),
	('Lampada da Terra', 'Lampada da terra in stile moderno', 90.00, 3),
	('Tavolino da Caffè', 'Tavolino da caffè in vetro', 200.00, 4),
	('Sedia da Pranzo', 'Sedia da pranzo in legno massello', 60.00, 5),
	('Armadio a Tre Ante', 'Armadio a tre ante in legno di quercia', 800.00, 6),
	('Poltrona da Lettura', 'Poltrona da lettura in tessuto', 300.00, 7);


INSERT INTO prodotti(nome, descrizione, prezzo, id_categoria) VALUES
	('Divano in Tessuto', 'Divano in tessuto color grigio', 900.00, 1),
	('Letto a Castello', 'Letto a castello in metallo', 500.00, 2),
	('Lampada da Soffitto', 'Lampada da soffitto a LED', 120.00, 3),
	('Tavolo da Cucina', 'Tavolo da cucina in acciaio inossidabile', 350.00, 4),
	('Sedia da Giardino', 'Sedia da giardino in plastica', 30.00, 5),
	('Armadio a Quattro Ante', 'Armadio a quattro ante in legno di faggio', 1000.00, 6),
	('Poltrona da Ufficio', 'Poltrona da ufficio in pelle', 200.00, 7),
	('Credenza Moderna', 'Credenza moderna in MDF', 400.00, 8),
	('Libreria a Colonna', 'Libreria a colonna in legno massello', 250.00, 9),
	('Scaffale in Plastica', 'Scaffale in plastica per uso domestico', 50.00, 10),
	('Cassettiera in Legno', 'Cassettiera in legno con 3 cassetti', 120.00, 11),
	('Mobile da Bagno Moderno', 'Mobile da bagno moderno con lavabo', 450.00, 12),
	('Sedia da Giardino', 'Sedia da giardino in legno', 80.00, 13);

INSERT INTO prodotti(nome, descrizione, prezzo, id_categoria) VALUES
	('Divano Classico', 'Divano classico in tessuto', 700.00, 1),
	('Letto Singolo Moderno', 'Letto singolo moderno con contenitore', 300.00, 2),
	('Lampada da Parete', 'Lampada da parete a LED', 50.00, 3),
	('Tavolo da Caffè Moderno', 'Tavolo da caffè moderno in vetro', 150.00, 4),
	('Sedia da Pranzo Moderna', 'Sedia da pranzo moderna in legno', 40.00, 5),
	('Armadio a Cinque Ante', 'Armadio a cinque ante in legno di faggio', 1200.00, 6),
	('Poltrona da Ufficio Moderna', 'Poltrona da ufficio moderna in pelle', 180.00, 7),
	('Credenza Classica', 'Credenza classica in legno massello', 500.00, 8),
	('Libreria a Terra', 'Libreria a terra in metallo e legno', 220.00, 9),
	('Scaffale in Legno', 'Scaffale in legno per uso domestico', 70.00, 10),
	('Cassettiera Moderna', 'Cassettiera moderna con 4 cassetti', 100.00, 11),
	('Mobile da Bagno Classico', 'Mobile da bagno classico con lavabo', 350.00, 12),
	('Sedia da Giardino Moderna', 'Sedia da giardino moderna in legno', 60.00, 13),
	('Divano in Pelle', 'Divano in pelle color marrone', 1300.00, 1),
	('Letto Matrimoniale Moderno', 'Letto matrimoniale moderno con contenitore', 900.00, 2),
	('Lampada da Soffitto Moderna', 'Lampada da soffitto moderna a LED', 140.00, 3),
	('Tavolo da Cucina Moderno', 'Tavolo da cucina moderno in acciaio inossidabile', 400.00, 4),
	('Sedia da Giardino Classica', 'Sedia da giardino classica in plastica', 20.00, 5),
	('Armadio a Sei Ante', 'Armadio a sei ante in legno di quercia', 1400.00, 6),
	('Poltrona da Lettura Moderna', 'Poltrona da lettura moderna in tessuto', 280.00, 7);

INSERT INTO prodotti(nome, descrizione, prezzo, id_categoria) VALUES
	('Divano in Velluto', 'Divano in velluto color blu', 1100.00, 1),
	('Letto Singolo Classico', 'Letto singolo classico in legno', 350.00, 2),
	('Lampada da Tavolo Moderna', 'Lampada da tavolo moderna a LED', 60.00, 3),
	('Tavolo da Caffè Classico', 'Tavolo da caffè classico in legno', 180.00, 4),
	('Sedia da Pranzo Classica', 'Sedia da pranzo classica in legno', 50.00, 5),
	('Armadio a Sette Ante', 'Armadio a sette ante in legno di quercia', 1600.00, 6),
	('Poltrona da Lettura Classica', 'Poltrona da lettura classica in tessuto', 260.00, 7),
	('Divano in Tessuto Moderno', 'Divano in tessuto moderno color grigio', 1000.00, 1),
	('Letto Matrimoniale Classico', 'Letto matrimoniale classico in legno', 850.00, 2),
	('Lampada da Soffitto Classica', 'Lampada da soffitto classica a LED', 130.00, 3),
	('Tavolo da Cucina Classico', 'Tavolo da cucina classico in legno', 380.00, 4),
	('Sedia da Giardino Moderna', 'Sedia da giardino moderna in plastica', 40.00, 5),
	('Armadio a Otto Ante', 'Armadio a otto ante in legno di faggio', 1800.00, 6),
	('Poltrona da Ufficio Classica', 'Poltrona da ufficio classica in pelle', 220.00, 7);

