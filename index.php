<?PHP session_start() 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
    
    
    <nav></nav>
    <img id="photoFond" src="" alt="photo voiture de luxe">
    <a href="./publication.php">Publier une annonce</a>

    <?php
    // Vérifie si l'utilisateur est connecté
    if (isset($_SESSION['user_id'])) {
        // Si l'utilisateur est connecté, afficher le bouton de déconnexion
        echo '<form action="index.php" method="post">';
        echo '<button type="submit" name="deconnexion">Déconnexion</button>';
        echo '</form>';
    } else {
        // Si l'utilisateur n'est pas connecté, afficher le bouton de connexion
        echo '<a href="./connexion.php">Connexion</a>';
    }

    // Vérifie si le bouton de déconnexion a été soumis
    if (isset($_POST['deconnexion'])) {
        // Détruit toutes les données de session
        session_unset();
        // Détruit la session
        session_destroy();
        // Redirige vers la page index.php
        header("Location: index.php");
        exit;
    };
    ?>

        <div class="containerEnchere">

    <?php 

    var_dump($_SESSION['user_id']);

    
    //connexion à la BDD
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $stmt = $pdo->query('SELECT * FROM voiture');

   
    //Affiche les elements de la table voiture
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
     echo "<div id='product' class='product'>";
     echo "<ul>";
     echo "<li><strong>Ref voiture: :" .htmlspecialchars($row['ref_voiture']). "</li>";
     echo "<li><strong>Marque :" .htmlspecialchars($row['marque_voiture']). "</li>";
     echo "<li><strong>Modele :</strong> " . htmlspecialchars($row['modele_voiture']) . "</li>";
     echo "<li><strong>Puissance :</strong> " . htmlspecialchars($row['puissance_voiture']) . "</li>";
     echo "<li><strong>Année :</strong> " . htmlspecialchars($row['annee_voiture']) . " </li>";
     echo "<li><strong>Prix de depart :</strong> " . htmlspecialchars($row['prix_depart']). "€</li>";
     echo "<li><strong>Date de fin :</strong> " . htmlspecialchars($row['date_fin']) . "</li>";
    echo '<form action="index.php" method="post">';
    echo "<a href='../encheres/pageDetail.php?ref_voiture=" . htmlspecialchars($row['ref_voiture']) . "' class='details-button'>Détails</a>";
     echo '</form>';
     echo "</ul>";
    echo "</div>";
    //  echo "<p><strong>Prix date de début :</strong> " . htmlspecialchars($row['date_debut']) . "€ </p>";
    
    // if (isset($_POST['details'])) {
        
    //     $stmt2 = $pdo->query('SELECT * FROM voiture WHERE ref_voiture');
    //       while  ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    //         $refVoiture = $row['ref_voiture'];
             
    //     }
        
    //     exit;
    // };
}
    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}



    ?>
    </div>
    <footer></footer>
        
    </body>
</html>

