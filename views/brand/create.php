<?php include 'templates/top.php'; ?>

<div class="container">
    <div class="row">
        <br />
        <h3>Ajouter une marque de bière</h3>
    </div>

 <!-- La méthode Post envoie les informations vers la page citée dans action -->
    <form method="post" action="./brand_create" class="row g-3">
        <div class="col-md-4 my-4">
            <label for="brand" class="form-label">Marque</label>
            <input type="text" class="form-control" id="brand" name="brand" required>

        </div>


        <div class="col-md-4 my-4">
            <label for="factory" class="form-label">Choisissez le fabricant:</label>
            <select class="form-select" name="factory" id="factory" required>
                <option selected disabled value="">Sélectionner le fabricant</option>
 
                <!-- Affichage de la liste déroulante des fabricants -->
                <?php foreach ($factories as $value) : ?>
                    <option value="<?php echo $value['ID']; ?>"><?php echo $value['NOM']; ?></option>
                <?php endforeach; ?>

            </select>
        </div>

        <div class="col-md-4 my-4">
            <label for="country" class="form-label">Choisissez votre pays:</label>
            <select class="form-select" name="country" id="country" required>
                <option selected disabled value="">Sélectionner le pays de la Bière</option>
                
 
                <!-- Affichage de la liste déroulante des pays : -->

                <?php foreach ($countries as $value) : ?>
                    <option value="<?php echo $value['ID']; ?>"><?php echo $value['NOM']; ?></option>
                <?php endforeach; ?>

            </select>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <button type="submit" class="btn btn-warning">Créer</button>
            </div>
            <div class="col-md-6">
                <a class="btn " href="./brands">Retour</a>
            </div>
        </div>
    </form>


    <?php
    include 'templates/bottom.php';
    ?>