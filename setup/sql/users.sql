USE prints;
DROP TABLE IF EXISTS users;
CREATE TABLE users (
	id INT UNSIGNED AUTO_INCREMENT,
	email VARCHAR(60) NOT NULL,
	familyname VARCHAR(40) NOT NULL,
	givenname VARCHAR(40) NOT NULL,
	password VARCHAR(255) NOT NULL,				--	Test@123
	confirmation CHAR(23) DEFAULT NULL,			--	uniqid('',false)
	updated DATETIME,							--	DEFAULT now(), (only new MySQL)
	passwordexpires DATETIME DEFAULT NULL,		--	unused
	admin BOOLEAN NOT NULL DEFAULT FALSE,		--	web data administrators
	contributor BOOLEAN NOT NULL DEFAULT FALSE,	--	unused, could be for self-registered artists
	cart TEXT DEFAULT NULL,						--	doubles up as wish list
	active BOOLEAN NOT NULL DEFAULT FALSE,		--	only after confirmation process
	PRIMARY KEY (id),
	UNIQUE INDEX email(email)
) ENGINE=INNODB;
