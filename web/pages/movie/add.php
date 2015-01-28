<?php
//import bilbioteki movie
require '../mysql/Movie.php';

header('Content-Type: application/json');


$movie = new Movie(); 


// Zwraca 0 lub 1 jeśli pomyslnie utworzono
$data = [
	'created' => ($movie->create($_POST['movie_title'], $_POST['movie_description'], $_POST['movie_price']))?0:1
	];

echo json_encode($data);

