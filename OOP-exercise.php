<?php
//Création de la classe étudiant.
class Etudiant{
    //Création des attributs.
    public $nom;
    public $adresse;
    public $validationInscription = false;
    public $notes = [];
    public $grade = -1;

    //Création de la méthode construct.
    public function __construct($nom, $adresse) {
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    //Création de la méthode de validation d'inscription.
    public function inscriptionValide() {
        $this->validationInscription = true;
    }

    //Création de la méthode permettant de rajouter des notes.
    public function ajouterNote($note) {
        if ($this->validationInscription) {
            $this->notes[] = $note;
        }
    }

    //Création de la méthode permettant de donner un grade à l'étudiant en fonction de sa moyenne.
    public function donnerGrade() {
        //On vérifie que le tableau n'est pas vide.
        if (!empty($this->notes)) {
            //Initialisation de la somme des notes.
            $sommeNotes = 0;
            //Calcul de la somme des notes.
            for ($i = 0; $i < count($this->notes); $i++) {
                $sommeNotes += $this->notes[$i];
            }
            //Calcul de la moyenne.
            $moyenne = $sommeNotes / count($this->notes);
            //Attribution du grade en fonction de la moyenne calculée.
            if ($moyenne >= 90) {
                $this->grade = 4;
            } elseif ($moyenne >= 80) {
                $this->grade = 3;
            } elseif ($moyenne >= 70) {
                $this->grade = 2;
            } elseif ($moyenne >= 60) {
                $this->grade = 1;
            } else {
                $this->grade = 0;
            }
        }
    }

    public function AfficherProprietesEtudiant(){
        echo "<p>Nom de l'étudiant : " . $this->nom . "</p>";
        echo "<p>Adresse : " . $this->adresse . "</p>";
        //Remplacement du booléen par du texte
        if($this->validationInscription){
            $approbation="acceptée";
        }else{
            $approbation="refusée";
        }
        echo "<p>Inscription : " . $approbation . "</p>";
        echo "<span>Notes obtenues:</span>";
        // Affichage des notes obtenues
        echo "<ul>";
        foreach ($this->notes as $note) {
            echo "<li>" . $note . "</li>";
        }
        echo "</ul>";
        //Utilisation d'un switch pour afficher le bon texte selon le grade
        switch ($this->grade) {
            case '4':
                echo "<p>L'étudiant a obtenu la plus grande distinction</p>";
                break;
            case '3':
                echo "<p>L'étudiant a obtenu une grande distinction</p>";
                break;
            case '2':
                echo "<p>L'étudiant a obtenu une distinction</p>";
                break;
            case '1':
                echo "<p>L'étudiant a obtenu une satisfaction</p>";
                break;
            case '0':
                echo "<p>L'étudiant est en échec</p>";
                break;
            case '-1':
                echo "<p>L'étudiant ne peut valider son année car son inscription n'a pas été validée</p>";
                break;
        }
        echo "<br>----------------------------------------------------------------------------------<br>";
    }
}

//Programme principal
//Création des 5 étudiants
$etudiant1 = New Etudiant("Jean","Rue des Bouchers 18, 1000 Bruxelles");
$etudiant2 = New Etudiant("Sarah","Avenue Louise 123, 1050 Bruxelles");
$etudiant3 = New Etudiant("Matthieu","Place Sainte-Catherine 1, 1000 Bruxelles");
$etudiant4 = New Etudiant("John","Rue du Marché aux Herbes 100, 1000 Bruxelles");
$etudiant5 = New Etudiant("Barbara","Boulevard Anspach 20, 1000 Bruxelles");

//Validation de l'inscription pour 4 étudiants
$etudiant1->inscriptionValide();
$etudiant2->inscriptionValide();
$etudiant4->inscriptionValide();
$etudiant5->inscriptionValide();

//Ajout des notes pour chaque étudiant
$etudiant1->ajouterNote(80);
$etudiant1->ajouterNote(75);
$etudiant1->ajouterNote(85);

$etudiant2->ajouterNote(80);
$etudiant2->ajouterNote(70);
$etudiant2->ajouterNote(60);

$etudiant3->ajouterNote(80);
$etudiant3->ajouterNote(80);

$etudiant4->ajouterNote(100);
$etudiant4->ajouterNote(80);

$etudiant5->ajouterNote(20);
$etudiant5->ajouterNote(50);

//Calcul du grade de chaque étudiant
$etudiant1->donnerGrade();
$etudiant2->donnerGrade();
$etudiant3->donnerGrade();
$etudiant4->donnerGrade();
$etudiant5->donnerGrade();

//Affichage des statuts de chaque étudiant
// Fonction de comparaison pour trier les étudiants par grade
function comparerParGrade($etudiant1, $etudiant2) {
    return $etudiant2->grade - $etudiant1->grade;
}
// Création d'un tableau pour stocker les étudiants
$etudiants = array($etudiant1, $etudiant2, $etudiant3, $etudiant4, $etudiant5);
// Triage des étudiants par grade avec la fonction usort
usort($etudiants, 'comparerParGrade');

// Affichage des statuts de chaque étudiant dans l'ordre de grade
foreach ($etudiants as $etudiant) {
    $etudiant->AfficherProprietesEtudiant();
}
?>