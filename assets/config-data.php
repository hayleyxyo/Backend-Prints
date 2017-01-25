#	<?php die('There is nothing to see here ... Go back to your homes ...'); ?>
#
#	This contains the configuration data. It is processed by the file
#		config.php
#
#	You can change the data, but it’s pointless adding or removing items
#	unless you’ve made changes to the dependant code.
#
#	As you can see, lines starting with a hash (#) are comments.
#
#	Data is in the form:
#		item		data
#	where there can be any number of spaces between the item and its data.
#	The data itself may also contain additional spaces.
#
#	Items beginning with the exclaimation mark (!) will become constants.
#	Other items will be elements in the global $CONFIG array.

#	Development
	!DEVELOPMENT		1
	!LIVE				1

#	Database

	!MYSQLHOST	localhost
	!USER		printsadmin
	!PASSWORD	password
	!DATABASE	prints


#	$CONFIG Array
	previewwidth		640
	previewheight		480
	thumbnailwidth		160
	thumbnailheight		120
	cartthumbwidth		40
	cartthumbheight		30

	imagefolder			images
	originalfolder		images/original
	thumbnailfolder		images/thumbnails
	sepiafolder			images/thumbnails2
	previewfolder		images/preview
	cartthumbfolder		images/cart

	cataloguepagesize	3

	supplieremail		me@example.net
