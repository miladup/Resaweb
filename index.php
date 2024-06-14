<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
                <img class="logo" src="photos/logo-long-blanc.png" alt="Accueil">
            </a>
            <ul class="nav">
                <li><a class="nav-link" href="cabanes.php">Nos cabanes</a></li>
                <li><a class="nav-link" href="services.php">Services</a></li>
                <li><a class="nav-link" href="apropos.php">A propos</a></li>
            </ul>
        </nav>
    </div>

    <h1>UN LIEU INSOLITE UNIQUE</h1>
    <p class="accroche">Venez passer un séjour inoubliable dans l'une de nos cabanes perchées !</p>
</header>

<section class="section-1">
    <h2>Choisissez votre cabane !</h2>
    <p class="text">Bienvenue chez Les Cabanes, où les amoureux de la nature de tous âges peuvent profiter d'une large gamme de cabanes dans les arbres, des refuges romantiques pour couples aux cabanes familiales et amicales. Nos installations sont équipées de tout le confort moderne pour offrir une expérience unique et immersive au cœur de la nature. Elles sont aussi éloignées les unes des autres pour vous garantir calme et tranquillité, et sont entourées de cultures bios, ce qui permet à la faune et la flore de s'épanouir.<br>Notre personnel amical et compétent est toujours prêt à répondre à vos questions, et nous proposons des tarifs compétitifs. <br><br> Organisez votre prochain événement ou fête dans nos cabanes personnalisables, adaptées à des groupes de toutes tailles. Réservez votre séjour dès aujourd'hui et commencez votre aventure au sommet des arbres avec nous !</p>
</section>
<section class="categorie">
    <p class="style">Vous cherchez une cabane plutôt <span>Romantique</span>, <span>Nature</span>, ou <span>Aventure</span> ?</p>
    <section class="card-container">
        <div class="card" onclick="location.href='cabanes.php#romantique'">
            <div class="image-container">
                <img src="photos/love-nid-1.jpeg" alt="Romantique">
                <h3>Romantique<hr></h3> 
            </div>
            <p>Sélection de cabane pour un séjour romantique</p>
            <a href="cabanes.php#romantique">Voir plus</a>
        </div>
        <div class="card" onclick="location.href='cabanes.php#nature'">
            <div class="image-container">
                <img src="photos/foret-1.jpeg" alt="Nature">

                <h3>Nature<hr></h3>
            </div>
            <p>Reconnectez-vous à la nature</p>
            <a href="cabanes.php#nature">Voir plus</a>
        </div>
        <div class="card" onclick="location.href='cabanes.php#aventure'">
            <div class="image-container">
                <img src="photos/chene-4.jpeg" alt="Aventure">
                <h3>Aventure<hr></h3>
            </div>
            <p>Partez pour une aventure nature</p>
            <a href="cabanes.php#aventure">Voir plus</a>
        </div>
    </section>
</section>
    
<section class="section-2">
    <h2 class="titre2">Nos coups de coeur <3</h2>
    <div class="grid-container">
        <?php

        $servername = "localhost";
        $username = "duperrier";
        $password = "zj5CdWswqs6MTqZ";
        $dbname = "duperrier_resaweb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connexion échouée : " . $conn->connect_error);
        }

        // charset UTF-8
        $conn->set_charset("utf8");
        

        // IDs des cabanes coups de coeur
        $ids = [1, 2, 3, 4, 5, 9];
        $ids_str = implode(',', $ids);

        // Requête pour récupérer les informations des cabanes coups de coeur
        $sql = "SELECT cabanes.*, GROUP_CONCAT(photos.nom_photo SEPARATOR ',') AS photos
                FROM cabanes
                LEFT JOIN photos ON cabanes.id_cabane = photos.id_cabane
                WHERE cabanes.id_cabane IN ($ids_str)
                GROUP BY cabanes.id_cabane";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $photos = explode(',', $row['photos']);
                $main_photo = $photos[0];
                ?>
                <div class="cdc">
                    <div class="image-slider">
                        <div class="slider">
                            <?php foreach ($photos as $index => $photo): ?>
                                <img class="slider-img <?php echo $index === 0 ? 'active' : ''; ?>" src="photos/<?php echo $photo; ?>" alt="<?php echo $row['nom_cabane']; ?>">
                            <?php endforeach; ?>
                        </div>
                        <button class="prev" onclick="prevSlide(this)">&#10094;</button>
                        <button class="next" onclick="nextSlide(this)">&#10095;</button>
                        <h3><?php echo $row['nom_cabane']; ?></h3>
                    </div>
                    <p><?php echo number_format($row['prix_par_nuit'], 2); ?>€/nuit</p>
                    <a href="details.php?id=<?php echo $row['id_cabane']; ?>">Voir plus</a>
                </div>
                <?php
            }
        } else {
            echo "<p>Aucune cabane trouvée.</p>";
        }


        $conn->close();
        ?>
    </div>
</section>

<div class="container">
    <div class="text-section">
        <h4>Restez connectés, <span class="highlight">de nouveaux hébergements arrivent !</span></h4>
        <p>Mais en attendant, louez ceux déjà <span class="highlight">existants</span> !</p>
        <a href="cabanes.php">Voir</a>
    </div>
    <div class="image-section">
        <img src="photos/fond.jpg" alt="">
    </div>
</div>

<div id="footer-placeholder"></div>
<script src="script.js"></script>
</body>
</html>
