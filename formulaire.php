<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resaweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$id_cabane = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$prix_par_nuit = isset($_GET['prix']) ? (float)$_GET['prix'] : 0.0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulaire.css">
    <link href="https://fonts.cdnfonts.com/css/happy-camper" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Les Cabanes</title>
    <link rel="icon" href="photos/favicon.png">
</head>
<body>
    <header>
        <div class="nav-container">
            <nav>
                <a href="index.php">
                    <span class="sr-only">Retour à l'accueil</span>
                    <img class="logo" src="photos/logo-long-marron.png" alt="Logo">
                </a>
                <ul class="nav">
                    <li><a class="nav-link" href="cabanes.php">Nos cabanes</a></li>
                    <li><a class="nav-link" href="services.html">Services</a></li>
                    <li><a class="nav-link" href="apropos.html">A propos</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <form action="envoie_formulaire.php" method="POST">
        <legend>Réservez notre cabane !</legend>
  
        <div class="inputBox">
            <input type="text" name="prenom" id="prenom" required="required">
            <label for="prenom">Prénom</label>
        </div>
  
        <div class="inputBox">
            <input type="text" name="nom" id="nom" required="required">
            <label for="nom">Nom</label>
        </div>

        <div class="inputBox">
            <input type="email" name="email" id="email" required="required">
            <label for="email">Email</label>
        </div>
  
        <div class="inputBox">
            <input type="date" name="date_debut" id="date_debut" required="required">
            <label for="date_debut">Date de début</label>
        </div>
  
        <div class="inputBox">
            <input type="date" name="date_fin" id="date_fin" required="required">
            <label for="date_fin">Date de fin</label>
        </div>

        <input type="hidden" name="id_cabane" value="<?php echo $id_cabane; ?>">
        <input type="hidden" name="prix_par_nuit" value="<?php echo $prix_par_nuit; ?>">
  
        <input type="submit" name="submit" id="Envoi" value="Envoyer">
    </form>

    <!-- JavaScript pour la couleur des champs de date -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const dateInputs = document.querySelectorAll('input[type="date"]');
        
        dateInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.color = 'black';
            });
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.style.color = 'beige';
                }
            });
        });
    });
    </script>
</body>
</html>

<?php
$conn->close();
?>
