<!-- <?php
        

       // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupération des données du formulaire
         //   $prenom = $_POST['prenom_utilisateur'];
           // $nom = $_POST['nom_utilisateur'];
          //  $email = $_POST['email_utilisateur'];
           // $mdp = $_POST['mdp_utilisateur'];

            
           // $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
            // (password_verify($mdp, $mdpHash));
        
        
            
           // try {
                // Connexion à la base de données
            //    $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', 'root');
               // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Préparation de la requête d'insertion
              //  $query = "INSERT INTO Utilisateur (prenom_utilisateur, nom_utilisateur, email_utilisateur, mdp_utilisateur) VALUES (?, ?, ?, ?)";
                //$stmt = $pdo->prepare($query);

                // Exécution de la requête
              //  $stmt->execute([$prenom, $nom, $email, $mdpHash]);

               // echo "Vous êtes bien inscrit";
            //} catch (PDOException $e) {
              //  echo "Erreur : " . $e->getMessage();
           // }
       // } else {




            //QUESTO RIMANE VERDE Redirection vers le formulaire si la méthode n'est pas POST
            //QUESTO RIMANE VERDE header('Location: index.php');
      //  }

       // ?> -->



<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Récupération des données du formulaire
//     $prenom = $_POST['prenom_utilisateur'];
//     $nom = $_POST['nom_utilisateur'];
//     $email = $_POST['email_utilisateur'];
//     $mdp = $_POST['mdp_utilisateur'];

//     $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
        
//     try {
//         // Connexion à la base de données
//         $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', 'root');
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         // Préparation de la requête d'insertion
//         $query = "INSERT INTO Utilisateur (prenom_utilisateur, nom_utilisateur, email_utilisateur, mdp_utilisateur) VALUES (?, ?, ?, ?)";
//         $stmt = $pdo->prepare($query);

//         // Exécution de la requête
//         $stmt->execute([$prenom, $nom, $email, $mdpHash]);

//         echo "Vous êtes bien inscrit";
//     } catch (PDOException $e) {
//         echo "Erreur : " . $e->getMessage();
//     }
// }
?>
<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $prenom = $_POST['prenom_utilisateur'];
    $nom = $_POST['nom_utilisateur'];
    $email = $_POST['email_utilisateur'];
    $mdp = $_POST['mdp_utilisateur'];

    // Hashage du mot de passe
    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

    try {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête d'insertion
        $query = "INSERT INTO Utilisateur (prenom_utilisateur, nom_utilisateur, email_utilisateur, mdp_utilisateur) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);

        // Exécution de la requête
        $stmt->execute([$prenom, $nom, $email, $mdpHash]);

        // Redirection vers une page de succès ou affichage d'un message de succès
        echo "Vous êtes bien inscrit";
    } catch (PDOException $e) {
        // Gestion des erreurs de la base de données
        echo "Erreur : " . $e->getMessage();
    }
}
?>
