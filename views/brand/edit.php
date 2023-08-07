<?php include 'templates/top.php'; ?>

<div class="container">
    <div class="row">
        <br />
        <h3>Ajouter une marque de bière</h3>
    </div>


    <form method="post" action="./brand_edit" class="row g-3">
        <div class="col-md-4">
            <label for="brand" class="form-label">Marque</label>
            <input type="text" class="form-control" id="brand" name="brand" value="<?php echo !empty($record['NOM_MARQUE']) ? $record['NOM_MARQUE'] : ''; ?>" required>


        </div>


        <div class="col-md-4">
            <label for="factory" class="form-label">Choisissez le fabricant:</label>
            <select class="form-select" name="factory" id="factory" required>
                <option selected disabled value="">Sélectionner le fabricant</option>

                <?php foreach ($factories as $value) : ?>
                    <option <?php echo $record['ID_FABRICANT'] == $value['ID'] ?  'selected' : ''; ?> value="<?php echo $value['ID']; ?>"><?php echo $value['NOM']; ?></option>
                <?php endforeach; ?>



            </select>
        </div>

        <div class="col-md-4">
            <label for="country" class="form-label">Choisissez votre pays:</label>
            <select class="form-select" name="country" id="country" required>
                <option selected disabled value="">Sélectionner le pays de la Bière</option>

                <?php foreach ($countries as $value) : ?>
                    <option <?php echo $record['ID_PAYS'] == $value['ID'] ?  'selected' : ''; ?> value="<?php echo $value['ID']; ?>"><?php echo $value['NOM']; ?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <input type="hidden" name="id" value="<?php echo !empty($record['ID_MARQUE']) ? $record['ID_MARQUE'] : ''; ?>">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-secondary" href="./brands">Retour</a>
            </div>
        </div>
    </form>


    <?php
    include 'templates/bottom.php';
    ?>