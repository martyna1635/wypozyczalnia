<?php
//import bilbioteki movie
require '../mysql/Order.php';

header('Content-Type: application/json');


$order = new Order(); 


// Zwraca 0 lub 1 jeśli pomyslnie utworzono
$data = [
	'created' => ($order->create($_POST[$_SESSION['userId']], $_POST['movieId']))?0:1
	];

echo json_encode($data);

