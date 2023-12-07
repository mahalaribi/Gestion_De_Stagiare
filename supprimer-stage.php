<?php
include("connexion.php");
if(isset($_GET['code_stage']))
{
    $code=$_GET['code_stage'];
    $req1="DELETE from stage where id_stage='$code'";
    $res = $conx->query($req1);
}
header('location:listestage.php');
exit;
?>