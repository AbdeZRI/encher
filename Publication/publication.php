<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="publication.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publiez une annonce</title>
</head>

<body>

    <?php require __DIR__ . '/Product.php'; ?>

    <!-- Création du formulaire de publication -->
    <form action="publication.php" method="POST" class="container">
        <div class="brand-title">Publiez votre annonce </div>
        <!-- Assurez-vous que l'action pointe vers la même page -->
        <!-- Reste du formulaire inchangé -->
        <div class="inputs">
            <div class="inputTitle">
                <label for="title">Titre de votre annonce :</label>
                <input type="text" id="titleAnnonce" name="title" required><br><br>
            </div>

            <div class="flexContainer">
                <!-- <label for="image">Image :</label>
                    <input class="imageInput" type="file" id="image" name="file"><br> -->

                <label for="marque">Marque :</label>
                <input type="text" id="marque" name="marque_voiture" required><br><br>

                <label for="modele">Modele :</label>
                <input type="text" id="modele" name="modele_voiture" required><br><br>

                <label for="puissance">Puissance :</label>
                <input type="text" id="puissance" name="puissance_voiture" required><br><br>

                <label for="annee">Année : </label>
                <input type="text" id="annee" name="annee_voiture" required><br><br>

                <label for="PrixDepart">Prix de départ de l'enchére :</label>
                <input type="text" id="prixDepart" name="prix_depart" required><br><br>

                <label for="dateDebut">Date de début de l'enchère :</label>
                <input type="date" id="dateDebut" name="dateDebut" value="<?= date("Y-m-d") ?>" min="2020-01-01" max="2030-12-31" required><br><br>

                <label for="dateFin">Date de fin de l'enchère :</label>
                <input type="date" id="dateFin" name="date_fin" value="<?= date("Y-m-d") ?>" min="2020-01-01" max="2030-12-31" required><br><br>

                <label for="Description">Description : </label>
                <textarea id="description" name="description" placeholder="Décrivez précisément votre bien, en indiquant son état, ses caractéristiques, ainsi que toute autre information importante pour l'acquéreur."></textarea><br><br>
            </div>
        </div>
        <button type="submit" name="submit">Publier</button>
    </form>

    <a href="../Accueil/index.php">Retour à l'accueil</a>



    <?php
    // Traitement de la publication si le formulaire est soumis
    if (isset($_POST["submit"])) {
        // Vérifie si l'utilisateur est connecté
        if (isset($_SESSION['user_id'])) {
            // Récupère l'ID de l'utilisateur
            $sessionUser = $_SESSION['user_id'];

            // Vérifie si les données du formulaire sont soumises
            if (!empty($_POST["title"]) && !empty($_POST["marque_voiture"]) && !empty($_POST["modele_voiture"]) && !empty($_POST["puissance_voiture"]) && !empty($_POST["annee_voiture"]) && !empty($_POST["description"]) && !empty($_POST["prix_depart"]) && !empty($_POST["date_fin"]) && !empty($_POST["dateDebut"])) {
                // Récupération des données du formulaire
                $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $marque = filter_var($_POST["marque_voiture"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $modele = filter_var($_POST["modele_voiture"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $puissance = filter_var($_POST["puissance_voiture"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $annee = filter_var($_POST["annee_voiture"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $description = filter_var($_POST["description"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $prixDepart = filter_var($_POST["prix_depart"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $dateFin = filter_var($_POST["date_fin"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                try {
                    // Connexion à la base de données
                    $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', 'root');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Insertion des données dans la base de données
                    $query = 'INSERT INTO Voiture (id_utilisateur, modele_voiture, marque_voiture, puissance_voiture, annee_voiture, description, date_fin, prix_depart) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
                    $stmt = $pdo->prepare($query);

                    // Exécution de l'insertion
                    $stmt->execute([$sessionUser, $modele, $marque, $puissance, $annee, $description, $dateFin, $prixDepart]);

                    echo "Vous avez bien publié votre annonce";
                } catch (PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
            } else {
                echo "Veuillez remplir tous les champs du formulaire.";
            }
        } else {
            echo "<p id=text>Vous devez être connecté pour publier une annonce<p>";
        }
    }
    ?>

</body>

</html>