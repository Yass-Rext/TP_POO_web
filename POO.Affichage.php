<?php
session_start();

// Récupération des données
$_SESSION['numINE'] = $_POST['NumINE'] ?? '';
$_SESSION['prenom'] = $_POST['Prenom'] ?? '';
$_SESSION['nom'] = $_POST['Nom'] ?? '';
$_SESSION['age'] = $_POST['Age'] ?? '';
$_SESSION['genre'] = $_POST['Genre'] ?? '';
$_SESSION['campus'] = $_POST['Campus'] ?? '';
$_SESSION['specialite'] = $_POST['Specialite'] ?? '';

// Classe Etudiant
class Etudiant {
    public $numINE;
    public $prenom;
    public $nom;
    public $age;
    public $genre;
    public $campus;
    public $specialite;
    
    // Méthode d'affichage
    function affichage() {
        echo '<!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Informations Étudiant</title>
            <style>
                body { font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; background-color: #f5f7fa; color: #333; max-width: 800px; margin: 0 auto; padding: 20px; }
                h1 { color: #2c3e50; text-align: center; margin-bottom: 30px; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
                .student-info { background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 25px; margin-top: 20px; }
                .info-item { margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #eee; display: flex; }
                .info-label { font-weight: bold; color: #3498db; min-width: 120px; }
                .info-value { color: #2c3e50; }
                .no-data { text-align: center; color: #e74c3c; background-color: #fadbd8; padding: 15px; border-radius: 5px; margin-top: 20px; }
                .intro-text { font-style: italic; color: #7f8c8d; margin-bottom: 20px; }
                .buttons { text-align: center; margin-top: 20px; }
                .buttons a { padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 16px; margin-right: 10px; }
                .validate { background-color: #2ecc71; color: white; }
                .cancel { background-color: #e74c3c; color: white; }
            </style>
        </head>
        <body>
            <h1>Informations de l\'Étudiant</h1>
            <div class="student-info">
                <p class="intro-text">Les informations de l\'étudiant sont :</p>';
        
        $this->displayInfoItem('NumINE', $this->numINE);
        $this->displayInfoItem('Prénom', $this->prenom);
        $this->displayInfoItem('Nom', $this->nom);
        $this->displayInfoItem('Âge', $this->age);
        $this->displayInfoItem('Genre', $this->genre);
        $this->displayInfoItem('Campus', $this->campus);
        $this->displayInfoItem('Spécialité', $this->specialite);
        
        // Ajout des boutons Valider et Annuler
        echo '<div class="buttons">
                <a href="POO.insert.php" class="validate">Valider</a>
                <a href="POO.inscription.html" class="cancel">Annuler</a>
              </div>';

        echo '</div>
        </body>
        </html>';
    }
    
    private function displayInfoItem($label, $value) {
        echo '<div class="info-item">
                <span class="info-label">'.$label.' :</span>
                <span class="info-value">'.$value.'</span>
              </div>';
    }
}

// Vérification si les données existent
if (!empty($_SESSION['numINE'])) {
    $etudiant = new Etudiant();
    
    // Affectation des valeurs
    $etudiant->numINE = $_SESSION['numINE'];
    $etudiant->prenom = $_SESSION['prenom'];
    $etudiant->nom = $_SESSION['nom'];
    $etudiant->age = $_SESSION['age'];
    $etudiant->genre = $_SESSION['genre'];
    $etudiant->campus = $_SESSION['campus'];
    $etudiant->specialite = $_SESSION['specialite'];

    // Affichage des informations
    $etudiant->affichage();
} else {
    echo '<div class="no-data">Aucune donnée d\'étudiant trouvée.</div>';
}
?>
