<?php
	class DB{
		private $pdo;
		protected $sql=array();

		public function __construct($pdo) {
			$this->pdo=$pdo;
		}

		public function insert(array $data) {
			$prepared=$this->pdo->prepare($this->sql['insert']);
			$prepared->execute($data);
			return $this->pdo->lastInsertId();

		}
		public function update(array $data) {
			$prepared=$this->pdo->prepare($this->sql['update']);
			$prepared->execute($data);
			return true;

		}
		public function delete(array $data) {
			$prepared=$this->pdo->prepare($this->sql['delete']);
			$prepared->execute($data);
			return true;

		}
		public function select(array $data) {
			$prepared=$this->pdo->prepare($this->sql['select']);
			$prepared->execute($data);
			return $prepared->fetch();
		}
		public function selectAll(array $data) {

			$prepared=$this->pdo->prepare($this->sql['selectAll']);
			$prepared->execute($data);
			return $prepared;
		}
		public function selectSome(array $data) {
			$limit=intval($data[0]);
			$offset=intval($data[1]);

			return $this->pdo->query("{$this->sql['selectAll']} LIMIT $limit OFFSET $offset");
		}

	}
