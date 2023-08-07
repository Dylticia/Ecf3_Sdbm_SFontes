<?php

// routes.php
//Définition de l'url (URI = Uniform Resource Identifie)
$request_uri = $_SERVER['REQUEST_URI'];
//explode — Scinde une chaîne de caractères en segments à parir de '/' 
//pour récupérer le nom de la page
$parts = explode('/', $request_uri);
$page =  '/' . end($parts);
//Vérification de l'url, si contient le nom de la page, il nous le renvoie
if (str_contains($page, '?')) {
    $page = explode('?', $page)[0];
}
// Definition des routes dans une variable sous forme de tableau
$routes = [
    
    // Définition des chemins selon les pages du site sous le schéma:
    //chemin visible par l'utilisateur => 'Action :controller concerné@fichier_de_vue'
    '/beers' => 'BeerController@index',
    '/beer' => 'BeerController@show',
    '/brands' => 'BrandController@index',
    '/brand_create' => 'BrandController@create',
    '/brand_edit' => 'BrandController@edit',
    '/brand_delete' => 'BrandController@delete',
    '/beer_by_color' => 'BeerController@filterByColor',
    '/types' => 'TypeController@index',  
    '/type_create' => 'TypeController@create',  
    '/type_edit' => 'TypeController@edit',
    '/type_delete' => 'TypeController@delete',
];

// Trouve le contrôleur approprié et l'action en fonction de l'URI de la requête
$controller = null;
$action = null;

//Foreach permet de parcourir le tableau de la variable $route afin de cibler
//si les variables sont identiques, pour renvoyer vers la bonne page
foreach ($routes as $route => $target) {
    if ($page === $route) {
        [$controller, $action] = explode('@', $target);
        break;
    }
}
// Vérification si le contrôleur et l'action ont été trouvés dans les routes
if ($controller && $action) {
    // Inclure le fichier du contrôleur et appeler l'action
    include 'controllers/' . $controller . '.php';
    $controllerInstance = new $controller();
    $controllerInstance->$action();
} else {
    // Afficher une page 404 ou traiter la demande en conséquence
    include 'templates/404.php';
}
