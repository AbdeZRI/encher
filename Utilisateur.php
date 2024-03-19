<?php 

class Utilisateur 
{
    public $id;
    public $nom;
    public $prenom;
    public $email;

    public function __construct($id, $nom, $prenom, $email) 
    {
        $this->id ;
        $this->$nom;
        $this->$prenom;
        $this->$email;

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