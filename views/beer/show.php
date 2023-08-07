<?php include 'templates/top.php'; ?>

<div class="container">
    <br />
    <div class="span10 offset1">
        <br />
        <div class="row">
            <br />
            <h3>Détails</h3>
            <p>
        </div>
        <p>
            <br />
        <div class="form-horizontal">
            <br />
            <div class="control-group">
                
                <label class="control-label">Nom de la Bière</label>
                <br />
                <div class="controls">
                     <!-- Cette page permet l'affichage de tous les champs de la table biere -->
                    <label class="checkbox"> <?php echo $record['NOM_ARTICLE']; ?> </label>
                </div>
                <p>
            </div>
            <p>
                <br />
            <div class="control-group">
                <label class="control-label">Volume de la Bière</label>
                <br />
                <div class="controls">
                    <label class="checkbox"> <?php echo $record['VOLUME']; ?> </label>
                </div>
                <p>
            </div>
            <p>
                <br />
            <div class="control-group">
                <label class="control-label">Marque de la Bière</label>
                <br />
                <div class="controls">
                    <label class="checkbox"><?php echo $record['NOM_MARQUE']; ?></label>
                </div>
                <p>
            </div>
            <p>
                <br />
            <div class="control-group">
                <label class="control-label">Couleur de la Bière</label>
                <br />
                <div class="controls">
                    <label class="checkbox"><?php echo $record['NOM_COULEUR']; ?> </label>
                </div>
                <p>

            </div>
            <p>
                <br />
            <div class="control-group">
                <label class="control-label">Type de la Bière</label>
                <br />
                <div class="controls">
                    <label class="checkbox"> <?php echo $record['NOM_TYPE']; ?> </label>
                </div>
                <p>

            </div>
            <p>
                <br />
                <br />
            <div class="form-actions">
                <a class="btn btn-success" href="./beers">Retour</a>
            </div>
            <p>
        </div>
        <p>
    </div>
    <p>
</div>
<p>


    <?php include 'templates/bottom.php';  ?>