
<?php
// Inclusion du fichier de configuration contenant les informations de connexion à la base de données
require_once 'utils/Database.php';



// Déclaration de la class TypeModel, le fichier a le même nom 
//que la class qu'il contient:
class TypeModel
{
    private $connexion;

    public function __construct()
    {
// Connexion à la base de données en utilisant les informations de configuration:
        $this->connexion = Database::connect();
        
    }
   //La fonction getAll comprend la requete SQL permettant la Sélection 
      //des colonnes dont les champs sont cités après SELECT de la table typebiere:
    public function getAll()
    {
        $requete = $this->connexion->query("SELECT * FROM typebiere ORDER BY ID_TYPE DESC");
        $requete->execute();
        // Exécution de la requête
        $data = $requete->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }


     //La fonction insert comprend la requete SQL permettant de créer un nouveau type de biere 
    //grace au complément des champs nécessaires, après avoir généré un nouvel ID
    public function insert($nomType)
    {
        $idType = $this->generateId();
        $request = $this->connexion->prepare("INSERT INTO typebiere (ID_TYPE,NOM_TYPE) VALUES (:ID_TYPE, :NOM_TYPE)");
        $request->bindParam(':ID_TYPE', $idType, PDO::PARAM_INT);
        $request->bindParam(':NOM_TYPE', $nomType, PDO::PARAM_STR);
        $request->execute();
        Database::disconnect();
    }

    //La fonction generateId comprend la requete SQL permettant de récupérer le dernier
    // ID de la BDD et de lui rajouter 1 afin d'avoir un nouvel id dans la continuité 
    private function generateId()
    {
        $request = $this->connexion->prepare("SELECT MAX(ID_TYPE) as lastID FROM typebiere");
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);
        $lastId = $result['lastID'];
        return $lastId + 1;
    }

   //La fonction getById comprend la requete SQL permettant de savoir sur type de biere 
     // va avoir lui l'action en fonction de son ID (elle récupère l'ID)
    public function getById($id)
    {

        $request = $this->connexion->prepare("SELECT * FROM typebiere where ID_TYPE = :ID_TYPE");
        $request->bindParam(':ID_TYPE', $id, PDO::PARAM_INT);
        $request->execute();
        $record =  $request->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $record;
    }

      //La fonction edit comprend la requete SQL permettant de modifier un type de bière 
     //dans la BDD en modifiant chaque champ nécessaire
    public function edit($id, $typeName)
    {
        
        $request = $this->connexion->prepare("UPDATE typebiere SET NOM_TYPE = :NOM_TYPE WHERE ID_TYPE = :ID_TYPE");
        $request->bindParam(':ID_TYPE', $id, PDO::PARAM_INT);
        $request->bindParam(':NOM_TYPE', $typeName, PDO::PARAM_STR);
        $request->execute();
        Database::disconnect();
    }

     //La fonction delete comprend la requete SQL permettant de supprimer un type 
     //dans la BDD en fonction de l'ID sélectionné par l'utilisateur:
    public function delete($id)
    {
        
        $request = $this->connexion->prepare("DELETE FROM typebiere WHERE ID_TYPE = :ID_TYPE");
        $request->bindParam(':ID_TYPE', $id, PDO::PARAM_INT);
        $request->execute();
        Database::disconnect();
    }
    
}
