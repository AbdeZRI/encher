<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="inscription.css">
</head>
    <body>

        <?php include __DIR__.'/register.php'; ?>
    
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
            <a href="../encheres/connexion.php">Déjà un compte ? Se connecter</a>
    </form>


    </body>
</html>