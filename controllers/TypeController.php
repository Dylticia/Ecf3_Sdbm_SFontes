
<?php
//Appel des fichiers models necessaires
require_once 'models/TypeModel.php';

class TypeController
{
    public function __construct()
    {
    }
// Déclaration de la class TypeController, le fichier a le même nom 
//que la class qu'il contient:
    public function index()
    {
        $model = new TypeModel();

        $data = $model->getAll();

        include 'views/type/index.php';
    }


     // La fonction create vérifie que l'utilisateur a bien précisé les champs
    //avant de les récupérer et de les insérer dans la BDD
    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

            $typeName = htmlentities(trim($_POST['type']));
            
            $typeModel = new TypeModel();
            $typeModel->insert($typeName);
            header("Location: ./types");
        } else {
            
            include 'views/type/create.php';
        }
    }


    // La fonction edit est basée sur l'ID, elle vérifie que l'utilisateur a 
    //bien précisé les champs avant de les récupérer et de modifier la BDD
    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

            $typeName = htmlentities(trim($_POST['type']));
            $id = htmlentities(trim($_POST['id']));

            $typeModel = new TypeModel();
            $typeModel->edit($id, $typeName);
            header("Location: ./types");
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['id'])) {


            $id = $_GET['id'];
            $typeModel = new TypeModel();
            $record = $typeModel->getById($id);
            include 'views/type/edit.php';
        }
    }

    // La fonction delete est basée sur l'ID, elle permet la suppression 
    //du type de bière sélectionner dans la BDD
    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {


            $id = htmlentities(trim($_POST['id']));

            $typeModel = new TypeModel();
            $typeModel->delete($id);
            header("Location: ./types");
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['id'])) {


            $id = $_GET['id'];
            $typeModel = new TypeModel();
            $record = $typeModel->getById($id);
            include 'views/type/delete.php';
        }
    }
}
