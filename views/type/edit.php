<?php include 'templates/top.php'; ?>

<div class="container">
    <div class="row">
        <br />
        <h3>Ajouter un type de bière</h3>
    </div>


    <form method="post" action="./type_edit" class="row g-3">
        <div class="col-md-4">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="<?php echo !empty($record['NOM_TYPE']) ? $record['NOM_TYPE'] : ''; ?>" required>
        </div>
        
        <div class="col-md-12">
            <div class="col-md-6">
                <input type="hidden" name="id" value="<?php echo !empty($record['ID_TYPE']) ? $record['ID_TYPE'] : ''; ?>">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-secondary" href="./types">Retour</a>
            </div>
        </div>
    </form>


    <?php
    include 'templates/bottom.php';
    ?>