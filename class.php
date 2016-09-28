<?php


class quizdb {
	
	public $db;

	function __construct($host, $dbname, $user, $password) {
		try {
			return $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
		} catch(Exception $e) {
			echo "Error: " . $e;
		}
	}

	public function get_questions() {
		$this->result = $this->db->query('SELECT * FROM quiz_questions ORDER BY rand() LIMIT 12');

		if ( $this->result->rowCount() > 0 ) {
			return $this->result->fetchAll(PDO::FETCH_ASSOC);
		}
		
		
	}
}

