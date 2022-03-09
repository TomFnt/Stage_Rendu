<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau Référenciel</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/Custom.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="Librairie/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php include "navbar.php"?>

<div class="container-fluid p-4">
    <div class="row">
        <!-- début bloc ajouter une nouvelle référence-->
        <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card border-secondary" >
                <div class="card-header"><h4 class="card-title">Ajouter une nouvelle référence :</h4></div>
                <div class="card-body">

                    <form id="formAjout">
                        <div class="form-group m-3">

                            <div class="form-floating mb-3" >
                                <input type="text" class="form-control" id="Ref" name="Ref" >
                                <label for="Ref">Référence </label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="CodeBarre" name="CodeBarre">
                                <label for="CodeBarre">Code-barre </label>
                            </div>
                            <input type="button" onclick="ajout()" class="btn btn-primary btn-lg"  value="Ajouter" />
                    </form>
                </div>
            </div>
        </article>
        <!--fin bloc ajouter une nouvel élément-->

        <!-- début bloc modifier une référence-->
        <article  id="blocModif" class="col-xs-12 col-sm-12 col-md-6 col-lg-6" hidden>
            <div class="card border-secondary " >
                <div class="card-header"><h4 class="card-title">Modifier une référence :</h4></div>
                <div class="card-body">

                    <form id="formModif" method="post" action="Requete/Modifier_Ref.php">
                        <div class="form-group m-3">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="modif_Id" name="modif_Id" value="" readonly="">
                                <label for="modif_CodeBarre">Id Cartouche </label>
                            </div>
                            <div class="form-floating mb-3" >
                                <input type="text" class="form-control" id="modif_Ref" name="modif_Ref" value="">
                                <label for="modif_Ref">Référence </label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="modif_CodeBarre" name="modif_CodeBarre" value="">
                                <label for="modif_CodeBarre">Code-barre </label>
                            </div>
                            <input type="submit" class="btn btn-primary btn-lg"  value="Valider" />
                    </form>
                </div>
            </div>
        </article>
    </div>
    <!--fin bloc modifier une référence-->


    <!--Début partie tableau référence-->
    <div class="mt-5">
        <h3 class="text-primary text-center"> Tableau des références : </h3>
    </div>

    <div class="container">
        <div class="row">
            <form method="get" action="Tableau_reference.php">
                <div class="col">
                    <input type="text" name="recherche" class="form form-control" style="max-width: 20rem" placeholder="Saisissez une Référence ou un code-barre">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="Rechercher">
                </div>
            </form>
        </div>
    </div>
    <table class='table table-hover mt-4'>
        <thead class='bg-primary text-light text-center '>
        <tr><th> ID Cartouche</th>
            <th>Référence de la cartouche</th>
            <th> Code Barre </th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //détermine sur quelle page on se trouve
        if (isset($_GET['page']) && !empty($_GET['page'])){
            $pageActuelle = (int) strip_tags($_GET['page']);
        }
        else{
            $pageActuelle = 1;
        }
        //permet de compter le nb de reference au total
        include "Requete/connexionBdd.php";
        global $connexion;
        //permet de compter le nb de reference au total
        $sql = 'SELECT COUNT(*) AS nb_reference FROM cartouche';
        $q= mysqli_query($connexion,$sql);

        $resultat= mysqli_fetch_array($q);
        $nbReference = (int) $resultat['nb_reference'];

        $parPage=10;

        //calcule le nb de page au total
        $totalPages = ceil($nbReference / $parPage);
        // Calcul de la 1ère cartouche à afficher en haut de mon tableau
        $premiereReference = ($pageActuelle * $parPage)- $parPage;


        if(isset($_GET['recherche']))
        {
            $recherche= $_GET['recherche'];
           require "Requete/Requete_BDD.php";
           TabRefRecherche($recherche);
        }
        else
        {
            require "Requete/Requete_BDD.php";
            TableauReference($parPage,$premiereReference);
        }
        //requête pour le tableau des références

        ?>
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($pageActuelle == 1) ? "disabled" : "" ?>">
                <a href="?page=<?= $pageActuelle - 1 ?>" class="page-link">&laquo;</a>
            </li>
            <?php for($page = 1; $page <= $totalPages; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($pageActuelle == $page) ? "active" : "" ?>">
                    <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($pageActuelle == $totalPages) ? "disabled" : "" ?>">
                <a href="?page=<?= $pageActuelle + 1 ?>" class="page-link">&raquo;</a>
            </li>
        </ul>
    </nav>
    <!--Fin partie tableau référence -->

    <!--script java-->
    <script src="Fonction_Javascript/Test.js"></script>
    <script>

        function ajout(){


            if (confirm("Êtes-vous sûr de vouloir ajouter cette référence ?")) {
                var form_data = $("#formAjout").serialize(); //Encode les éléments du formulaire pour la méthode "POST" ajax
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
    </script>
</body>
</html>
