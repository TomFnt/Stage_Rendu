<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/Custom.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="Librairie/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php include "navbar.php"?>

<div class="container p-4">
    <div class="row">
        <article><div class="card text-white border-danger mb-3" style="max-width: 80rem;">
            <div class="card-header bg-danger"><h4 class="card-title text-center">Attention la quantité en stock de ces références est faible </h4></div>
            <div class="card-body">
                <table class='table table-hover mt-2'>
                    <thead class='bg-primary text-light text-center '>
                    <tr>
                        <th>Référence de la cartouche</th>
                        <th> Quantité disponible </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include "Requete/Requete_BDD.php";
                    require "Requete/connexionBdd.php";
                    global $connexion;
                    TableauQteFaible();
                    ?>
                    </tbody>
                </table>
            </div>
    </div>
        </article>
    </div>
</div>
<div class="mt-5">
    <h3 class="text-primary text-center"> Tableau du stock de cartouche : </h3>
</div>

<div class="container">
    <div class="row">
        <form method="get" action="Stock.php">
            <div class="col">
                <input type="text" name="recherche" class="form form-control" style="max-width: 20rem" placeholder="Saisissez une Référence ou une quantité">
            </div>
            <div class="col">
                <input type="submit" class="btn btn-primary" value="Rechercher">
            </div>
        </form>
    </div>
</div>

<table class='table table-hover mt-4'>
    <thead class='bg-primary text-light text-center'>
    <tr>
        <th>Référence de la cartouche</th>
        <th> Quantité disponible </th>
        <th> Ajouter/ Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php

    if(isset($_GET['recherche']))
{
    $recherche=$_GET['recherche'];
    RechercheQteRef($recherche);
}
// requête pour le tableau quantité en stock
else
{
    TableauQteRef();
}
    ?>
    </tbody>
</table>
</div>

<!--script javascript-->
<script>
    function confirmPlus(id)
    {
        if (confirm("Êtes-vous sûr de vouloir ajouter cette référence ?")) {

            var form_id= "formAjout"+id;

            var form_data = $("#formAjout"+id).serialize(); //Encode les éléments du formulaire pour la méthode "POST" ajax
            $.ajax({
                url: "Requete/Ajouter_Ref.php",
                type: "POST",
                data: form_data,
                success:function(response)
                {
                    if(response.resultat = "Ajout réalisé")
                    {
                        alert("l'ajout a été effectué. Rafraîchissez la page pour voir le changement")
                    }
                    else
                    {
                        alert("l'ajout n'a pas été effecuté suite à une erreur")
                    }
                }
            });
        }
        else {}
    }
    function confirmMoins(id)
    {

    }
</script>
</body>
</html>