<?php
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupération des données du formulaire
            $prenom = $_POST['prenom_utilisateur'];
            $nom = $_POST['nom_utilisateur'];
            $email = $_POST['email_utilisateur'];
            $mdp = $_POST['mdp_utilisateur'];

            
            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
            // (password_verify($mdp, $mdpHash));
        
        
            
            try {
                // Connexion à la base de données
                $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', '');
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

        ?>