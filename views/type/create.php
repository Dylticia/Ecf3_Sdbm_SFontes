<?php include 'templates/top.php'; ?>

<div class="container">
    <div class="row">
        <br />
        <h3>Ajouter un type de bière</h3>
    </div>

 <!-- La méthode Post envoie les informations vers la page citée dans action -->
    <form method="post" action="./type_create" class="row g-3">
        <div class="col-md-4">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Créer</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-secondary" href="./types">Retour</a>
            </div>
        </div>
    </form>


    <?php
    include 'templates/bottom.php';
    ?>