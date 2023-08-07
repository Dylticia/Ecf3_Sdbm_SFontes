
<?php
// Inclusion du fichier de configuration contenant les informations de connexion à la base de données
require_once 'utils/Database.php';



// Déclaration de la class CountryModel, le fichier a le même nom 
//que la class qu'il contient:
class CountryModel
{
    private $connexion;

    public function __construct()
    {
  // Connexion à la base de données en utilisant les informations de configuration:
        $this->connexion = Database::connect();
      
    }

     //La fonction getAll comprend la requete SQL permettant la Sélection 
      //des colonnes dont les champs sont cités après SELECT de la table pays:
    public function getAll()
    {
        $requete = $this->connexion->query("SELECT ID_PAYS AS ID, NOM_PAYS AS NOM FROM pays");
          // Exécution de la requête:
        $requete->execute();
      //fetchAll renvoie l'ensemble des resultats sous forme de tableau :
        $data = $requete->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }

   
}
