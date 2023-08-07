<?php include 'templates/top.php'; ?>


<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Supprimer</h3>
        </div>
        <br>
        <p>Êtes vous sûr de vouloir supprimer ce type de bière <?php echo $record['NOM_TYPE']; ?> </p>


        <br>
        <div class="form-actions">

            <form class="form-horizontal" action="./type_delete" method="POST">
                <input type="hidden" name="id" value="<?php echo $record['ID_TYPE']; ?>" />
                <button type="submit" class="btn btn-danger">OUI</button>
                <a class="btn btn-secondary" href="./types">NON</a>
            </form>

        </div>

        <br>
    </div>
</div>

<?php
include 'templates/bottom.php';
?>