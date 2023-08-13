<?php include 'templates/top.php'; ?>

<div class="container">
    <div class="row">
        <h2>Nos Différents Types de Bières (Crud Simple)</h2>
    </div>

    <div class="row">
    <div class="text-center ">
        <img src="../templates/asset/robbrasserie.jpg" class="rounded" alt="Robinet à bière">
        </div>
        <a href="./type_create" class="btn btn-warning mt-3">Créer un Type</a>
        <br>
        <div class="table-responsive">
            <table class="table table-hover table-bordered ">
                <thead>
                    <th>Numéro</th>
                    <th>Nom</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    
                </thead>
                <br>

                <tbody>
                    <?php foreach ($data as $ligne) : ?>
                        <tr>
                            <!-- //on cree les lignes du tableau avec chaque valeur retournée -->
                            <td><?php echo "$ligne[ID_TYPE]"; ?></td>
                            <td><?php echo "$ligne[NOM_TYPE]"; ?></td>
                            <td><a class="btn btn-warning" href="./type_edit?id=<?php echo $ligne['ID_TYPE']; ?>">Modifier</a></td>
                            <td><a class="btn btn-danger" href="./type_delete?id=<?php echo $ligne['ID_TYPE']; ?>">Supprimer</a></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>


            </table>

        </div>

    </div>

</div>
<?php include 'templates/bottom.php'; ?>