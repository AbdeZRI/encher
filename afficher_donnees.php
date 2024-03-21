
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'annonce</title>
</head>

<body>
    <a href="./index.php">Retour à l'accueil</a>

    <h2>Détails de l'annonce</h2>

    <?php

    // Vérifie si les données sont soumises via la méthode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupère les données publiées du formulaire de publication
        $title = $_POST["title"];
        $marque = $_POST["marque_voiture"];
        $modele = $_POST["modele_voiture"];
        $puissance = $_POST["puissance_voiture"];
        $annee = $_POST["annee_voiture"];
        $description = $_POST["description"];
        $prixDepart = $_POST["prix_depart"];
        $dateFin = $_POST["date_fin"];
        $dateDebut = $_POST["dateDebut"];

        

        // Affiche les détails de l'annonce
        echo "<p><strong>Titre :</strong> $title</p>";
        echo "<p><strong>Marque :</strong> $marque</p>";
        echo "<p><strong>Modèle :</strong> $modele</p>";
        echo "<p><strong>Puissance :</strong> $puissance</p>";
        echo "<p><strong>Année :</strong> $annee</p>";
        echo "<p><strong>Description :</strong> $description</p>";
        echo "<p><strong>Prix de départ :</strong> $prixDepart</p>";
        echo "<p><strong>Date de fin de l'enchère :</strong> $dateFin</p>";
        echo "<p><strong>Date de début de l'enchère :</strong> $dateDebut</p>";
    } else {
        echo "Aucune donnée n'a été soumise.";
    }

    ?>

</body>

</html>
