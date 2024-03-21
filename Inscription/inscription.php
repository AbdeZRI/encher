<html lang="en">

<head>
    <link rel="stylesheet" href="inscription.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form class="container" action="inscription.php" method="POST">
        <div class="brand-logo"></div>
        <div class="brand-title">Inscription</div>
        <div class="inputs">
            <label for="prenom">PRENOM</label>
            <input type="text" id="prenom" name="prenom_utilisateur" />
            <label for="nom">NOM</label>
            <input type="text" id="nom" name="nom_utilisateur" />
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email_utilisateur" />
            <label for="mdp">MOT DE PASSE</label>
            <input type="password" id="mdp" name="mdp_utilisateur" />
            <button type="submit">S'inscrire</button>
            <a href="../Connexion/connexion.php">Déjà un compte ? Se connecter</a>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupération des données du formulaire
        $prenom = $_POST['prenom_utilisateur'];
        $nom = $_POST['nom_utilisateur'];
        $email = $_POST['email_utilisateur'];
        $mdp = $_POST['mdp_utilisateur'];


        $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
        (password_verify($mdp, $mdpHash));



        try {
            // Connexion à la base de données
            $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête d'insertion
            $query = "INSERT INTO Utilisateur (prenom_utilisateur, nom_utilisateur, email_utilisateur, mdp_utilisateur) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);

            // Exécution de la requête
            $stmt->execute([$prenom, $nom, $email, $mdpHash]);

            echo "Vous êtes bien inscrit";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        // Redirection vers le formulaire si la méthode n'est pas POST
        // header('Location: index.php');
    }
