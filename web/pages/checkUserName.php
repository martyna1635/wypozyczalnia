<?PHP
require 'mysql/User.php';


header('Content-Type: application/json');


$user = new User; 
// Zwraca 0 lub 1 jeśli jest wolne
$data = ['isFree' => $user->loginExist($_GET['login'])?0:1];

echo json_encode($data);