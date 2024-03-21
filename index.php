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

    <a href="./publication.php">Publier une annonce</a>

    
        <div class="containerEnchere">

    <?php 

    var_dump($_SESSION['user_id']);

    
    //connexion à la BDD
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $stmt = $pdo->query('SELECT * FROM Voiture');
    
    //Affiche les elements de la table voiture
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
     echo "<div class='product'>";
     echo "<ul>";
     echo "<img src='upload/".htmlspecialchars($row['image_path'])."'></img>";
     echo "<li><strong>Marque :" .htmlspecialchars($row['marque_voiture']). "</li>";
     echo "<li><strong>Modele :</strong> " . htmlspecialchars($row['modele_voiture']) . "</li>";
     echo "<li><strong>Puissance :</strong> " . htmlspecialchars($row['puissance_voiture']) . "</li>";
     echo "<li><strong>Année :</strong> " . htmlspecialchars($row['annee_voiture']) . " </li>";
     echo "<li><strong>Prix de depart :</strong> " . htmlspecialchars($row['prix_depart']). "</li>";
     echo "</ul>";
     echo "<a href='./afficher_donnees.php'> dettaille</a>";
     echo "</div>";
     
}
    
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

    ?>
    </div>
        
    </body>
</html>