<?php
include "connexionBdd.php";
global $connexion;

    $NouvReference =$_POST["modif_Ref"];
    $NouvCodeBarre=$_POST["modif_CodeBarre"];
    $id =$_POST['modif_Id'];

    if (!empty($NouvReference) && !empty($NouvCodeBarre))
    {
        $sql = "UPDATE `cartouche` SET `NomCartouche`= ? , `CodeBarre`= ? WHERE `IdCartouche` = ? ";

        $stmt=mysqli_stmt_init($connexion);


        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "échec de la requête";
        }
        else {
            //permet de rajouter mes variable php dans la limite de ma requête sql
            mysqli_stmt_bind_param($stmt, "ssi", $NouvReference, $NouvCodeBarre, $id);
            mysqli_stmt_execute($stmt); //exécute ma requête dans la BDD
            echo"la modification a été effectué";
        }
}
?>

