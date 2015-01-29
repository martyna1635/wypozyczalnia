<?php
//import bilbioteki movie
require '../mysql/Movie.php';

header('Content-Type: application/json');


$movie = new Movie(); 
//usuwanie filmu
$movie->delete($_GET['id']);