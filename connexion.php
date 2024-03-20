<?php
session_start(); // Démarre la session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $email = $_POST['email_utilisateur'];
    $mdp = $_POST['mdp_utilisateur'];

    try {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour vérifier si l'utilisateur existe
        $query = "SELECT * FROM Utilisateur WHERE email_utilisateur = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) { // Si l'utilisateur existe
            if (password_verify($mdp, $user['mdp_utilisateur'])) { // Vérifie le mot de passe
                $_SESSION['user_id'] = $user['id_utilisateur']; // Stocke l'ID de l'utilisateur dans la session
                header('Location: index.php'); // Redirige vers la page index.php
                exit();
            } else {
                $error_message = "Mot de passe incorrect";
            }
        } else {
            $error_message = "Adresse email non trouvée";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<html lang="en">

<head>
    <link rel="stylesheet" href="connexion.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <form class="container" action="connexion.php" method="POST">
        <div class="brand-logo"></div>
        <div class="brand-title">Connexion</div>
        <?php if (isset($error_message)) : ?>
            <p><?php echo $error_message; ?></p>
        <?php endif; ?>
        <div class="inputs">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email_utilisateur" required />
            <label for="mdp">MOT DE PASSE</label>
            <input type="password" id="mdp" name="mdp_utilisateur" required />
            <button type="submit">SE CONNECTER</button>
        </div>
    </form>

</body>

</html>