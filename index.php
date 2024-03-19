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
     echo "<div class='product'>";
     echo "<ul>";
     echo "<li><strong>Marque :" .htmlspecialchars($row['marque_voiture']). "</li>";
     echo "<li><strong>Modele :</strong> " . htmlspecialchars($row['modele_voiture']) . "</li>";
     echo "<li><strong>Puissance :</strong> " . htmlspecialchars($row['puissance_voiture']) . "</li>";
     echo "<li><strong>Année :</strong> " . htmlspecialchars($row['annee_voiture']) . " </li>";
     echo "<li><strong>Prix de depart :</strong> " . htmlspecialchars($row['prix_depart']). "</li>";
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

