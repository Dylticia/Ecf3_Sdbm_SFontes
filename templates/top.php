
<!DOCTYPE html>
 <html lang="fr">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../templates/asset/style.css">
    <title>SDBM</title>
 </head>
 
 <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> -->
 <nav class="navbar bg-body-tertiary">
  <div class="container-fluid ">
    <a class="navbar-brand" href="./beers">SDBM - Société de Distribution des Bières du Monde</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Nos Bières</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body" style="background-color: #b99676;">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        
          <li class="nav-item">
            <a class="nav-link" href="./beers">Toutes Nos Bières</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./beer_by_color">Par Couleur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./types">Par Type (CRUD simple)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./brands">Par Marques (CRUD complexe)</a>
          </li>
        </ul>
         </div>
    </div>
  </div>
</nav>

 <body>