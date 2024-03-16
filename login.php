<?php 


if (isset($_POST["submit"]))
{
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', '');

    $query = "SELECT * FROM Utilisateur WHERE email = '$email'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    if($stmt->rowCount() > 0)
    {
        $data = $stmt->fetchAll();
        if (password_hash($mdp, $data[0]["password"])) 
        {
            echo "Connexion reussi";
            $_SESSION['email'] = $email;
        }
    }
    else {
        echo "vous n'etes pas connecté";
    }
}



// if (isset($_POST["submit"]))
// {
//     $email = $_POST['email_utilisateur'];
//     $mdp = $_POST['mdp_utilisateur'];
//     $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
//             (password_verify($mdp, $mdpHash));

//     $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', '');

//     $query = "SELECT * FROM Utilisateur WHERE email = '$email'";
//     $stmt = $pdo->prepare($query);
//     $stmt->execute();

//     if($stmt->rowCount() > 0)
//     {
//         $data = $stmt->fetchAll();
//         if (password_hash($mdp, $data[0]["password"])) 
//         {
//             echo "Connexion reussi";
//             $_SESSION['email'] = $email;
//             ("location: index.php");
//         }
//     }
//     else {
//         echo "vous n'etes pas connecté";
//     }
// }

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Récupération des données du formulaire
//     $email = $_POST['email_utilisateur'];
//     $mdp = $_POST['mdp_utilisateur'];
    
//     $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
//     $verifyPass = (password_verify($mdp, $mdpHash));

//     echo $verifyPass;

    
    
//         // Connexion à la base de données
//         $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', '');
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         // Préparation de la requête d'insertion
//         $query = "SELECT * FROM Utilisateur WHERE email = '$email' ";
//         $stmt = $pdo->prepare($query);

//         // Exécution de la requête
//         $stmt->execute();

//         if (($_GET["mdp"] === $mdp && $_GET["email_utilisateur"] === $email)) 
//         {
//             echo "Connexion reussi";
//             $_SESSION['email_utilisateur'] = $email;
//             // ("location: index.php");
//         }
    
//          else {
//             echo "vous n'etes pas connecté";
//         }

?>