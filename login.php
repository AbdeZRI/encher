<!-- <?php //


//if (isset($_POST["submit"]))
//{
  //  $email = $_POST['email'];
  //  $mdp = $_POST['mdp'];

   // $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', 'root');

   // $query = "SELECT * FROM Utilisateur WHERE email = '$email'";
   // $stmt = $pdo->prepare($query);
   // $stmt->execute();

  //  if($stmt->rowCount() > 0)
   // {
      //  $data = $stmt->fetchAll();
      //  if (password_hash($mdp, $data[0]["password"])) 
      //  {
     //       echo "Connexion reussi";
       //     $_SESSION['email'] = $email;
  //      }
   // }
   // else {
   //     echo "vous n'etes pas connectÃ©";
   // }
//}

?> 
<?php 
session_start(); // Démarre la session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', 'root');

    $query = "SELECT * FROM Utilisateur WHERE email_utilisateur = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($mdp, $user['mdp_utilisateur'])) {
            echo "Connexion réussie";
            $_SESSION['user_id'] = $user['id_utilisateur'];
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Adresse email non trouvée";
    }
}
?>
