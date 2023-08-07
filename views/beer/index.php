<?php
    include 'templates/top.php';

?>
<div class="container">
        <div class="row">
            <h2>Toutes nos bières</h2>
        </div>
        <div class="row">
        <div class="text-center ">
        <img src="../templates/asset/menbierA.jpg" class="rounded" alt="apéro entre amis">
        </div>
            <div class="table-responsive">
    
                <table class="table table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                        <th>Numéro</th>
                        <th>Nom</th>
                        <th>Volume</th>
                        <th>Marque</th>
                        <th>Couleur</th>
                        <th>Type</th>
                        <th>Edition</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($data as $ligne): ?>
                        <tr>
                            <!-- //on cree les lignes du tableau avec chaque valeur retournée --> 
                        <td><?php echo"$ligne[ID_ARTICLE]";?></td>
                        <td><?php echo"$ligne[NOM_ARTICLE]";?></td>
                        <td><?php echo"$ligne[VOLUME]";?></td>
                        <td><?php echo"$ligne[NOM_MARQUE]";?></td>
                        <td><?php echo"$ligne[NOM_COULEUR]";?></td>
                        <td><?php echo"$ligne[NOM_TYPE]";?></td>
                        <td><?php echo '<a class="btn btn-primary" href="./beer?id=' . $ligne['ID_ARTICLE'] . '">Détails</a>';?></td>
                        </tr>
                    </tbody> 
                    <?php endforeach;?>
                </table> 
            </div>  
        </div>   
    </div>
    <?php
    include 'templates/bottom.php';  
?>