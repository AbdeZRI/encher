<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form class="formContainer" action="inscription.php" method="POST">
        <h1>Inscription</h1>
        <ul>
            <li>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom_utilisateur" />
                <span>Mettez votre prénom</span>

            </li>
            <li>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom_utilisateur" />
                <span>Mettez votre nom de famille</span>

            </li>
            <li>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email_utilisateur" />
                <span>Mettez une adresse email valide</span>
            </li>
            <li>
                <label for="mdp">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp_utilisateur" />
                <span>Mettez un mot de passe compliqué</span>
            </li>
            <li>
                <input type="submit" value="Envoyer" />
            </li>
        </ul>
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
