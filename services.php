<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="services.css">
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
                <img class="logo" src="photos/logo-long-marron.png" alt="Accueil">
            </a>
            <ul class="nav">
                <li><a class="nav-link <?php if ($current_page == 'cabanes.php') echo 'active'; ?>" href="cabanes.php">Nos cabanes</a></li>
                <li><a class="nav-link <?php if ($current_page == 'services.php') echo 'active'; ?>" href="services.php">Services</a></li>
                <li><a class="nav-link <?php if ($current_page == 'apropos.php') echo 'active'; ?>" href="apropos.php">A propos</a></li>
            </ul>
        </nav>
    </div>
    <h1>Nos services</h1>
</header>

<section class="services">
<div class="service">
    <h2>Repas</h2>
    <p>Savourez des repas délicieux livrés directement à votre cabane. Notre menu varié utilise des ingrédients frais et de saison pour des plats locaux et internationaux.</p>
</div>
<div class="service">
    <h2>Loisirs</h2>
    <p>Découvrez une variété de loisirs extérieurs comme des randonnées, balades à vélo, activités nautiques, et terrains de sport pour enrichir votre séjour.</p>
</div>
<div class="service">
    <h2>Massage</h2>
    <p>Détendez-vous avec un massage professionnel directement dans votre cabane. Nos soins relaxants et revitalisants sont parfaits pour un moment de bien-être.</p>
</div>
<div class="service">
    <h2>Jeux</h2>
    <p>Pour des soirées conviviales, nous proposons une sélection de jeux de société, adaptés à tous les âges et préférences.</p>
</div>
<div class="service">
    <h2>Ménage</h2>
    <p>Profitez d'un service de ménage pour que votre cabane reste propre et accueillante, vous permettant de vous détendre pleinement.</p>
</div>
<div class="service">
    <h2>Lessive</h2>
    <p>Voyagez léger grâce à notre service de lessive. Nous prenons en charge votre linge et vous le retournons propre et frais.</p>
</div>
</section>

<div id="footer-placeholder"></div>
<script src="script.js"></script>
</body>