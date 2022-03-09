<?php

include "connexionBdd.php";
global $connexion;


if (isset ($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) == 'XMLHTTPREQUEST') //vérifie que la requête ajax envoyé  par ma fonction js est correcte
{

    if (isset($_POST['Ref'])) {

        $nouvRef = $_POST['Ref'];
        $nouvCodeBarre= $_POST['CodeBarre'];

        $sql = "INSERT INTO cartouche (NomCartouche, CodeBarre) VALUES (?, ?) ";

        $stmt = mysqli_stmt_init($connexion);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $resultat = "échec de la requête";
        } else {
            //permet de rajouter mes variable php dans la limite de ma requête sql
            mysqli_stmt_bind_param($stmt, "ss", $nouvRef, $nouvCodeBarre);
            mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
        }

        $resultat = "Ajout réalisé";
        response($resultat);
    } else {

        $resultat = "erreur";
        response($resultat);
    }

}
function response($resultat)
{
    header('Content-Type: application/json');

    $response = [
        "resultat" => $resultat
    ];

    echo json_encode($response);
}