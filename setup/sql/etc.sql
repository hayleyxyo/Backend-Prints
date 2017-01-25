USE prints;
DROP VIEW IF EXISTS printdetails;
CREATE VIEW printdetails AS
SELECT prints.id,title,price,description,src,filename,familyname,givenname, concat(givenname,' ',familyname) AS artistname
FROM prints INNER JOIN artists ON prints.artistid=artists.id;
