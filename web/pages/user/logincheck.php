<?PHP
// Umportowanie klasy user
session_start();
require '../mysql/User.php';
// Ustawianie nagłówków dla ajax (json)
header('Content-Type: application/json');

//Tworzenie klasy user
$user = new User();
// Sprawdzanie czy użytkownik podane dane są prawidłowe
$success = $user->checkAuth($_POST['username'], $_POST['password']);

$data = [
		'success' => $success?1:0
		];


echo json_encode($data);

// Nie ustawiaj sesji gdy dane są niepoprawne
if (!$success)
	exit();

//Ustawianie danych sesji
$_SESSION["isLogged"] = "1";
$_SESSION["username"] = $_POST['username'];
