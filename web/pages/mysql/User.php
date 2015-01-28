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
	function create($name, $password)
	{
		// Zwaraca true w przypadku pomyslnego utworzenia użytkownika
		if ($this->db->query("INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, '$name', '$password')"))
			return true; else
			return false;
	}
	//funkcja sprawdzająca czy login nie jest juz zajęty
	function loginExist($name){
		$result = $this->db->query("SELECT * FROM `users` WHERE `username` = '$name'");
		if ($result->num_rows == 0)
			return false; else
			return true;
	}

	//sprawdzanie czy login i hasło sa poprawne
	function checkAuth($name, $password){
		$result = $this->db->query("SELECT * FROM `users` WHERE `username` = '$name' AND `password` = '$password'");
		if ($result->num_rows == 0)
			return false; else
			return true;
	}
	function getUsers()
	{
		$result = $this->db->query("SELECT * FROM `users`");
		
		return $result->theResult;
	}
	//pobieranei nazwy po id
	function getById($userId){

		return $this->db->query("SELECT * FROM `users` WHERE `id`='$userId'")->getResult();
	}
	//pobieranei id użytkownika po nazwie
	function getById($username){

		return $this->db->query("SELECT * FROM `users` WHERE `username`='$username'")->getResult();
	}
}

