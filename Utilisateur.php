<?php 

class Utilisateur 
{
    private $sessionUser;
    private $nom;
    private $prenom;
    private $email;

    public function __construct($id, $nom, $prenom, $email) 
    {
        $this->sessionUser ;
        $this->$nom;
        $this->$prenom;
        $this->$email;

    }

    public function getSessionUser() {
        return $this->sessionUser;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getEmail() {
        return $this->email;
    }
   

    public function display()  
    {
    echo "<div class='user'>";
        echo "<h3>Profil</h3>";
        echo "<p><strong>Nom:</strong> " . $this->Nom . "</p>";
        echo "<p><strong>Prenom :</strong> " . $this->Prénom . "</p>";
        echo "<p><strong>email :</strong> " . $this->email . " </p>";
        echo "<p><strong>id :</strong> " . $this->id. "</p>";
        echo "</div>";

    } 
}

?>