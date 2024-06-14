<?php
$servername = "localhost";
$username = "duperrier";
$password = "zj5CdWswqs6MTqZ";
$dbname = "duperrier_resaweb";

$conn = new mysqli($servername, $username, $password, $dbname);

$current_page = basename($_SERVER['PHP_SELF']);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
$conn->set_charset("utf8");

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Requête pour récupérer les informations des cabanes
$sql = "SELECT cabanes.*, categories.nom_categorie, GROUP_CONCAT(photos.nom_photo SEPARATOR ',') AS photos
        FROM cabanes
        JOIN categories ON cabanes.id_categorie = categories.id_categorie
        LEFT JOIN photos ON cabanes.id_cabane = photos.id_cabane";

// Ajout de la clause de recherche (nom de la cabane)
if ($search) {
    $sql .= " WHERE cabanes.nom_cabane LIKE '%$search%' ";
}

$sql .= " GROUP BY cabanes.id_cabane
          ORDER BY FIELD(categories.nom_categorie, 'romantique', 'nature', 'aventure')"; // Tri personnalisé par catégorie

$result = $conn->query($sql);


$cabanesParCategorie = [];

while ($row = $result->fetch_assoc()) {
    $cabanesParCategorie[$row['nom_categorie']][] = $row;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cabanes.css">
    <link href="https://fonts.cdnfonts.com/css/happy-camper" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Nos Cabanes</title>
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
                <li><a class="nav-link <?php if ($current_page == 'cabanes.php') echo 'active'; ?>" href="cabanes.php">Nos cabanes</a></li>
                <li><a class="nav-link <?php if ($current_page == 'services.php') echo 'active'; ?>" href="services.php">Services</a></li>
                <li><a class="nav-link <?php if ($current_page == 'apropos.php') echo 'active'; ?>" href="apropos.php">A propos</a></li>
            </ul>
        </nav>
    </div>
        <h1>Nos hébergements insolites</h1>
    </header>

    <div class="sort-search-container">
    <div class="sort-options">
        <label for="sort">Trier par :</label>
        <select id="sort" onchange="sortCabanes()">
            <option value="nom_cabane">Nom</option>
            <option value="prix_par_nuit">Prix</option>
            <option value="max_personnes">Nombre de personnes</option>
        </select>
    </div>

    <div class="search-container">
        <form action="cabanes.php" method="get">
            <label for="search"></label>
            <input type="text" id="search" name="search" placeholder="Rechercher des cabanes..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Rechercher</button>
        </form>
    </div>
</div>

    <div id="cabanes-container">
    <?php foreach ($cabanesParCategorie as $categorie => $cabanes) : ?>
        <section id="<?php echo strtolower($categorie); ?>" class="category <?php echo strtolower($categorie); ?>">
            <h2><?php echo $categorie; ?></h2>
            <?php foreach ($cabanes as $row) : ?>
                <section class="block" data-nom_cabane="<?php echo $row['nom_cabane']; ?>" data-prix_par_nuit="<?php echo $row['prix_par_nuit']; ?>" data-max_personnes="<?php echo $row['max_personnes']; ?>">
                    <div class="image-slider">
                        <div class="slider">
                            <?php 
                            $photos = explode(',', $row['photos']);
                            foreach ($photos as $index => $photo) :
                                $activeClass = $index === 0 ? 'active' : '';
                            ?>
                                <img class="slider-img <?php echo $activeClass; ?>" src="photos/<?php echo $photo; ?>" alt="">
                            <?php endforeach; ?>
                        </div>
                        <button class="prev" onclick="prevSlide(this)">&#10094;</button>
                        <button class="next" onclick="nextSlide(this)">&#10095;</button>
                    </div>
                    <div>
                        <h3><?php echo $row['nom_cabane']; ?></h3>
                        <p class="description"><?php echo $row['description_cabane']; ?></p>
                        <div class="block-footer">
                            <div class="left-info">
                                <span class="price"><strong><?php echo number_format($row['prix_par_nuit'], 2); ?>€/nuit,</strong></span>
                                <span class="persons">maximum <?php echo $row['max_personnes']; ?> personnes</span>
                            </div>
                            <button class="reserve-button" onclick="window.location.href='details.php?id=<?php echo $row['id_cabane']; ?>'">Voir plus</button>
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>
        </section>
    <?php endforeach; ?>
    </div>

    <div id="footer-placeholder"></div>
    <script src="script.js" defer></script>  
</body>
</html>
