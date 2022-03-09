<?php

require_once "Requete/connexionBdd.php";
global $connexion;

$sql = 'SELECT COUNT(*) AS nb_cartouche,NomService FROM cartouche_sortie GROUP BY NomService';
$Get_Infos_Sortie = mysqli_query($connexion, $sql);
if ($sql) {
    $Labels = array();
    $Data = array();
    while ($Data_Sortie = mysqli_fetch_array($Get_Infos_Sortie)) {

        $Labels[] = $Data_Sortie['NomService'];
        $Data[] = $Data_Sortie['nb_cartouche'];

    }
    $Labels_Json = json_encode($Labels);
    $Data_Json = json_encode($Data, JSON_NUMERIC_CHECK);

}
//requête pour récupérer les différents services
$sql = 'SELECT distinct NomService FROM `cartouche_sortie`';
$l = mysqli_query($connexion, $sql);

$nbService = mysqli_num_rows($l);
$nbService_Json = json_encode($nbService, JSON_NUMERIC_CHECK);

while ($ligne = mysqli_fetch_array($l)) {
    $lignes[] = $ligne;
}