
<?php
//Appel des fichiers models necessaires
require_once 'models/BeerModel.php';
require_once 'models/ColorModel.php';

// Déclaration de la class BeerController, le fichier a le même nom 
//que la class qu'il contient:
class BeerController
{
    public function __construct()
    {
    }
    // Déclaration de la méthode "index" de la class BeerController:
    public function index()
    {
        $model = new BeerModel();

        $data = $model->getAll();

        include 'views/beer/index.php';
    }

    // La fonction show vérifie si l'ID est présent et le récupère
    //et dirige vers la page affichant les bières sinon vers la page erreur 404
    public function show()
    {
        if (!empty($_GET['id'])) {

            $id = $_GET['id'];
            $model = new BeerModel();

            $record = $model->getById($id);

            include 'views/beer/show.php';
        } else {
            include 'templates/404.php';
        }
    }

// la fonction suivante permet d'afficher toutes les bières
// et si l'utilisateur choisit une couleur, d'afficher
// le tableau des bières de la bonne couleur
    public function filterByColor()
    {
        $colorModel = new ColorModel();
        $colors = $colorModel->getAll();
        if (!empty($_POST['color'])) {

            $colorId = $_POST['color'];
            $model = new BeerModel();
            $data = $model->getByColor($colorId);

            include 'views/beer/filter_by_color.php';
        } else {

            $model = new BeerModel();
            $data = $model->getAll();
            include 'views/beer/filter_by_color.php';
        }
    }
}
