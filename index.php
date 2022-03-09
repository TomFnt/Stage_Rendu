<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/Custom.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="Librairie/chart.js/Chart.bundle.js"></script>
</head>
<body>

<!-- Barre de navigation-->
<?php include "navbar.php"?>
<!--Fin barre de navigation-->

<?php
require "Requete/requete_graph.php";
global $Labels_Json;
global $Data_Json;
global $nbService_Json;
?>
<div class="container-fluid p-4">
        <div class="row justify-content-center">
            <!--bloc "Stock Cartouche"-->
            <div class=" col-6">
                <div class="card border-secondary mb-3" style="max-width: 20rem;">
                    <div class="card-header"><h3 class="text-center pb-3"> Nombre de Références :</h3>
                    </div>
                    <div class="card-body">
                <?php
                  include "Requete/connexionBdd.php";
                  global $connexion;

                  $sql="SELECT COUNT(DISTINCT NomCartouche) AS qteRef FROM cartouche ORDER BY NomCartouche";
                //créer un statement
                $stmt= mysqli_stmt_init($connexion);

                //préparation du statement
                if (!mysqli_stmt_prepare($stmt,$sql)){
                    echo "échec de la requête";
                }
                else {
                //permet de rajouter mes variable php dans la limite de ma requête sql
                mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
                $stock_resultat = mysqli_stmt_get_result($stmt);

                while ($Reference = mysqli_fetch_array($stock_resultat)) {
                    echo "<h3 class=' text-dark text-center'><strong>$Reference[qteRef]</strong></h3>";
}
                }
                ?>
            </div>
                </div>
            </div>


            <!--bloc "Nombre de cartouche en stock "-->
            <div class=" col-6">
            <div class="card border-secondary mb-3" style="max-width: 20rem;">
                <div class="card-header"><h3 class="text-center pb-3"> Nombre de cartouche en stock </h3></div>
                <div class="card-body">
                    <?php
                    include "Requete/connexionBdd.php";
                    global $connexion;

                    $sql="SELECT COUNT(cartouche_entree.CodeBarre) AS quantite FROM cartouche_entree INNER JOIN cartouche WHERE cartouche_entree.CodeBarre = cartouche.CodeBarre";
                    //créer un statement
                    $stmt= mysqli_stmt_init($connexion);

                    //préparation du statement
                    if (!mysqli_stmt_prepare($stmt,$sql)){
                        echo "échec de la requête";
                    }
                    else {
                        //permet de rajouter mes variable php dans la limite de ma requête sql
                        mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
                        $stock_resultat = mysqli_stmt_get_result($stmt);

                        while ($Reference = mysqli_fetch_array($stock_resultat)) {
                            echo "<h3 class=' text-dark text-center'><strong>$Reference[quantite]</strong></h3>";
                        }
                    }
                    ?>
                </div>
            </div>
            </div>
            <!-- bloc graphique -->
            <div class="col-xl-10 col-lg-10 p-5">
                <div class="card-header py-3 ">
                    <h6 class="m-0 font-weight-bold text-primary">Graphique de la consommation de cartouche </h6>
                </div>
                <div>
                    <canvas id="GraphIndex"  width="250" height="100" ></canvas>
                </div>
            </div

            <!--Fin bloc graphique-->
        </div>
    </div>
</div>
<!--Script Java-->
    <script>
console.log(<?php echo $Labels_Json; ?>)
console.log(<?php echo $Data_Json; ?>)
console.log(<?php echo $nbService_Json;?>)
//générateur de couleurs
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) //s'arrête quand on a nos 6 caractères pour la couleur en Hex
    {
        color += letters[Math.floor(Math.random() * 16)]; //choisi un caractère au hasard
    }
    return color;
}

//création du graphique
var ctx = document.getElementById('GraphIndex').getContext('2d');
var chart = new Chart(ctx, {
    // Le type de graphique créer
    type: 'doughnut',

    // configuration des paramètres et des données affichés par le graphique
    data: {
        labels: <?php echo $Labels_Json; ?>,
        datasets: [{
            label: "a",
            data: <?php echo $Data_Json; ?>,
            backgroundColor: [
                <?php for($i=0; $i <$nbService_Json; $i++): ?>
                getRandomColor(),
                <?php endfor ?>
            ],
        }]
    },

    // Configuration options go here
    options: {

    }
});
    </script>
</body>
</html>
