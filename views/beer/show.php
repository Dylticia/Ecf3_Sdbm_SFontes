<?php include 'templates/top.php'; ?>

<div class="container">
    <br />
    <div class="span10 offset1">
        <br />
        <div class="row">
            <br />
            <h3>Plus d'informations</h3>
            <p>
        </div>
        <br />
        <div class="form-horizontal">
            <br />
            <div class="control-group">
                <label class="control-label">Identifiant de la Bière</label>
                <br />
                <div class="controls">
                    <!-- Cette page permet l'affichage de tous les champs de la table biere -->
                    <label class="checkbox"> <?php echo $record['ID_ARTICLE']; ?> </label>
                </div>
            </div>
            <label class="control-label">Nom de la Bière</label>
            <br />
            <div class="controls">
                <!-- Cette page permet l'affichage de tous les champs de la table biere -->
                <label class="checkbox"> <?php echo $record['NOM_ARTICLE']; ?> </label>
            </div>
        </div>
        <br />
        <div class="control-group">
            <label class="control-label">Volume de la Bière</label>
            <br />
            <div class="controls">
                <label class="checkbox"> <?php echo $record['VOLUME']; ?> </label>
            </div>
        </div>
        <br />
        <div class="control-group">
            <label class="control-label">Marque de la Bière</label>
            <br />
            <div class="controls">
                <label class="checkbox"><?php echo $record['NOM_MARQUE']; ?></label>
            </div>
        </div>
        <br />
        <div class="control-group">
            <label class="control-label">Couleur de la Bière</label>
            <br />
            <div class="controls">
                <label class="checkbox"><?php echo $record['NOM_COULEUR']; ?> </label>
            </div>
        </div>
        <br />
        <div class="control-group">
            <label class="control-label">Type de la Bière</label>
            <br />
            <div class="controls">
                <label class="checkbox"> <?php echo $record['NOM_TYPE']; ?> </label>
            </div>
        </div>
        <br />
        <div class="control-group">
            <label class="control-label">Prix d'achat</label>
            <br />
            <div class="controls">
                <label class="checkbox"> <?php echo $record['PRIX_ACHAT']; ?> </label>
            </div>
        </div> 
         <br />
        <div class="control-group">
            <label class="control-label">Titrage de la Bière</label>
            <br />
            <div class="controls">
                <label class="checkbox"> <?php echo $record['TITRAGE']; ?> </label>
            </div>
                  </div>
        <br />
        <br />
        <div class="form-actions">
            <a class="btn btn-warning" href="./beers">Retour</a>
        </div>
    </div>
</div>
</div>


<?php include 'templates/bottom.php';  ?>