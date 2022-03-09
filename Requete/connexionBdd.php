<?php
#Connection a la base de données

$connexion=mysqli_connect('localhost','root','root','stage_gestion_cartouche');
if(!$connexion) {
    die('erreur de connexion : ' . mysqli_connect_error());
}
return $connexion;