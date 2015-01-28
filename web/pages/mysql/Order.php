<?php
require_once('Database.php');
class Order {
	// zmienna przetrzymujaca obiekt bazy danych
	private $db; 
	function __construct()
	{
		$this->db = new Database();
	}

	//funkcja tworząca nowe zamowienie
	function create( $userId, $movieId){
		if ($this->db->query("INSERT INTO `orders` (`userd_id`, `movie_id`) VALUES ('$userId', '$movieId');"))
			return true; else
			return false;

	}
	//pobieramy wszystkie zamowienia (tylko dla admina)
	function getAll(){

		return $this->db->query("SELECT * FROM `orders`")->getResult();
	}
	//pobieramy zamowniea konkretnego użytkownika
	function getUserAll($userId){

		return $this->db->query("SELECT * FROM `orders` WHERE `userd_id` = '$userId'")->getResult();
	}


}
