<?php
	class Data {
		//	Data:	Generic
			protected $pdo=null;
			protected $data=array();
			protected $errors=array();

		//	Data:	Specific
			protected $sql=array();

		//	Constructor
			function __construct($pdo) { }

		//	Model:	Generic
			function execute() { }
			function select() { }
			function insert() { }
			function update() { }
			function delete() { }

			function exists() { }

		//	View:	Generic
			function showErrors() { }

		//	View:	Specific
			function showList() { }


		//	Model:	Specific

			function getData() { }
			function checkErrors() {}


		//	Controller

			function process() {
				//	select
				//	insert
				//	update
				//	delete
			}


	}
?>
