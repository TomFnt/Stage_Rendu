<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock de cartouche</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/Custom.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<?php include "navbar.php"?>

<div class="h1 text-primary text-center m-4 text-decoration-underline">
    <h1 class="px-5"> Consommation détaillée des différents services : </h1>
</div>

<!--Début bloc sélection du service-->
<div class="container">
    <div class="row justify-content-center">

            <div class="card border-secondary mt-5 mb-4" style="max-width: 80rem;">
                <div class="card-header h4 text-center"><h4 class="text-dark">Choisissez un Service afin d'afficher sa consommation</h4> </div>
                <div class="card-body">
                    <form class="form-group" action="Fichier_OPH.php" method="get">
                        <div class="col-6">
                            <label>Date du fichier OPH :</label>
                            <input type="date" name="date" class="form form-control" style="max-width: 20rem;">
                        </div>
                        <div class="col-6">
                            <input type="submit" value="Valider" class="btn btn-primary mt-2">
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
        <!--Fin bloc sélection du service-->
    </div>

    <!-- Gère l'affichage du contenu des fichier OPH :  défaut / pas de sélction date = hidden, GET une date = affiche les div "container" et "row"-->
    <div class="container" id="Conso" >
        <div class="row">
            <?php
            if(isset($_GET['date']))
            {
                echo"<div class='container' id='Conso' >
        <div class='row'>";
                $date=$_GET['date'];
            }

            else
            {
                echo"<div class='container' id='Conso' hidden >
        <div class='row'>";
            }
            ?>


            <!--Fin bloc tableau OPH entree-->
            <div class="mt-5">
                <h3 class="text-dark text-center"> Tableau des entrées de cartouches réalisées le <strong><?= $date?></strong> : </h3>
            </div>
            <table class='table table-hover mt-4'>
                <thead class='bg-primary text-light text-center '>
                <tr>
                    <th>Code-barre</th>
                    <th> Date d'entrée</th>

                </tr>
                </thead>
                <tbody>
                <?php
                include "Requete/connexionBdd.php";
                global $connexion;

                if (isset($_GET['date']))
                {
                    $date=$_GET['date'];
                    //ma requête pour le tableau stock
                    $sql= "SELECT * FROM `cartouche_entree` WHERE DateEntree= ? ORDER BY DateEntree LIMIT 15";

                    //créer un statement
                    $stmt= mysqli_stmt_init($connexion);

                    //préparation du statement
                    if (!mysqli_stmt_prepare($stmt,$sql)){
                        echo "échec de la requête";
                    }
                    else
                    {
                        //permet de rajouter mes variable php dans la limite de ma requête sql
                        mysqli_stmt_bind_param($stmt,"s",$date);
                        mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
                        $stock_resultat = mysqli_stmt_get_result($stmt);

                        while ($cartouche = mysqli_fetch_array($stock_resultat)){
                            echo "<tr>
            <td class='text-center'>$cartouche[CodeBarre]</td>
            <td class='text-center'>$cartouche[DateEntree]</td>
            </tr>";
                        }
                    }
                }
                else{}
                ?>

                </tbody>
            </table>
            <!--Fin bloc tableau OPH entree-->

            <!--Début bloc tableau OPH Sortie-->
            <div class="mt-5">
                <h3 class="text-dark text-center"> Tableau des Cartouches sorties réalisées le <strong><?= $date?></strong> : </h3>
            </div>
            <table class='table table-hover mt-4'>
                <thead class='bg-primary text-light text-center '>
                <tr>
                    <th>Code-barre</th>
                    <th> Date de sortie</th>
                    <th> Service </th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "Requete/connexionBdd.php";
                global $connexion;

                if (isset($_GET['date']))
                {
                    $date=$_GET['date'];
                    //ma requête pour le tableau stock
                    $sql= "SELECT * FROM `cartouche_sortie` WHERE DateSortie= ? ORDER BY DateSortie LIMIT 15";

                    //créer un statement
                    $stmt= mysqli_stmt_init($connexion);

                    //préparation du statement
                    if (!mysqli_stmt_prepare($stmt,$sql)){
                        echo "échec de la requête";
                    }
                    else
                    {
                        //permet de rajouter mes variable php dans la limite de ma requête sql
                        mysqli_stmt_bind_param($stmt,"s",$date);
                        mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
                        $stock_resultat = mysqli_stmt_get_result($stmt);

                        while ($cartouche = mysqli_fetch_array($stock_resultat)){
                            echo "<tr>
            <td class='text-center'>$cartouche[CodeBarre]</td>
            <td class='text-center'>$cartouche[DateSortie]</td>
            <td class='text-center'>$cartouche[NomService]</td>
            </tr>";
                        }
                    }
                }
                else{}
                ?>
                </tbody>
            </table>
            <!--Fin bloc tableau OPH Sortie-->
</body>

</html>