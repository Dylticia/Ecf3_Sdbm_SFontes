
<?php
// Inclusion du fichier de configuration contenant les informations de connexion à la base de données
require_once 'utils/Database.php';



// Déclaration de la class FactoryModel, le fichier a le même nom 
//que la class qu'il contient:
class FactoryModel
{
    private $connexion;

    public function __construct()
    {

        $this->connexion = Database::connect();
        // Connexion à la base de données en utilisant les informations de configuration
    }

    public function getAll()
    {
        $requete = $this->connexion->query("SELECT ID_FABRICANT AS ID, NOM_FABRICANT AS NOM FROM fabricant");
              // Exécution de la requête:
        $requete->execute();
        //fetchAll renvoie l'ensemble des resultats sous forme de tableau :
        $data = $requete->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }

   
}
