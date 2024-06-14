<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="apropos.css">
    <link href="https://fonts.cdnfonts.com/css/happy-camper" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>À propos</title>
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
    <h1>A propos</h1>
</header>
<section id="concept">
    <h2>Du concept</h2>
    <p class="p">Bienvenue chez Les Cabanes, où les amoureux de la nature de tous âges peuvent profiter d'une large gamme de cabanes dans les arbres, des refuges romantiques pour couples aux cabanes familiales et amicales. Nos installations sont équipées de tout le confort moderne pour offrir une expérience unique et immersive au cœur de la nature. <br>Elles sont aussi éloignées les unes des autres pour vous garantir calme et tranquillité, et sont entourées de cultures bios, ce qui permet à la faune et la flore de s'épanouir.<br>
    Notre personnel amical et compétent est toujours prêt à répondre à vos questions, et nous proposons des tarifs compétitifs.
    <br><br>
    Organisez votre prochain événement ou fête dans nos cabanes personnalisables, adaptées à des groupes de toutes tailles. Réservez votre séjour dès aujourd'hui et commencez votre aventure au sommet des arbres avec nous !</p>
</section>

<section id="creatrice">
    <h2>De la créatrice</h2>
    <p class="p">Étudiante en première année de BUT MMI, nous avions pour projet du deuxième semestre de créer un site de réservation avec un thème libre. Étant une grande fan de la nature et des expériences uniques, j’ai eu l’idée de créer un site permettant de louer des cabanes dans les arbres, offrant une évasion exceptionnelle en pleine forêt.<br> <br>
    J’ai ainsi réalisé individuellement la création du site Les Cabanes du début à la fin, que ce soit le design, la recherche d’images, le développement front-end et back-end, en passant par la création de la base de données.</p>
</section>

<section id="mentions-legales">
    <h1>Mentions légales</h1>
    <h2>Politique de Réservation :</h2>
    <p class="p">Notre Politique de Réservation garantit un processus de réservation fluide pour nos clients. Pour réserver une cabane chez Les Cabanes, un acompte est requis lors de la réservation pour bloquer la cabane jusqu'au jour d'arrivée. Le paiement complet est dû lors de l'enregistrement. En cas d'annulation, un préavis de 48 heures est nécessaire pour un remboursement complet de l'acompte. Si l'annulation est faite moins de 48 heures à l'avance, l'acompte n'est pas remboursable. De plus, nous nous réservons le droit d'annuler ou de reprogrammer une réservation en raison de circonstances imprévues, telles que des dysfonctionnements d'équipement ou des conditions météorologiques.</p>

    <h2>Politique de Confidentialité :</h2>
    <p class="p">Chez Les Cabanes, la protection de la vie privée de nos clients est une priorité. Nous ne collectons que les informations nécessaires pour fournir nos services et nous ne partageons ni ne vendons les données des clients à des tiers. Nous utilisons des mesures de sécurité standard pour protéger les informations des clients contre tout accès non autorisé, altération ou destruction. Nos clients peuvent accéder et gérer leurs informations personnelles à tout moment en nous contactant.</p>

    <h2>Politique de Propriété Intellectuelle :</h2>
    <p class="p">Les Cabanes respectent la propriété intellectuelle d'autrui et nous attendons de nos clients qu'ils fassent de même. Toute utilisation non autorisée de marques, logos ou matériels protégés par des droits d'auteur appartenant à Les Cabanes ou à d'autres entreprises peut entraîner une expulsion et des poursuites judiciaires. Nous nous réservons le droit de refuser le service à quiconque viole notre Politique de Propriété Intellectuelle.</p>

    <h2>Décharge de Responsabilité :</h2>
    <p class="p">Pour protéger nos clients et notre entreprise, nous exigeons que tous les clients signent une Décharge de Responsabilité avant d'utiliser nos cabanes. Ce document libère Les Cabanes de toute responsabilité en cas de dommages ou blessures survenus lors de l'utilisation de nos équipements ou installations. Les clients doivent suivre notre Code de Conduite, utiliser les équipements correctement et signaler immédiatement tout dommage ou dysfonctionnement.</p>

    <h2>Politique de Remboursement :</h2>
    <p class="p">Notre Politique de Remboursement précise les conditions dans lesquelles les clients peuvent être éligibles à un remboursement de leurs frais de réservation ou autres charges. En général, nous n'offrons pas de remboursement pour les annulations faites moins de 48 heures à l'avance, sauf dans des circonstances exceptionnelles telles que des urgences médicales ou des conditions météorologiques défavorables. Si un remboursement est accordé, il sera effectué dans un délai de 7 à 10 jours ouvrables.</p>

    <h2>Politique d'Accessibilité :</h2>
    <p class="p">Chez Les Cabanes, nous nous efforçons de fournir une expérience inclusive et accessible à tous nos clients. Notre Politique d'Accessibilité décrit les mesures que nous prenons pour accueillir les clients ayant des handicaps ou des besoins particuliers. Cela inclut des installations accessibles, des équipements adaptés et des méthodes de communication appropriées. Nous encourageons les commentaires de nos clients pour améliorer nos services d'accessibilité et nous nous engageons à continuellement améliorer nos pratiques en la matière.</p>

    <h2>Hébergeur :</h2>
    <p class="p">o2switch.fr - 222-224 Boulevard Gustave Flaubert - 63000 Clermont-Ferrand, France <br><br>Ce site, créé dans le cadre d'un projet étudiant, ne permet pas de faire de vrais achats. Les données saisies dans le formulaire de réservation ne seront jamais transmises à des tiers ou commercialisées. Elles sont conservées dans la base de données du site, accessible uniquement par sa créatrice. Toutes les images sont directement tirées du site <a href="//www.les-cabanes-dans-les-arbres.com/">//www.les-cabanes-dans-les-arbres.com/</a>. Tous droits réservés. Pour toute demande de suppression de données, veuillez contacter : mila.duperrier@univ-eiffel.fr.<br><br>Merci de choisir Les Cabanes pour votre séjour dans nos cabanes dans les arbres. Nous valorisons votre vie privée et votre confiance.</p>
</section>


<div id="footer-placeholder"></div>
<script src="script.js"></script>
</body>
</html>
