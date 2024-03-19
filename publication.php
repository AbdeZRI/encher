<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Publiez une annonce</title>
    </head>
    <body>
        
        <?php require __DIR__.'/Product.php'; ?>
    
    <!-- Creation du formulaire de publication -->
    <h2>Publiez votre annonce</h2>
    <form action="publication.php" method="POST">
        <div>
            <div>
                <label for="title">Titre de votre annonce :</label>
                <input type="text" id="titleAnnonce" name="title" required><br><br>
            </div>
            <div>
                <label for="marque">Marque :</label>
                <input type="text" id="marque" name="marque" required><br><br>
            </div>
            <div>
                <label for="modele">Modele :</label>
                <input type="text" id="modele" name="modele" required><br><br>
            </div>
             <div>
                <label for="puissance">Puissance :</label>
                <input type="text" id="puissance" name="puissance" required><br><br>
            </div>
            <div>
                <label for="annee">Année : </label>
                <input type="text" id="annee" name="annee" required><br><br>
            </div>
            <div>
                <label for="PrixDepart">Prix de départ de l'enchére :</label>
                <input type="text" id="prixDepart" name="prixDepart" required><br><br>
            </div>
            <div>
                <label for="dateFin">Date de fin de l'enchère :</label>
                <input type="date" id="dateFin" name="dateFin" value="<?= date ("Y-m-d") ?>"
                    min="2020-01-01" max="2030-12-31" required><br><br>
            </div>
            <div>
                <label for="dateDebut">Date de fin de l'enchère :</label>
                <input type="date" id="dateDebut" name="dateDebut" value="<?= date ("Y-m-d") ?>"
                    min="2020-01-01" max="2030-12-31" required><br><br>
            </div>
            <div>
                <label for="Description">Déscription : </label>
                <textarea id="description" name="description" placeholder="Décrivez précisement votre bien, en indiquant son état, ses caractéristiques, ainsi que toute autre informations importante pour l'acquéreur." ></textarea><br><br>
            </div>
            <input type="submit" value="Publier">
        </div>


    </form>

    <?php 
    

    $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', '');


    var_dump($_SESSION['user_id']);

    
    if ($_SESSION['user_id']) {
        if (isset($_POST["title"])
            && isset($_POST["marque"])
            && isset($_POST["modele"])
            && isset($_POST["puissance"])
            && isset($_POST["annee"])
            && isset($_POST["description"])
            && isset($_POST["prixDepart"])
            && isset($_POST["dateFin"])
            && isset($_POST["dateDebut"]));

            
        {
            //Récupération et nettoyage des inputs
            $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $marque = filter_var($_POST["marque"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $modele = filter_var($_POST["modele"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $puissance = filter_var($_POST["puissance"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $annee = filter_var($_POST["annee"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_var($_POST["description"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prixDepart = filter_var($_POST["prixDepart"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateFin = filter_var($_POST["dateFin"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateDebut = filter_var($_POST["dateDebut"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $sessionUser = $_SESSION['user_id'];
            
            $product = new Products($title, $marque, $modele, $puissance, $annee, $description, $prixDepart, $dateFin, $dateDebut);

            // affichage de la publication avec la fonction display
            $product->display();
        } 
        
        try {
            //Connexion à la BDD
            $pdo = new PDO('mysql:host=localhost;dbname=enchere_sql', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Insertion des POST dans la BDD
            $query = 'INSERT INTO voiture (id_utilisateur, modele_voiture, marque_voiture, puissance_voiture, annee_voiture, description, date_fin, prix_depart) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
            $stmt = $pdo->prepare($query);

            //Execution de l'insertion 
            $stmt->execute([$sessionUser, $modele, $marque, $puissance, $annee, $description, $dateFin, $prixDepart]);

            $stmt2 = $pdo->query('SELECT * FROM voiture ORDER BY ref_voiture DESC');
            $row = $stmt2->fetch(PDO::FETCH_ASSOC);
            $refVoiture = $row['ref_voiture'];

            $query = 'INSERT INTO encheres (ref_voiture, id_utilisateur, prix_enchere) VALUES (?, ?, ?)';
            $stmt2 = $pdo->prepare($query);

            $stmt2->execute([$refVoiture, $sessionUser, $prixDepart]);

            echo "Vous avez bien publié votre annonce";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
         echo "Vous devez être connecté pour publier une annonce";
    }
    ?>


    </body>
</html>