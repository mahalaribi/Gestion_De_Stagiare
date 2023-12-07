<?php
include("connexion.php");
if(isset($_GET['code_ab']))
{
    $code=$_GET['code_ab'];
    $req1="DELETE from absence_secrittaire where id_absence='$code'";
    $res = $conx->query($req1);
}
header('location:listeabsencesecritaire.php');
exit;
?>