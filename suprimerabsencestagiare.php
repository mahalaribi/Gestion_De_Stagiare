<?php
include("connexion.php");
if(isset($_GET['code_ab']))
{
    $code=$_GET['code_ab'];
    $req1="DELETE from abcence_stagiare where id_absence='$code'";
    $res = $conx->query($req1);
}
header("location:listeabsencestagiare.php");
exit;
?>