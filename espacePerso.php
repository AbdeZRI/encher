<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

    <?php require_once 'Utilisateur.php';
    $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', '');

    // $nomUser = "nom_utilisateur";
    // $prenomUser = "prenom_utilisateur";
    // $emailUser = "email_utilisateur";




    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $sessionUser = $_SESSION['user_id'];


    // $stmt = $pdo->query('SELECT * FROM utilisateur WHERE id_utilisateur = $sessionUser');
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // $stmt = $pdo->prepare($query);
    
    


    
    ?>


        
    </body>
</html>