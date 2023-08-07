
<?php
// Inclusion du fichier de configuration contenant les informations 
//de connexion à la base de données
require_once 'utils/Database.php';

// Déclaration de la class BeerModel, le fichier a le même nom 
//que la class qu'il contient:
class BeerModel
{
    private $connexion;

    public function __construct()
    {
 // Connexion à la base de données en utilisant les informations de configuration
        $this->connexion = Database::connect();
       
    }

    //La fonction getAll comprend la requete SQL permettant la Sélection 
    //des colonnes dont les champs sont cités après SELECT de la table article
    //les jointures 'LEFT JOIN' permettent de récupérer les informations citées
    // des tables couleur, typebiere et marque:
    public function getAll()
    {
        $requete = $this->connexion->query("SELECT article.ID_ARTICLE, NOM_ARTICLE, VOLUME, PRIX_ACHAT,
        TITRAGE, marque.NOM_MARQUE, couleur.NOM_COULEUR, typebiere.NOM_TYPE FROM article
       LEFT JOIN couleur ON couleur.ID_COULEUR = article.ID_COULEUR
       LEFT JOIN typebiere ON typebiere.ID_TYPE = article.ID_TYPE
       LEFT JOIN marque ON marque.ID_MARQUE = article.ID_TYPE");
    // Exécution de la requête:
        $requete->execute();
   //fetchAll renvoie l'ensemble des resultats sous forme de tableau     
        $data = $requete->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }

    //La fonction getById comprend la requete SQL permettant l'affichage 
    //du détail d'une bière en fonction de son ID 
    public function getById($id)
    {

        $sql = "SELECT article.ID_ARTICLE, NOM_ARTICLE, VOLUME, PRIX_ACHAT, TITRAGE,
        marque.NOM_MARQUE, couleur.NOM_COULEUR, typebiere.NOM_TYPE
        FROM `article` 
        LEFT JOIN couleur ON couleur.ID_COULEUR = article.ID_COULEUR
        LEFT JOIN typebiere ON typebiere.ID_TYPE = article.ID_TYPE 
        LEFT JOIN marque ON marque.ID_MARQUE = article.ID_TYPE 
        WHERE article.ID_ARTICLE = :ID_ARTICLE;";
        $request = $this->connexion->prepare($sql);
        $request->bindParam(':ID_ARTICLE', $id, PDO::PARAM_INT);
        $request->execute();
        $record =  $request->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $record;
    }

    //La fonction getByColor comprend la requete SQL permettant de trier les 
    //bières en fonction de leur couleur

    public function getByColor($colorId)
    {
        $request = $this->connexion->prepare("SELECT article.ID_ARTICLE, NOM_ARTICLE, VOLUME, PRIX_ACHAT,
        TITRAGE, marque.NOM_MARQUE, couleur.NOM_COULEUR, typebiere.NOM_TYPE FROM article
       LEFT JOIN couleur ON couleur.ID_COULEUR = article.ID_COULEUR
       LEFT JOIN typebiere ON typebiere.ID_TYPE = article.ID_TYPE
       LEFT JOIN marque ON marque.ID_MARQUE = article.ID_TYPE WHERE article.ID_COULEUR = :ID_COULEUR");
        $request->bindParam(':ID_COULEUR', $colorId, PDO::PARAM_INT);
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();
        return $data;
    }
}
