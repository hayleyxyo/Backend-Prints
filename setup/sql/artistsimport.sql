USE prints;
DELETE FROM artists;
INSERT INTO artists (id,givenname,familyname,aka)
VALUES
	(1,'Sandro','Boticelli','boticelli'),
	(2,'Leonardo','Da Vinci','davinci'),
	(3,'Michelangelo',NULL,'michelangelo'),
	(4,'Piet','Mondrian','mondrian'),
	(5,'Paul','Gauguin','gauguin'),
	(6,'Albrecht','Durer','durer'),
	(7,'Jackson','Pollock','pollock'),
	(8,'Henri','Rousseau','rousseau'),
	(9,'Paul','Klee','klee'),
	(10,'Henri','Matisse','matisse'),
	(11,'Edgar','Degas','degas'),
	(12,'Edouard','Manet','manet'),
	(13,'James','Whistler','whistler'),
	(14,'Pierre-Aguste','Renoir','renoir'),
	(15,'Rembrandt','Van Rijn','rembrandt')
;
INSERT INTO artists (givenname,familyname,aka)
VALUES
	(16,'Hieronymus','Bosch','bosch'),
	(17,'John','Constable','constable'),
	(18,'Thomas','Gainsborough','gainsborough'),
	(19,'Vincent','Van Gogh','vangogh'),
	(20,NULL,'El Greco','elgreco'),
	(21,'Juan','Gris','gris'),
	(22,'Ando','Hiroshige','hiroshige'),
	(23,'Amedeo','Modigiliani','modigiliani'),
	(24,'Claude','Monet','monet'),
	(25,'Alfred','Sisley','sisley'),
	(26,'Joseph','Turner','turner')
;
ALTER TABLE artists AUTO_INCREMENT=27;
