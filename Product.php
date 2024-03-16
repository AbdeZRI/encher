<?php 


//Creation de l'object Product
class Products
{
    public string $title;
    public string $marque;
    public string $modele;
    public int $puissance;
    public int $annee;
    public string $description;
    public float $prixDepart;
    public $dateFin ;
    public $dateDebut;

    //creation de la function constructeur
    public function __construct($title, $marque, $modele, $puissance, $annee, $description, $prixDepart, $dateFin, $dateDebut)
    {
        $this->title = $title;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->puissance = $puissance;
        $this->annee = $annee;
        $this->description = $description;
        $this->prixDepart = $prixDepart;
        $this->dateFin = $dateFin;
        $this->dateDebut = $dateDebut;
    }

    // creation de la function pour afficher les elements de Product
    public function display()
    {
        echo "<div class='product'>";
        echo "<h3>" . $this->title . "</h3>";
        echo "<p><strong>Marque :</strong> " . $this->marque . "</p>";
        echo "<p><strong>Modele :</strong> " . $this->modele . "</p>";
        echo "<p><strong>Puissance :</strong> " . $this->puissance . " </p>";
        echo "<p><strong>Année :</strong> " . $this->annee . "</p>";
        echo "<p><strong>Description :</strong> " . nl2br($this->description) . "</p>";
        echo "<p><strong>Prix de départ :</strong> " . $this->prixDepart . "€ </p>";
        echo "<p><strong>Date de fin :</strong> " . $this->dateFin . "</p>";
        echo "<p><strong>Date de début :</strong> " . $this->dateDebut. " </p>";
        echo "</div>";

    } 
    
}












?>

