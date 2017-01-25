USE prints;
DELETE FROM prints;

INSERT INTO prints(id,artistid,title,src,filename)
VALUES
	(1,1,'The Birth of Venus','venus-000001.jpg','venus.jpg'),												-- Boticelli
	(2,2,'Portrait of Mona Lisa','mona-lisa-000002.jpg','mona-lisa.jpg'),									-- Da Vinci
	(3,2,'The Last Supper','last-supper-000003.jpg','last-supper.jpg'),										-- Da Vinci
	(4,3,'The Creation of Man','creation-man-000004.jpg','creation-man.jpg'),								-- Michelangelo
	(5,4,'Composition with Red, Yellow and Blue','composition-ryb-000005.jpg','composition-ryb.jpg'),		-- Mondrian

	(6,5,'Femmes de Tahiti [Sur la plage]','femmes-tahiti-000006.jpg','femmes-tahiti.jpg'),					-- Gaugin
	(7,5,'Portrait de l artiste (Self-portrait)','portrait-artiste-000007.jpg','portrait-artiste.jpg'),		-- Gaugin
	(8,6,'The Large Turf','large-turf-000008.jpg','large-turf.jpg'),										-- Albrecht Durer
	(9,6,'The Adoration of the Magi','adoration-magi-000009.jpg','adoration-magi.jpg'),						-- Albrecht Durer
	(10,7,'The She-Wolf','she-wolf-000010.jpg','she-wolf.jpg'),												-- Jackson Pollock

	(11,7,'Eyes in the Heat','eyes-heat-000011.jpg','eyes-heat.jpg'),										-- Jackson Pollock
	(12,8,'Femme se promenant dans une foret exotique','femme-promenade-000012.jpg','femme-promenade.jpg'),	-- Henri Rousseau
	(13,8,'Combat of a Tiger and a Buffalo','combat-tiger-buffalo-000013.jpg','combat-tiger-buffalo.jpg'),	-- Henri Rousseau
	(14,9,'Ancient Sound, Abstract on Black','ancient-sound-000014.jpg','ancient-sound.jpg'),				-- Paul Klee
	(15,9,'Remembrance of a Garden','remembrance-garden-000015.jpg','remembrance-garden.jpg'),				-- Paul Klee

	(16,9,'1914','1914-000016.jpg','1914.jpg'),																-- Paul Klee
	(17,10,'Flowers in a Pitcher','flowers-pitcher-000071.jpg','flowers-pitcher.jpg'),						-- Henri Matisse
	(18,10,'La lecon de musique (The Music Lesson)','lecon-musique-000018.jpg','lecon-musique.jpg'),		-- Henri Matisse
	(19,10,'Deux fillettes, fond jaune et rouge','deux-fillettes-000019.jpg','deux-fillettes.jpg'),			-- Henri Matisse
	(20,11,'Les repasseuses (Women Ironing)','repasseuses-000020.jpg','repasseuses.jpg'),					-- Edgar Degas

	(21,12,'Le Bar aux Folies-Berg','bar-folies-berg-000021.jpg','bar-folies-berg.jpg'),					-- Edouard Manet
	(22,12,'Le Chemin de Fer','chemin-de-fer-000022.jpg','chemin-de-fer.jpg'),								-- Edouard Manet
	(23,12,'On the Beach','beach-000023.jpg','beach.jpg'),													-- Edouard Manet
	(24,13,'Portrait of the Painter’s Mother','painter-mother-000024.jpg','painter-mother.jpg'),			-- James Whistler
	(25,13,'Symphony in White, No. 1: The White Girl','white-girl-000025.jpg','white-girl.jpg'),			-- James Whistler

	(26,14,'Lady at the Piano','lady-piano-000026.jpg','lady-piano.jpg'),									-- Pierre-Aguste Renoir
	(27,14,'On the Terrace','terrace-000027.jpg','terrace.jpg'),											-- Pierre-Aguste Renoir
	(28,14,'Jeunes filles au piano','filles-piano-000028.jpg','filles-piano.jpg'),							-- Pierre-Aguste Renoir
	(29,15,'Self-Portrait','self-portrait-000029.jpg','self-portrait.jpg'),									-- Rembrandt Van Rijn
	(30,15,'The Anatomy Lecture of Dr. Nicolaes Tulp','nicolaes-tulp-000030.jpg','nicolaes-tulp.jpg')		-- Rembrandt Van Rijn
;

UPDATE prints SET description='c. 1485-86; painted for the villa of Lorenzo di Pierfrancesco de’ Medici at Castello; Tempera on canvas, 172.5 x 278.5 cm; now in the Galleria degli Uffizi in Florence' WHERE id=1;
UPDATE prints SET description='1479-1528, also known as La Gioconda, the wife of Francesco del Giocondo; 1503-06 (150 Kb); Oil on wood, 77 x 53 cm (30 x 20 7/8 in); Musee du Louvre, Paris' WHERE id=2;
UPDATE prints SET description='1498; Fresco, 460 x 880 cm (15 x 29 ft); Convent of Santa Maria delle Grazie (Refectory), Milan' WHERE id=3;
UPDATE prints SET description='(Fragment of the Sistine Chapel ceiling); 1511-12' WHERE id=4;
UPDATE prints SET description='1921; Oil on canvas, 39 x 35 cm' WHERE id=5;
UPDATE prints SET description='(Tahitian Women [On the Beach]); 1891; Oil on canvas, 69 x 91 cm (27 1/8 x 35 7/8 in); Musee d’Orsay, Paris' WHERE id=6;
UPDATE prints SET description='c. 1893-94; Oil on canvas, 46 x 38 cm (18 1/8 x 15 in); Musee d’Orsay, Paris' WHERE id=7;
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
UPDATE prints SET description='1884 (200 Kb); Oil on canvas, 76 x 81 cm (29 7/8 x 31 7/8 in); Musee d’Orsay, Paris' WHERE id=20;
UPDATE prints SET description='1881-82; Courtauld Institute Galleries, London. This sparkling portrayal shows extensive use of peinture claire, a technique Manet himself evolved.' WHERE id=21;
UPDATE prints SET description='1872-73; Oil on canvas, 93 x 114 cm (36 1/2 x 45 in); National Gallery of Art, Washington' WHERE id=22;
UPDATE prints SET description='1873; Musée d’Orsay, Paris' WHERE id=23;
UPDATE prints SET description='(Arrangement in Grey and Black); 1871; Oil on canvas, 144.3 x 162.5 cm; Musée d’Orsay, Paris' WHERE id=24;
UPDATE prints SET description='1862; Oil on canvas, 214.6 x 108 cm; National Gallery of Art, Washington' WHERE id=25;
UPDATE prints SET description='1875; Art Institute of Chicago' WHERE id=26;
UPDATE prints SET description='1881; Oil on canvas, 100.5 x 81 cm (39 1/2 x 31 7/8"); The Art Institute of Chicago, Mr. and Mrs. Lewis Larned Collection' WHERE id=27;
UPDATE prints SET description='1892; Oil on canvas, 116 x 90 cm (45 5/8 x 35 3/8 in); Musee d’Orsay, Paris' WHERE id=28;
UPDATE prints SET description='1640; Oil on canvas, 102 x 80 cm; National Gallery, London' WHERE id=29;
UPDATE prints SET description='1632; Oil on canvas, 169.5 x 216.5 cm; The Hague, Mauritshuis' WHERE id=30;

UPDATE prints SET price=10+floor(rand()*11); -- Set random prices between 10 & 20

ALTER TABLE prints AUTO_INCREMENT=31;
