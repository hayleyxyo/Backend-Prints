CREATE DATABASE prints;
USE prints;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
	id INT UNSIGNED AUTO_INCREMENT,
	email VARCHAR(60) NOT NULL,
	familyname VARCHAR(40) NOT NULL,
	givenname VARCHAR(40) NOT NULL,
	passwd CHAR(40) NOT NULL, -- use with sha(),
	passwdexpires DATETIME DEFAULT NULL,
	admin BOOLEAN NOT NULL DEFAULT FALSE,
	PRIMARY KEY (id),
	UNIQUE INDEX email(email)
) ENGINE=INNODB;

DROP TABLE IF EXISTS artists;
CREATE TABLE artists (
	id INT UNSIGNED AUTO_INCREMENT,
	familyname VARCHAR(40) DEFAULT NULL,
	givenname VARCHAR(40) DEFAULT NULL,
	aka VARCHAR(24) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE INDEX aka (aka)
) ENGINE=INNODB;

DROP TABLE IF EXISTS prints;
CREATE TABLE prints (
	id INT UNSIGNED AUTO_INCREMENT,
	artistid INT UNSIGNED NOT NULL,
	title VARCHAR(60) NOT NULL,
	price DECIMAL(6,2), -- ie 0000.00
	size VARCHAR(24) DEFAULT NULL,
	description TEXT DEFAULT NULL,
	src VARCHAR(48) NOT NULL,
	PRIMARY KEY (id),
	CONSTRAINT artistid FOREIGN KEY (artistid) REFERENCES artists(id) ON DELETE RESTRICT ON UPDATE RESTRICT
		--  or RESTRICT | CASCADE | SET NULL | NO ACTION
) ENGINE=INNODB;

DROP TABLE IF EXISTS orders;
CREATE TABLE orders (
	id INT UNSIGNED AUTO_INCREMENT,
	customerid INT UNSIGNED NOT NULL,
	total DECIMAL(10,2) DEFAULT NULL,
	orderdate DATETIME NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (customerid) REFERENCES users(id)
) ENGINE=INNODB;

DROP TABLE IF EXISTS orderitems;
CREATE TABLE orderitems (
	id INT UNSIGNED AUTO_INCREMENT,
	orderid INT UNSIGNED NOT NULL,
	printid INT UNSIGNED NOT NULL,
	quantity INT UNSIGNED NOT NULL DEFAULT 1,
	price DECIMAL(6,2) DEFAULT NULL,
	shipdate DATETIME DEFAULT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (orderid) REFERENCES orders(id),
	FOREIGN KEY (printid) REFERENCES prints(id)
) ENGINE=INNODB;

DELETE FROM users;
ALTER TABLE users AUTO_INCREMENT=1;
INSERT INTO users(email,familyname,givenname,passwd,admin)
VALUES ('fred@example.net','Nurkk','Fred',sha('fred'),true);

DELETE FROM artists;
ALTER TABLE artists AUTO_INCREMENT=1;
INSERT INTO artists (givenname,familyname,aka)
VALUES
	('Sandro','Boticelli','boticelli'),
	('Leonardo','Da Vinci','vinci'),
	('Michelangelo',NULL,'michelangelo'),
	('Piet','Mondrian','mondrian'),
	('Paul','Gauguin','gauguin'),
	('Albrecht','Durer','durer'),
	('Jackson','Pollock','pollock'),
	('Henri','Rousseau','rousseau'),
	('Paul','Klee','klee'),
	('Henri','Matisse','matisse'),
	('Edgar','Degas','degas'),
	('Edouard','Manet','manet'),
	('James','Whistler','whistler'),
	('Pierre-Aguste','Renoir','renoir'),
	('Rembrandt','Van Rijn','rembrandt')
;
INSERT INTO artists (givenname,familyname,aka)
VALUES
	('Hieronymus','Bosch','bosch'),
	('John','Constable','constable'),
	('Thomas','Gainsborough','gainsborough'),
	('Vincent','Van Gogh','gogh'),
	(NULL,'El Greco','greco'),
	('Juan','Gris','gris'),
	('Ando','Hiroshige','hiroshige'),
	('Amedeo','Modigiliani','modigiliani'),
	('Claude','Monet','monet'),
	('Alfred','Sisley','sisley'),
	('Joseph','Turner','turner')
;

INSERT INTO prints(artistid,title,src)
VALUES
	(1,'The Birth of Venus','botticelli.venus.jpg'),								-- Boticelli
	(2,'Portrait of Mona Lisa','joconde.jpg'),										-- Da Vinci
	(2,'The Last Supper','lastsupp.jpg'),											-- Da Vinci
	(3,'The Creation of Man','michelangelo.creation.jpg'),							-- Michelangelo
	(4,'Composition with Red, Yellow and Blue','ryb.jpg'),							-- Mondrian
	(5,'Femmes de Tahiti [Sur la plage]','gauguin.femmes-tahiti.jpg'),				-- Gaugin
	(5,'Portrait de l artiste (Self-portrait)','gauguin.portrait-artiste.jpg'),		-- Gaugin
	(6,'The Large Turf','large-turf.jpg'),											-- Albrecht Durer
	(6,'The Adoration of the Magi','magi.jpg'),										-- Albrecht Durer
	(7,'The She-Wolf','pollock.she-wolf.jpg'),										-- Jackson Pollock
	(7,'Eyes in the Heat','pollock.eyes-heat.jpg'),									-- Jackson Pollock
	(8,'Femme se promenant dans une foret exotique','rousseau.femme-exotique.jpg'),	-- Henri Rousseau
	(8,'Combat of a Tiger and a Buffalo','combat.jpg'),								-- Henri Rousseau
	(9,'Ancient Sound, Abstract on Black','klee.ancient-sound.jpg'),				-- Paul Klee
	(9,'Remembrance of a Garden','garden.jpg'),										-- Paul Klee
	(9,'1914','klee.1914.jpg'),														-- Paul Klee
	(10,'Flowers in a Pitcher','flowers.jpg'),										-- Henri Matisse
	(10,'La lecon de musique (The Music Lesson)','matisse.lecon-musique.jpg'),		-- Henri Matisse
	(10,'Deux fillettes, fond jaune et rouge','matisse.fillettes-jaune-rouge.jpg'),	-- Henri Matisse
	(11,'Les repasseuses (Women Ironing)','degas.repasseuses.jpg'),					-- Edgar Degas
	(12,'Le Bar aux Folies-Berg','manet.bar.jpg'),									-- Edouard Manet
	(12,'Le Chemin de Fer','manet.railroad.jpg'),									-- Edouard Manet
	(12,'On the Beach','manet.beach.jpg'),											-- Edouard Manet
	(13,'Portrait of the Painter''s Mother','mother.jpg'),							-- James Whistler
	(13,'Symphony in White, No. 1: The White Girl','white-girl.jpg'),				-- James Whistler
	(14,'Lady at the Piano','lady-piano.jpg'),										-- Pierre-Aguste Renoir
	(14,'On the Terrace','terrace.jpg'),											-- Pierre-Aguste Renoir
	(14,'Jeunes filles au piano','renoir.filles-piano.jpg'),						-- Pierre-Aguste Renoir
	(15,'Self-Portrait','rembrandt.1640.jpg'),										-- Rembrandt Van Rijn
	(15,'The Anatomy Lecture of Dr. Nicolaes Tulp','nicolaes-tulp.jpg')				-- Rembrandt Van Rijn
;

UPDATE prints SET description='c. 1485-86; painted for the villa of Lorenzo di Pierfrancesco de'' Medici at Castello; Tempera on canvas, 172.5 x 278.5 cm; now in the Galleria degli Uffizi in Florence' WHERE id=1;
UPDATE prints SET description='1479-1528, also known as La Gioconda, the wife of Francesco del Giocondo; 1503-06 (150 Kb); Oil on wood, 77 x 53 cm (30 x 20 7/8 in); Musee du Louvre, Paris' WHERE id=2;
UPDATE prints SET description='1498; Fresco, 460 x 880 cm (15 x 29 ft); Convent of Santa Maria delle Grazie (Refectory), Milan' WHERE id=3;
UPDATE prints SET description='(Fragment of the Sistine Chapel ceiling); 1511-12' WHERE id=4;
UPDATE prints SET description='1921; Oil on canvas, 39 x 35 cm' WHERE id=5;
UPDATE prints SET description='(Tahitian Women [On the Beach]); 1891; Oil on canvas, 69 x 91 cm (27 1/8 x 35 7/8 in); Musee d''Orsay, Paris' WHERE id=6;
UPDATE prints SET description='c. 1893-94; Oil on canvas, 46 x 38 cm (18 1/8 x 15 in); Musee d''Orsay, Paris' WHERE id=7;
UPDATE prints SET description='1503; Watercolor and gouache on paper, 41 x 32 cm; Graphische Sammlung Albertina, Vienna' WHERE id=8;
UPDATE prints SET description='1504; Oil on wood; Uffizi' WHERE id=9;
UPDATE prints SET description='1943; Oil, gouache, and plaster on canvas, 41 7/8 x 67 in; The Museum of Modern Art, New York' WHERE id=10;
UPDATE prints SET description='1946; Oil on canvas, 54 x 43 in; Peggy Guggenheim Collection, Venice' WHERE id=11;
UPDATE prints SET description='(Woman Walking in an Exotic Forest); 1905; Oil on canvas, 99.9 x 80.7 cm (39 3/8 x 31 3/4 in); The Barnes Foundation, Merion, Pennsylvania' WHERE id=12;
UPDATE prints SET description='1909; Oil on canvas, 46 x 55 cm (18 1/8 x 21 5/8 in); Hermitage, St. Petersburg' WHERE id=13;
UPDATE prints SET description='1925; Oil on cardboard, 15 x 15 in; Kunstsammlung, Basel' WHERE id=14;
UPDATE prints SET description='1914; Watercolor on linen paper mounted on cardboard, 25.2 x 21.5 cm; Kunstsammlung Nordrhein-Westfalen, Dusseldorf' WHERE id=15;
UPDATE prints SET description='(Now know not to be a genuine Klee)' WHERE id=16;
UPDATE prints SET description='1906; Canvas, 21 1/2 x 18 in; Barnes Foundation' WHERE id=17;
UPDATE prints SET description='1917; Oil on canvas, 244.7 x 200.7 cm (96 3/8 x 79 in); Barnes Foundation, Merion, PA' WHERE id=18;
UPDATE prints SET description='1947; Oil on canvas, 61 x 49.8 cm (24 x 19 3/8 in); Barnes Foundation, Merion, PA' WHERE id=19;
UPDATE prints SET description='1884 (200 Kb); Oil on canvas, 76 x 81 cm (29 7/8 x 31 7/8 in); Musee d''Orsay, Paris' WHERE id=20;
UPDATE prints SET description='1881-82; Courtauld Institute Galleries, London. This sparkling portrayal shows extensive use of peinture claire, a technique Manet himself evolved.' WHERE id=21;
UPDATE prints SET description='1872-73; Oil on canvas, 93 x 114 cm (36 1/2 x 45 in); National Gallery of Art, Washington' WHERE id=22;
UPDATE prints SET description='1873; Musée d''Orsay, Paris' WHERE id=23;
UPDATE prints SET description='(Arrangement in Grey and Black); 1871; Oil on canvas, 144.3 x 162.5 cm; Musée d''Orsay, Paris' WHERE id=24;
UPDATE prints SET description='1862; Oil on canvas, 214.6 x 108 cm; National Gallery of Art, Washington' WHERE id=25;
UPDATE prints SET description='1875; Art Institute of Chicago' WHERE id=26;
UPDATE prints SET description='1881; Oil on canvas, 100.5 x 81 cm (39 1/2 x 31 7/8"); The Art Institute of Chicago, Mr. and Mrs. Lewis Larned Collection' WHERE id=27;
UPDATE prints SET description='1892; Oil on canvas, 116 x 90 cm (45 5/8 x 35 3/8 in); Musee d''Orsay, Paris' WHERE id=28;
UPDATE prints SET description='1640; Oil on canvas, 102 x 80 cm; National Gallery, London' WHERE id=29;
UPDATE prints SET description='1632; Oil on canvas, 169.5 x 216.5 cm; The Hague, Mauritshuis' WHERE id=30;

UPDATE prints SET price=10+floor(rand()*11); -- Set random prices between 10 & 20
