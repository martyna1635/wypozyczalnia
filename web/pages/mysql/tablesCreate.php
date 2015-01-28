<?php
// import klasy database
require_once('Database.php');

$db = new Database();

$query = file_get_contents("tablesSchema.sql");

// Wykonywanie zapytań sql z pliku
if (mysqli_multi_query($db->getLink(), $query))
     echo "=> Pomyslnie utworzono bazę danych ";
else 
     echo "=> Wystąpił jakiś błąd przy tworzenie bazy danych [może jest już w bazie danych ???]";