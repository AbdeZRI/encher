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

?>