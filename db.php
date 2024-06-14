<?php
$servername = "localhost";
$username = "duperrier";
$password = "zj5CdWswqs6MTqZ";
$dbname = "duperrier_resaweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
echo "Connexion réussie";
?>
