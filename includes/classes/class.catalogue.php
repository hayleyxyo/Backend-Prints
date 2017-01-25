<?php
	require_once "$root/includes/classes/class.db.php";
	class Catalogue extends DB {
			protected $sql=array(
				'selectAll'=>'SELECT prints.id,title,src,price,givenname,familyname
					FROM PRINTS JOIN artists ON prints.artistid=artists.id',
				'select'=>'SELECT prints.id,title,src,price,givenname,familyname
					FROM PRINTS JOIN artists ON prints.artistid=artists.id
				 	WHERE id=?;',

			);
	}
?>
