<?php
include "../connexionBdd.php";
global $connexion;


if (isset ($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH'])=='XMLHTTPREQUEST') //vérifie que la requête ajax envoyé  par ma fonction js est correcte
{

    if($_POST['action']=="confirmSupp" && isset($_POST['id']))
    {
        $Suppid = $_POST['id'];

        $sql = "DELETE FROM cartouche WHERE IdCartouche= ? ";

        $stmt = mysqli_stmt_init($connexion);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $resultat= "échec de la requête";
        }

        else
        {
            //permet de rajouter mes variable php dans la limite de ma requête sql
            mysqli_stmt_bind_param($stmt, "i",  $Suppid);
            mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
        }


        $resultat="suppression réalisée";
        response($Suppid, $resultat);
    }
    else
    {

        $Suppid = $_POST['id'];
        $resultat= "erreur";
        response($Suppid, $resultat);
}

}
function response($Suppid, $resultat)
{
    header('Content-Type: application/json');

    $response = [
        "ID_suppression" => $Suppid,
        "resultat" => $resultat
    ];

    echo json_encode($response);
}

