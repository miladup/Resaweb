<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resaweb";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Fonction pour calculer le nombre de jours entre deux dates
function dateDiffInDays($date1, $date2) {
    $diff = strtotime($date2) - strtotime($date1);
    return abs(round($diff / 86400));
}

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $id_cabane = (int)$_POST['id_cabane'];
    $prix_par_nuit = (float)$_POST['prix_par_nuit'];

    // Calculer le prix total
    $nb_nuits = dateDiffInDays($date_debut, $date_fin);
    $prix_total = $nb_nuits * $prix_par_nuit;

    // Vérifier si l'utilisateur existe déjà
    $sql = "SELECT id_utilisateur FROM utilisateurs WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // L'utilisateur existe déjà
        $row = $result->fetch_assoc();
        $id_utilisateur = $row['id_utilisateur'];
    } else {
        // Insérer un nouvel utilisateur
        $sql = "INSERT INTO utilisateurs (prenom, nom, email, numero_telephone) VALUES (?, ?, ?, '')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $prenom, $nom, $email);
        if ($stmt->execute()) {
            $id_utilisateur = $stmt->insert_id;
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
            exit();
        }
    }

    // Insérer la réservation
    $sql = "INSERT INTO reservations (id_utilisateur, id_cabane, date_arrive, date_depart, prix_total) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissi", $id_utilisateur, $id_cabane, $date_debut, $date_fin, $prix_total);

    if ($stmt->execute()) {
        $to = $email;
        $subject = "Confirmation de réservation";
        $message = "
        <html>
        <head>
            <title>Confirmation de réservation</title>
        </head>
        <body>
            <p>Bonjour $prenom $nom,</p>
            <p>Merci pour votre réservation à notre cabane. Voici les détails de votre réservation :</p>
            <ul>
                <li>Cabane: $id_cabane</li>
                <li>Date de début: $date_debut</li>
                <li>Date de fin: $date_fin</li>
                <li>Prix total: " . number_format($prix_total, 2) . "€</li>
            </ul>
            <p>Nous avons hâte de vous accueillir !</p>
        </body>
        </html>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: lescabanes00@gmail.com" . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "Réservation réussie et email de confirmation envoyé.";
        } else {
            echo "Réservation réussie, mais l'envoi de l'email a échoué.";
            echo("Email failed to send to $to. Subject: $subject");
        }
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
