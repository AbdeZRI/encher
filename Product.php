<?php 

//Creation de l'object Product
class Products
{
    
    protected string $marque;
    protected string $modele;
    protected int $puissance;
    protected int $annee;
    protected string $description;
    protected float $prixDepart;
    protected $dateFin ;
    // protected $dateDebut;
    

    //creation de la function constructeur
    public function __construct($marque, $modele, $puissance, $annee, $description, $prixDepart, $dateFin)
    {
       
        $this->marque = $marque;
        $this->modele = $modele;
        $this->puissance = $puissance;
        $this->annee = $annee;
        $this->description = $description;
        $this->prixDepart = $prixDepart;
        $this->dateFin = $dateFin;
        // $this->dateDebut = $dateDebut;
        
    }

   

    // creation de la function pour afficher les elements de Product
    public function display()
    {
        echo "<div class='product'>";
        echo "<h3>Annonce</h3>";
        // echo "<img src='upload/".$this->imageName."'></img>";
        echo "<p><strong>Marque :</strong> " . $this->marque . "</p>";
        echo "<p><strong>Modele :</strong> " . $this->modele . "</p>";
        echo "<p><strong>Puissance :</strong> " . $this->puissance . " </p>";
        echo "<p><strong>Année :</strong> " . $this->annee . "</p>";
        echo "<p><strong>Description :</strong> " . nl2br($this->description) . "</p>";
        echo "<p><strong>Prix de départ :</strong> " . $this->prixDepart . "€ </p>";
        echo "<p><strong>Date de fin :</strong> " . $this->dateFin . "</p>";
        // echo "<p><strong>Date de début :</strong> " . $this->dateDebut. " </p>";
        echo "</div>";

    } 
    
}

?>

