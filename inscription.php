<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>

        <?php include __DIR__.'/register.php'; ?>
    
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

    </body>
</html>