
<?php
// Inclusion du fichier de configuration contenant les informations de connexion à la base de données
require_once 'utils/Database.php';


// Déclaration de la class ColorModel, le fichier a le même nom 
//que la class qu'il contient:
class ColorModel
{
    private $connexion;

    public function __construct()
    {
 // Connexion à la base de données en utilisant les informations de configuration:
        $this->connexion = Database::connect();
       
    }

    //La fonction getAll comprend la requete SQL permettant la Sélection 
    //de tous les champs de la table couleur:
        public function getAll()
    {
        $requete = $this->connexion->query("SELECT * FROM couleur");
 // Exécution de la requête:
        $requete->execute();
        $data = $requete->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}
