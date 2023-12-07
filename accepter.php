<?php
include("connexion.php");
session_start(); 
if (!isset($_SESSION["id"])) { // Vérifier si l'utilisateur n'est pas connecté
    header('HTTP/1.0 403 Forbidden'); // Envoyer un en-tête 403 Forbidden
    echo '<div style="colorred">httpp:://page_not_found</div>'; // Afficher un message d'accès refusé
    exit();
}
$date_creation = date("Y-m-d ");
$date_modification=date("Y-m-d ");
if(isset($_GET['code_d']))
{
    $code=$_GET['code_d'];
    $req1 = "UPDATE demande SET etat_demande='accepter', date_modification='$date_modification' WHERE id_demande='$code'";
    $res = $conx->query($req1);
    $req1="INSERT into affectation values(null,'$code','$date_creation ','$date_modification','')";
    $res = $conx->query($req1);
}
header('location:ocation:dash-boardadmin.php');
exit;
?>