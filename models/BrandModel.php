
<?php
// Inclusion du fichier de configuration contenant les informations de connexion à la base de données
require_once 'utils/Database.php';


// Déclaration de la class BrandModel, le fichier a le même nom 
//que la class qu'il contient:
class BrandModel
{
    private $connexion;

    public function __construct()
    {

        $this->connexion = Database::connect();
        // Connexion à la base de données en utilisant les informations de configuration
    }

        //La fonction getAll comprend la requete SQL permettant la Sélection 
    //des colonnes dont les champs sont cités après SELECT de la table article
    //les jointures 'LEFT JOIN' permettent de récupérer les informations citées
    // des tables couleur, typebiere et marque:
    public function getAll()
    {
        $requete = $this->connexion->query("SELECT ID_MARQUE, NOM_MARQUE, pays.NOM_PAYS, fabricant.NOM_FABRICANT, continent.NOM_CONTINENT
        FROM marque
          LEFT JOIN pays ON pays.ID_PAYS = marque.ID_PAYS
          LEFT JOIN fabricant ON fabricant.ID_FABRICANT = marque.ID_FABRICANT
          LEFT JOIN continent ON PAYS.ID_CONTINENT = continent.ID_CONTINENT
          ORDER BY ID_MARQUE DESC");
            // Exécution de la requête:
        $requete->execute();
       //fetchAll renvoie l'ensemble des resultats sous forme de tableau :
        $data = $requete->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }

    //La fonction insert comprend la requete SQL permettant de créer une nouvelle marque 
    //grace au complément des champs nécessaires, après avoir généré un nouvel ID
    public function insert($nomMarque, $idPays, $idFabricant)
    {
        $idMarque = $this->generateId();
        $request = $this->connexion->prepare("INSERT INTO marque(ID_MARQUE, NOM_MARQUE, ID_PAYS, ID_FABRICANT) VALUES (:ID_MARQUE, :NOM_MARQUE, :ID_PAYS, :ID_FABRICANT)");
        $request->bindParam(':ID_MARQUE', $idMarque, PDO::PARAM_INT);
        $request->bindParam(':NOM_MARQUE', $nomMarque, PDO::PARAM_STR);
        $request->bindParam(':ID_PAYS', $idPays, PDO::PARAM_INT);
        $request->bindParam(':ID_FABRICANT', $idFabricant, PDO::PARAM_INT);
        $request->execute();
        Database::disconnect();
    }


    //La fonction generateId comprend la requete SQL permettant de récupérer le dernier
    // ID de la BDD et de lui rajouter 1 afin d'avoir un nouvel id dans la continuité 
    private function generateId()
    {
        $request = $this->connexion->prepare("SELECT MAX(ID_MARQUE) as lastID FROM marque");
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);
        $lastId = $result['lastID'];
        return $lastId + 1;
    }
    
     //La fonction getById comprend la requete SQL permettant de savoir sur quelle marque  
     // va avoir lui l'action en fonction de son ID (elle récupère l'ID)
    public function getById($id)
    {

        $request = $this->connexion->prepare("SELECT * FROM marque where ID_MARQUE = :ID_MARQUE");
        $request->bindParam(':ID_MARQUE', $id, PDO::PARAM_INT);
        $request->execute();
        $record =  $request->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $record;
    }


     //La fonction edit comprend la requete SQL permettant de modifier une marque 
     //dans la BDD en modifiant chaque champ nécessaire
    public function edit($id, $brandName, $countryId, $factoryId)
    {
        
        $request = $this->connexion->prepare("UPDATE marque SET NOM_MARQUE = :NOM_MARQUE, ID_PAYS= :ID_PAYS, ID_FABRICANT= :ID_FABRICANT WHERE ID_MARQUE = :ID_MARQUE");
        $request->bindParam(':ID_MARQUE', $id, PDO::PARAM_INT);
        $request->bindParam(':NOM_MARQUE', $brandName, PDO::PARAM_STR);
        $request->bindParam(':ID_PAYS', $countryId, PDO::PARAM_INT);
        $request->bindParam(':ID_FABRICANT', $factoryId, PDO::PARAM_INT);
        $request->execute();
        Database::disconnect();
    }

     //La fonction delete comprend la requete SQL permettant de supprimer une marque 
     //dans la BDD en fonction de l'ID
    public function delete($id)
    {
        
        $request = $this->connexion->prepare("DELETE FROM marque WHERE ID_MARQUE = :ID_MARQUE");
        $request->bindParam(':ID_MARQUE', $id, PDO::PARAM_INT);
        $request->execute();
        Database::disconnect();
    }
}
