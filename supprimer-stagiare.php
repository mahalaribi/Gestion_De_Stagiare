<?php
include("connexion.php");
if(isset($_GET['code_ab']))
{
    $code=$_GET['code_ab'];
    $req1="DELETE from affectaion where id_affectation='$code'";
    $res = $conx->query($req1);
}
header('location:listestagiare.php');
exit;
?>