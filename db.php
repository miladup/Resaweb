<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "resaweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
echo "Connexion réussie";
?>
