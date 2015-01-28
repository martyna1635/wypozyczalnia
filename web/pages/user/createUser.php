<?php
session_start();
require '../mysql/User.php';


header('Content-Type: application/json');


$user = new User(); 


// Zwraca 0 lub 1 jeśli pomyslnie utworzono
$data = ['created' => ($user->create($_POST['reg_username'], $_POST['reg_password']))?0:1];

echo json_encode($data);


//Ustawianie danych sesji
$_SESSION["isLogged"] = "1";
$_SESSION["username"] = $_POST['username'];
