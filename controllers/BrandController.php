
<?php
//Appel des fichiers models necessaires
require_once 'models/BrandModel.php';
require_once 'models/FactoryModel.php';
require_once 'models/CountryModel.php';


// Déclaration de la class BrandController, le fichier a le même nom 
//que la class qu'il contient:
class BrandController
{
    public function __construct()
    {
    }
 // Déclaration de la méthode "index" de la class BrandController:
    public function index()
    {
        $model = new BrandModel();

        $data = $model->getAll();

        include 'views/brand/index.php';
    }


    // La fonction create vérifie que l'utilisateur a bien précisé les champs
    //avant de les récupérer et de les insérer dans la BDD
    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

            $brandName = htmlentities(trim($_POST['brand']));
            $countryId = htmlentities(trim($_POST['country']));
            $factoryId = htmlentities(trim($_POST['factory']));

            $brandModel = new BrandModel();
            $brandModel->insert($brandName, $countryId, $factoryId);
            header("Location: ./brands");
        } else {
            $factoryModel = new FactoryModel();
            $countryModel = new CountryModel();
            $factories = $factoryModel->getAll();
            $countries = $countryModel->getAll();
            include 'views/brand/create.php';
        }
    }


    // La fonction edit est basée sur l'ID, elle vérifie que l'utilisateur a 
    //bien précisé les champs avant de les récupérer et de modifier la BDD
    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

            $brandName = htmlentities(trim($_POST['brand']));
            $countryId = htmlentities(trim($_POST['country']));
            $factoryId = htmlentities(trim($_POST['factory']));
            $id = htmlentities(trim($_POST['id']));

            $brandModel = new BrandModel();
            $brandModel->edit($id, $brandName, $countryId, $factoryId);
            header("Location: ./brands");
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['id'])) {


            $id = $_GET['id'];
            $brandModel = new BrandModel();
            $factoryModel = new FactoryModel();
            $countryModel = new CountryModel();
            $factories = $factoryModel->getAll();
            $countries = $countryModel->getAll();
            $record = $brandModel->getById($id);
            include 'views/brand/edit.php';
        }
    }

      // La fonction delete est basée sur l'ID, elle permet la suppression dans la BDD
    //du type de bière sélectionné. 
    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {


            $id = htmlentities(trim($_POST['id']));

            $brandModel = new BrandModel();
            $brandModel->delete($id);
            header("Location: ./brands");
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['id'])) {


            $id = $_GET['id'];
            $brandModel = new BrandModel();
            $record = $brandModel->getById($id);
            include 'views/brand/delete.php';
        }
    }
}
