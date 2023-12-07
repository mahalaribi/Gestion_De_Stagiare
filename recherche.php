<?php 
session_start(); 
include("connexion.php");
 if (!isset($_SESSION["id"])) { // Vérifier si l'utilisateur n'est pas connecté
     header('HTTP/1.0 403 Forbidden'); // Envoyer un en-tête 403 Forbidden
     echo '<div style="colorred">httpp:://page_not_found</div>'; // Afficher un message d'accès refusé
     exit();
 }
if(isset($_POST['input'])){
$input=$_POST['input'];
$res=mysqli_query($conx,"SELECT * from user where role='secritaire' and nom like '{$input}%' OR prenom like '{$input}%' limit 6");
if(mysqli_num_rows($res)>0){?>
<table style="margin-top:40px;" class="table table-bordered table-striped mt-4" >
    <tr>
    <th>code secritaire</th>
    <th>Nom</th>
    <th>prenom</th>

    </tr>
<?php 
while($row=mysqli_fetch_assoc($res))
{
    $id=$row['id_user'];
    $nom=$row['nom'];
    $prenom=$row['prenom'];

}
?>
<tr>
    <td><?=$id;?></td>
    <td><?=$nom;?></td>
    <td><?=$prenom;?></td> 
</tr>
<?php
}
else{
    echo ' <div style="margin-left:50px;color:red;margin-top:40px;max-width:400px;" ">
    not found...
  </div>';
}
}
?>