<?php
session_start();

// Vérifie si le bouton de déconnexion a été soumis
if (isset($_POST['deconnexion'])) {
    // Détruit toutes les données de session
    session_unset();
    // Détruit la session
    session_destroy();
    // Redirige vers la page index.php
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
</head>

<body>

    <nav class="navContainer">
        <a href="../Publication/publication.php">Publier une annonce</a>
        <a href="../afficher_donnees.php">Voir les annonces</a>
    </nav>



    <?php
    // Vérifie si l'utilisateur est connecté
    if (isset($_SESSION['user_id'])) {
        // Si l'utilisateur est connecté, afficher le bouton de déconnexion
        echo '<form action="index.php" method="post">';
        echo '<button type="submit" name="deconnexion" id="deconnexion">Déconnexion</button>';
        echo '</form>';
    } else {
        // Si l'utilisateur n'est pas connecté, afficher le bouton de connexion
        echo '<a href="../Connexion/connexion.php">Connexion</a>';
    }
    ?>

    <div class="containerEnchere">

        <?php


        //connexion à la BDD
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparer et exécuter la requête pour récupérer le nom et prénom de l'utilisateur connecté
            $stmt = $pdo->prepare('SELECT nom_utilisateur, prenom_utilisateur FROM Utilisateur WHERE id_utilisateur = ?');
            // $stmt->execute([$_SESSION['user_id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // // Afficher le message "Vous êtes bien connecté sur le compte de : Nom Prénom"
            // echo "Vous êtes bien connecté sur le compte de : " . $user['nom_utilisateur'] . " " . $user['prenom_utilisateur'] . "<br>";

            $stmt = $pdo->query('SELECT * FROM Voiture ORDER BY ref_voiture DESC');

            //Affiche les elements de la table voiture
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='product'>";
                echo "<ul>";
                // echo "<img src='./images" . htmlspecialchars($row['image_path']) . "' alt='Image du véhicule'>";
                echo "<li><strong>Référence vendeur :  </strong>" . htmlspecialchars($row['id_utilisateur']) . "</li>";
                echo "<li><strong>Marque du véhicule :  </strong> " . htmlspecialchars($row['marque_voiture']) . "</li>";
                echo "<li><strong>Modèle du véhicule : </strong> " . htmlspecialchars($row['modele_voiture']) . "</li>";
                echo "<li><strong>Puissance :</strong> " . htmlspecialchars($row['puissance_voiture']) . " chevaux fisaux</li>";
                echo "<li><strong>Année :</strong> " . htmlspecialchars($row['annee_voiture']) . " </li>";
                echo "<li><strong>Prix de depart :</strong> " . htmlspecialchars($row['prix_depart']) . " € </li>";
                echo "<button>Placer une enchère</button>";
                echo "</ul>";
                //  echo "<p><strong>Date de fin :</strong> " . htmlspecialchars($row['date_fin']) . "</p>";
                //  echo "<p><strong>Prix date de début :</strong> " . htmlspecialchars($row['date_debut']) . "€ </p>";
                echo "</div>";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }


        ?>
    </div>

</body>

</html>