<?php include 'templates/top.php'; ?>
 <!--  Inclure le fichier top contenant la barre de navigation-->

<div class="container">
    <br />
    <div class="row">
        <h2>Nos bières par couleur</h2>
        <div class="text-center ">
        <img src="../templates/asset/couleurs.jpg" class="rounded" alt="Les couleurs de bière">
        </div>
    </div>
    <div class="container justify-content-center d-flex mt-1">
        <div class="col-md-7 col-lg-8">
            <form action="./beer_by_color" method="post">
                <div class="col-md-4">
                    <label for="color" class="form-label">Choisissez votre couleur:</label>
                    <select class="form-select" name="color" id="color" required>
                        <option selected disabled value="">Sélectionner la couleur</option>
                        {# Création d'une liste déroulante à partir de la table couleur #}
                        <?php foreach ($colors as $value) : ?>
                            <option value="<?php echo $value['ID_COULEUR']; ?>"><?php echo $value['NOM_COULEUR']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
                <div class="mb-4 mt-4">
                    <button type="submit" name="inscription" class="btn btn-warning"> Valider votre choix</button>

                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Volume</th>
                        <th>Marque</th>
                        <th>Type</th>
                        <th>Couleur</th>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                 <!--  Envoi le tableau de toutes les bières -->
                                <!--  autre syntaxe pour if : si le row est != null tu l'affiche, sinon tu affiches une chaine vide. -->
                                <td><?php echo ($row['ID_ARTICLE'] != null ? $row['ID_ARTICLE'] : ''); ?></td>
                                <td><?php echo ($row['NOM_ARTICLE'] != null ? $row['NOM_ARTICLE'] : ''); ?></td>
                                <td><?php echo ($row['VOLUME'] != null ? $row['VOLUME'] : ''); ?></td>
                                <td><?php echo ($row['NOM_MARQUE'] != null ? $row['NOM_MARQUE'] : ''); ?></td>
                                <td><?php echo ($row['NOM_TYPE'] != null ? $row['NOM_TYPE'] : ''); ?></td>
                                <td><?php echo ($row['NOM_COULEUR'] != null ? $row['NOM_COULEUR'] : ''); ?></td>

                            </tr>
                    </tbody>
                <?php endforeach; ?>

                </tbody>
                </table>
            </div>
        </div>
    </div>

<!--  Inclure le fichier bootom contenant le script pour le JS de Bootstrap-->
    <?php include 'templates/bottom.php';  ?>