
<?php
 $servername = "127.0.0.1";
 $username = "root";
 $password= "";
 $bdname ="gestion_de_stage";
 $conx=new mysqli($servername, $username,$password,$bdname);
  if($conx->connect_error)
  {
    die("connection faild".$conx->connect_error);
  }


?>
