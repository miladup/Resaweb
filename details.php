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

$sql = "SELECT cabanes.*, GROUP_CONCAT(photos.nom_photo SEPARATOR ',') AS photos
        FROM cabanes
        LEFT JOIN photos ON cabanes.id_cabane = photos.id_cabane
        WHERE cabanes.id_cabane = $id_cabane
        GROUP BY cabanes.id_cabane";
$result = $conn->query($sql);

$cabane = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="details.css">
    <link href="https://fonts.cdnfonts.com/css/happy-camper" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Réservation</title>
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
    <main>
        <section class="all">
            <section class="images">
                <section class="main-image">
                    <img id="main-img" src="photos/<?php echo explode(',', $cabane['photos'])[0]; ?>" alt="Main Image">
                </section>
                <section class="thumbnails">
                    <?php 
                    $photos = explode(',', $cabane['photos']);
                    foreach ($photos as $photo) :
                    ?>
                        <img class="thumbnail" src="photos/<?php echo $photo; ?>" alt="Thumbnail" onclick="changeMainImage(this)">
                    <?php endforeach; ?>
                </section>
            </section>
            <section class="description">
                <h2><?php echo $cabane['nom_cabane']; ?></h2>
                <p><?php echo $cabane['description_cabane']; ?></p>
                <div class="price">
                    <span><?php echo number_format($cabane['prix_par_nuit'], 2); ?>€/nuit</span>
                    <a href="formulaire.php?id=<?php echo $cabane['id_cabane']; ?>&prix=<?php echo $cabane['prix_par_nuit']; ?>" class="reserve-button">Je réserve</a>
                </div>
            </section>
        </section>
    </main>
<script>
    function changeMainImage(element) {
        document.getElementById('main-img').src = element.src;
    }
</script>
</body>
</html>

<?php
// Fermer la connexion
$conn->close();
?>
