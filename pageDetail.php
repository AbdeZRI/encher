<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Détails annonce</title>
    </head>
    <body>
        <?php if (isset($_GET['ref_voiture']) && !empty($_GET['ref_voiture'])) {
        // Récupérez l'identifiant de l'annonce depuis l'URL
        $annonce_id = $_GET['ref_voiture'];

        try {
            // Connexion à la base de données
            $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparez la requête SQL pour récupérer les détails de l'annonce
            $query = "SELECT * FROM voiture WHERE ref_voiture = ?";
            $stmt = $pdo->prepare($query);

            // Exécutez la requête avec l'identifiant de l'annonce
            $stmt->execute([$annonce_id]);

            // Vérifiez si une annonce correspondante a été trouvée
            if ($stmt->rowCount() > 0) {
                // Récupérez les détails de l'annonce
                $annonce = $stmt->fetch(PDO::FETCH_ASSOC);

                // Affichez les détails de l'annonce
                echo "<h1>Détails de l'annonce</h1>";
                echo "<p><strong>Marque :</strong> " . htmlspecialchars($annonce['marque_voiture']) . "</p>";
                echo "<p><strong>Modèle :</strong> " . htmlspecialchars($annonce['modele_voiture']) . "</p>";
                echo "<p><strong>Marque :</strong> " . htmlspecialchars($annonce['puissance_voiture']) . "</p>";
                echo "<p><strong>Année :</strong> " . htmlspecialchars($annonce['annee_voiture']) . "</p>";
                // Affichez d'autres détails de l'annonce de la même manière
            } else {
                echo "Aucune annonce trouvée avec cet identifiant.";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        // Redirigez l'utilisateur s'il n'y a pas d'identifiant d'annonce dans l'URL
        header("Location: index.php"); // Redirigez vers votre page d'accueil ou une autre page appropriée
        exit(); // Assurez-vous de terminer le script après la redirection
    } ?>
    </body>
</html>