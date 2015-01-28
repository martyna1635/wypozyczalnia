<?php
require_once('Database.php');
class Movie {
	// zmienna przetrzymujaca obiekt bazy danych
	private $db; 
	function __construct()
	{
		$this->db = new Database();
	}

	//funkcja tworząca nowy film
	function create($title, $description, $price){
		// Zwaraca true w przypadku pomyslnego utworzenia użytkownika
		if ($this->db->query("INSERT INTO `movies` (`title`, `description`, `price`) VALUES ('$title', '$description', '$price');"))
			return true; else
			return false;

	}
	//pobieramy wszystkie filmy i wysyłamy je do "obróbki" dalej
	function getAll(){

		return $this->db->query("SELECT * FROM `movies`")->getResult();
	}


}
