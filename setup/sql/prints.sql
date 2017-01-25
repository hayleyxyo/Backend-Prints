DROP DATABASE IF EXISTS prints;

CREATE DATABASE prints;
USE prints;

DELETE FROM mysql.user WHERE user='printsadmin';
CREATE USER 'printsadmin'@'localhost' IDENTIFIED BY 'admin';
GRANT SELECT,INSERT,UPDATE,DELETE ON prints.*  TO 'printsadmin'@'localhost';
