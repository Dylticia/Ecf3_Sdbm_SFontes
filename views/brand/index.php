<?php include 'templates/top.php'; ?>

<div class="container">
    <div class="row">
        <h2>Nos Marques (Crud Complexe) </h2>
    </div>

    <div class="row">
    <div class="text-center ">
        <img src="../templates/asset/marques.jpg" class="rounded" alt="Différentes marques de bière">
        </div>
        <a href="./brand_create" class="btn btn-success mt-3">Créer une marque</a>
        <br>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Numéro</th>
                    <th>Marque</th>
                    <th>Fabricant</th>
                    <th>Pays</th>
                    <th>Continent</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </thead>
                <br>

                <tbody>
                    <?php foreach ($data as $ligne) : ?>
                        <tr>
                            <!-- //on cree les lignes du tableau avec chaque valeur retournée -->
                            <td><?php echo "$ligne[ID_MARQUE]"; ?></td>
                            <td><?php echo "$ligne[NOM_MARQUE]"; ?></td>
                            <td><?php echo "$ligne[NOM_FABRICANT]"; ?></td>
                            <td><?php echo "$ligne[NOM_PAYS]"; ?></td>
                            <td><?php echo "$ligne[NOM_CONTINENT]"; ?></td>
                            <td><a class="btn btn-primary" href="./brand_edit?id=<?php echo $ligne['ID_MARQUE']; ?>">Modifier</a></td>
                            <td><a class="btn btn-danger" href="./brand_delete?id=<?php echo $ligne['ID_MARQUE']; ?>">Supprimer</a></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>


            </table>

        </div>

    </div>

</div>
<?php include 'templates/bottom.php'; ?>