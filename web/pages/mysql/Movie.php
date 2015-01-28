<?php
require_once('Database.php');
class User {
	// zmienna przetrzymujaca obiekt bazy danych
	private $db; 
	function __construct()
	{
		$this->db = new Database();
	}

	//funkcja tworząca nowego użytkownika
	function create($name, $password){

		return true;
	}
	//funkcja sprawdzająca czy login nie jest juz zajęty
	function loginExist($name){
		return true;
	}

	//sprawdzanie czy login i hasło sa poprawne
	function checkAuth($name, password){

		return true;
	}

}