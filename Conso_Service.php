<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accordeon</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<!-- Barre de navigation-->
<?php include "navbar.php";
$i=1?>
<!--Fin barre de navigation-->

<div class="h1 text-primary text-center m-4 text-decoration-underline">
    <h1 class="px-5"> Consommation détaillée des différents services : </h1>
</div>

<!--Début bloc sélection du service-->
<div class="container">
    <div class="card border-secondary mt-5 mb-4" style="max-width: 80rem;">
        <div class="card-header h4 text-center"><h4 class="text-dark">Choisissez un Service afin d'afficher sa consommation</h4> </div>
        <div class="card-body">
            <form class="form-group" action="Conso_Service.php" method="get">
                <article>
                <label for="exampleSelect1">Nom du service :</label>
                <select class="form-select" id="Select" onclick="select()" name="service">
                    <?php include "Requete/Requete_BDD.php";
                    require "Requete/connexionBdd.php";
                    global $connexion;
                    NomService();?>
                </select>
                    <input type="submit" value="Valider" class="btn-primary btn-lg mt-2">
            </form>
            </article>
        </div>
        <!--Fin bloc sélection du service-->
</div>
<!--Bloc accordéon des différents services-->
    <div class="container" id="Conso">
<div class="row">
    <?php
    if(isset($_GET['service']))
    {
        $limiteur= $_GET['service'];
    }
    else
    {
        $limiteur = "Centre_Social";
    }
    ?>
                <div class="h3 mt-3 mb-4" >
                    <h3 class="px-5 text-dark text-center"> Consommation générale du service : <strong><?=$limiteur?></strong></h3>
                </div>
                <!--Début tableau-->
                <table class="table" id="table_generale">
                    <thead>
                    <tr class="bg-primary text-light text-center">
                        <th scope="col">Référence de la cartouche</th>
                        <th scope="col">Quantité</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                   <?php
                             Conso_generale($limiteur);
                   ?>
                    </tr>
                    </tbody>
                </table>
                <!--Fin tableau-->

                <div class="h3 text-center mt-3 mb-4">
                    <h3 class="px-5 text-dark"> Consommation détaillée du service : <strong><?=$limiteur?></strong></h3>
                </div>
                <!--Début tableau-->
                <table class="table" id="table_detaille">
                    <thead>
                    <tr class="bg-primary text-light text-center">
                        <th scope="col">Référence de la cartouche</th>
                        <th scope="col">CodeBarre</th>
                        <th scope="col"> Date de récupération</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php

                            Conso_detaillee($limiteur);

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!--Script Javascript-->
<script>
function select()
{

}
</script>
</body>
</html>