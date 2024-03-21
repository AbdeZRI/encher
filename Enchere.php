<?php 

class Enchere
{
    protected $refEnchere;
    protected $refVoiture;
    protected $sessionUser;
    protected $prixDepart;
    protected $prixEnchere;
    
    
    //creation de la function constructeur
    public function __construct($refEnchere, $refVoiture, $sessionUser, $prixDepart, $prixEnchere)
    {
        $this->refEnchere = $refEnchere;
        $this->refVoiture = $refVoiture;
        $this->idUser = $sessionUser;
        $this->prixdepart = $prixDepart;
        $this->prixEnchere = $prixEnchere;
        
    }

    // creation de la function pour afficher les elements de Product
    public function display()
    {
        echo "<div class='product'>";
        echo "<p><strong>Enchere numéro : " . $this->refEnchere . "</strong></p>";
        echo "<p><strong>Reference voiture : " . $this->refVoiture . "</strong></p>";
        echo "<p><strong>Utilisateur numéro : " . $this->sessionUser . "</strong></p>";
        echo "<p><strong>Prix de depart de l'enchere : " . $this->prixDepart . "</strong></p>";
        echo "<p><strong>Prix actuel de l'enchere: " . $this->prixEnchere . "</strong></p>";
        echo "</div>";

    } 
}

?>