<?php
include("connexion.php");
if(isset($_GET['code_sec']))
{
    $code=$_GET['code_sec'];
    $req1="DELETE from user where id_user='$code'";
    $res = $conx->query($req1);
}
header('location:listsecritaire.php');
exit;
?>