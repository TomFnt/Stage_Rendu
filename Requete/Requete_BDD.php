<?php

 function NomService()
 {
     include "connexionBdd.php";
     global $connexion;

     //requête pour récupérer les différents services
     $sql = 'SELECT distinct NomService FROM `cartouche_sortie`';
     $l = mysqli_query($connexion, $sql);

  while($ligne = mysqli_fetch_array($l, MYSQLI_BOTH))
  {
      $lignes[]=$ligne;
  }

     $q=mysqli_query($connexion, $sql);
     $nbService = mysqli_num_rows($q);
    $i=0;
     echo "<option id='option$i'>Sélection du service</option>";
     foreach($lignes as $ligne)
     {
         echo "<option id='option$i'>$ligne[NomService]</option>";
        $i++;
     }
 }

//fonction pour affichage du tableau "consommation générale" dans la page Conso_service
 function Conso_generale($limiteur)
 {
     include "connexionBdd.php";
     global $connexion;

     $sql ="SELECT cartouche.NomCartouche, COUNT(cartouche_sortie.CodeBarre) AS quantite FROM cartouche_sortie INNER JOIN cartouche WHERE cartouche_sortie.CodeBarre = cartouche.CodeBarre && cartouche_sortie.NomService= ? GROUP BY cartouche.CodeBarre";
//créer un statement
     $stmt = mysqli_stmt_init($connexion);

//préparation du statement
     if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "échec de la requête";
     }
     else {
//permet de rajouter mes variable php dans la limite de ma requête sql
         mysqli_stmt_bind_param($stmt, "s", $limiteur);
         mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
         $stock_resultat = mysqli_stmt_get_result($stmt);

         while ($cartouche = mysqli_fetch_array($stock_resultat)) {

             echo "<tr>
    <td class='text-center'>$cartouche[NomCartouche]</td>
    <td class='text-center'>$cartouche[quantite]</td>
    </tr>";
         }
     }
 }

//fonction pour affichage du tableau "consommation détaillée" dans la page Conso_service
 function Conso_detaillee($limiteur)
 {
     include "connexionBdd.php";
     global $connexion;
     $sql = "SELECT cartouche.NomCartouche, cartouche_sortie.CodeBarre, cartouche_sortie.DateSortie FROM cartouche_sortie INNER JOIN cartouche WHERE cartouche_sortie.CodeBarre = cartouche.CodeBarre && cartouche_sortie.NomService= ? ORDER BY `cartouche_sortie`.`DateSortie` DESC LIMIT 25 ";

     //créer un statement
     $stmt = mysqli_stmt_init($connexion);

     //préparation du statement
     if (!mysqli_stmt_prepare($stmt, $sql)) {
         echo "échec de la requête";
     }
     else {
         //permet de rajouter mes variable php dans la limite de ma requête sql
         mysqli_stmt_bind_param($stmt, "s", $limiteur);
         mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
         $stock_resultat = mysqli_stmt_get_result($stmt);

         while ($cartouche = mysqli_fetch_array($stock_resultat)) {

             echo "<tr>
    <td class='text-center'>$cartouche[NomCartouche]</td>
    <td class='text-center'>$cartouche[CodeBarre]</td>
    <td class='text-center'>$cartouche[DateSortie]</td>
    </tr>";
         }
     }
 }
        function TableauReference($parPage,$premiereReference)
        {
            include "connexionBdd.php";
            global $connexion;
            //requête pour le tableau stock
            $sql= "SELECT * FROM `cartouche` ORDER BY `NomCartouche` DESC LIMIT ?, ?";

            //créer un statement
            $stmt= mysqli_stmt_init($connexion);

            //préparation du statement
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "échec de la requête";
            }
            else {
//permet de rajouter mes variable php dans la limite de ma requête sql
                mysqli_stmt_bind_param($stmt, "ii", $premiereReference, $parPage);
                mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
                $stock_resultat = mysqli_stmt_get_result($stmt);

                while ($Reference = mysqli_fetch_array($stock_resultat)) {
                    $id = $Reference['IdCartouche'];
                    echo "<tr>
<td class='text-center' id='ligne_Id$id'>$Reference[IdCartouche]</td>
    <td class='text-center' id='ligne_Ref$id'>$Reference[NomCartouche]</td>
    <td class='text-center' id='ligne_CodeBarre$id'>$Reference[CodeBarre]</td>
    <td class='text-center'>
    <button class='btn btn-primary'id='modif_$id' data-id='$id' onclick='modif($id)'>Modifier</button>
    </tr>";
                }
                echo "</tbody>
    </table>
    <nav>";
            }
        }

        function TabRefRecherche($recherche)
        {
            $recherche=$recherche."%";
        include "connexionBdd.php";
            global $connexion;
            //requête pour le tableau stock
            $sql= "SELECT * FROM `cartouche` WHERE NomCartouche LIKE ? OR CodeBarre LIKE ? ORDER BY `NomCartouche` DESC ";

            //créer un statement
            $stmt= mysqli_stmt_init($connexion);

            //préparation du statement
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "échec de la requête";
            }
            else {
//permet de rajouter mes variable php dans la limite de ma requête sql
                mysqli_stmt_bind_param($stmt, "ss", $recherche, $recherche);
                mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
                $stock_resultat = mysqli_stmt_get_result($stmt);

                while ($Reference = mysqli_fetch_array($stock_resultat)) {
                    $id = $Reference['IdCartouche'];
                    echo "<tr>
<td class='text-center' id='ligne_Id$id'>$Reference[IdCartouche]</td>
    <td class='text-center' id='ligne_Ref$id'>$Reference[NomCartouche]</td>
    <td class='text-center' id='ligne_CodeBarre$id'>$Reference[CodeBarre]</td>
    <td class='text-center'>
    <button class='btn btn-primary'id='modif_$id' data-id='$id' onclick='modif($id)'>Modifier</button>

    </tr>";
                }
                echo "</tbody>
    </table>
    <nav hidden>";
            }
        }


        function TableauQteRef()
        {
     include "connexionBdd.php";
     global $connexion;
            $sql= "SELECT cartouche.NomCartouche, COUNT(cartouche_entree.CodeBarre) AS qteEntree, cartouche_entree.IdEntree FROM cartouche_entree INNER JOIN cartouche WHERE cartouche_entree.CodeBarre = cartouche.CodeBarre GROUP BY cartouche.CodeBarre";

//créer un statement
            $stmt2= mysqli_stmt_init($connexion);

//préparation du statement
            if (!mysqli_stmt_prepare($stmt2,$sql)){
                echo "échec de la requête";
            }
            else {
//permet de rajouter mes variable php dans la limite de ma requête sql
                mysqli_stmt_execute($stmt2);
                $quantite_resultat = mysqli_stmt_get_result($stmt2);

                //permet de compter le nombre de référence différente (total de référence = dernière ligne du tableau quantité)

                while ($Reference = mysqli_fetch_array($quantite_resultat, MYSQLI_ASSOC)) {
                    $id = $Reference['IdEntree'];
                    echo "<tr>
<form id='formAjout$id'>
    <td class='text-center'><input class='form-control' name='RefQte' type='text' id='RefQte$id' value='$Reference[NomCartouche]' disabled='' style='max-width: 20rem;'></td>
    <td class='text-center'>$Reference[qteEntree]</td>
    <td>
        <div class='container'>
          <div class='row row justify-content-end'>
          <div class='col-4'>
            <input class='form-control form-control-sm' type='number' value='0' id='nbRep$id' name='nbRep' >
          </div>
          <div class='col-4'>
  <input type='button' value='+' class='btn btn-primary btn-sm' id='btnPlus_$id' data-id='$id' onclick='confirmPlus($id)'>
  <input type='button' value='-' class='btn btn-danger btn-sm' id='btnMoins_$id' data-id='$id' onclick='confirmMoins($id)'>
             </div>
  </div>
</div> 
        </form>  
    </td>
    </div>
    </tr>";
                }
            }
        }

        function RechercheQteRef($recherche)
        {
            $recherche= $recherche."%";
            include "connexionBdd.php";
            global $connexion;

            $sql= "SELECT cartouche.NomCartouche, COUNT(cartouche_entree.CodeBarre) AS qteEntree, cartouche_entree.IdEntree FROM cartouche_entree INNER JOIN cartouche WHERE cartouche_entree.CodeBarre = cartouche.CodeBarre && cartouche.NomCartouche = ? GROUP BY cartouche.CodeBarre";

//créer un statement
            $stmt2= mysqli_stmt_init($connexion);

//préparation du statement
            if (!mysqli_stmt_prepare($stmt2,$sql)){
                echo "échec de la requête";
            }
            else {
//permet de rajouter mes variable php dans la limite de ma requête sql

                mysqli_stmt_bind_param($stmt2,"s", $recherche);
                mysqli_stmt_execute($stmt2);
                $quantite_resultat = mysqli_stmt_get_result($stmt2);

                //permet de compter le nombre de référence différente (total de référence = dernière ligne du tableau quantité)

                while ($Reference = mysqli_fetch_array($quantite_resultat, MYSQLI_ASSOC)) {
                    $id = $Reference['IdEntree'];
                    echo "<tr>
<form id='formAjout$id'>
    <td class='text-center'><input class='form-control' name='RefQte' type='text' id='RefQte$id' value='$Reference[NomCartouche]' disabled='' style='max-width: 20rem;'></td>
    <td class='text-center'>$Reference[qteEntree]</td>
    <td>
        <div class='container'>
          <div class='row row justify-content-end'>
          <div class='col-4'>
            <input class='form-control form-control-sm' type='number' value='0' id='nbRep$id' name='nbRep' >
          </div>
          <div class='col-4'>
  <input type='button' value='+' class='btn btn-primary btn-sm' id='btnPlus_$id' data-id='$id' onclick='confirmPlus($id)'>
  <input type='button' value='-' class='btn btn-danger btn-sm' id='btnMoins_$id' data-id='$id' onclick='confirmMoins($id)'>
             </div>
  </div>
</div> 
        </form>  
    </td>
    </div>
    </tr>";
                }
            }
        }

        function TableauQteFaible(){

            include "connexionBdd.php";
            global $connexion;
            $sql= "SELECT COUNT(*) AS nb_cartouche, NomCartouche FROM cartouche GROUP BY NomCartouche HAVING nb_cartouche =1 OR nb_cartouche =2";

//créer un statement
            $stmt2= mysqli_stmt_init($connexion);

//préparation du statement
            if (!mysqli_stmt_prepare($stmt2,$sql)){
                echo "échec de la requête";
            }
            else {
//permet de rajouter mes variable php dans la limite de ma requête sql
                mysqli_stmt_execute($stmt2);
                $quantite_resultat = mysqli_stmt_get_result($stmt2);

                //permet de compter le nombre de référence différente (total de référence = dernière ligne du tableau quantité)
                while ($Reference = mysqli_fetch_array($quantite_resultat, MYSQLI_ASSOC)) {

                    echo "<tr>
    <td class='text-center'>$Reference[NomCartouche]</td>
    <td class='text-center'>$Reference[nb_cartouche]</td>
    </tr>";
                }
            }
        }

        function OPH_Entree()
        {

        }
        function OPH_Sortie()
        {

        }
