<?php
 session_start(); 
 if (!isset($_SESSION["id"])) { // Vérifier si l'utilisateur n'est pas connecté
     header('HTTP/1.0 403 Forbidden'); // Envoyer un en-tête 403 Forbidden
     echo '<div style="colorred">httpp:://page_not_found</div>'; // Afficher un message d'accès refusé
     exit();
 }
include("connexion.php");
$id_stagiare="";
$prenom="";
$ville="";
$nom="";
$adresse="";
$num="";
if($_SERVER["REQUEST_METHOD"]=='GET'){ 
if(!isset($_GET['code_u']))
{
header("locations:profil.php");
exit;
}
$id_stagiare=$_GET['code_u'];
$req="SELECT * from stagiare where id_stagiare='$id_stagiare'";
$res=$conx->query($req);
$row=$res->fetch_assoc();
while(!$row)
{
    header("locations:profil.php");
   exit;
}
$id_stagiare=$row['id_stagiare'];
$prenom=$row['prenom'];
$ville=$row['ville'];
$nom=$row['nom'];
$num=$row['num'];
$adresse=$row['adress'];
$image=$row['image'];
}
else 
{ 
$id_stagiare=$_POST['id_stagiare'];
$prenom=$_POST['prenom'];
$ville=$_POST['ville'];
$nom=$_POST['nom'];
$num=$_POST['num'];
$adresse=$_POST['adresse'];
$date_modif=date("Y-m-d ");

$req2="UPDATE stagiare set  prenom='$prenom', date_modification=' $date_modif' , adress='$adresse' , nom='$nom',ville='$ville',num='$num' where id_stagiare=' $id_stagiare'";
$res=$conx->query($req2);
header("location:profil.php");
}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier profil</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	  <scripy src="stylesheet" href="bootstrap/css/bootstrap.js">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
        .header
        {
            min-height:60px;
            max-width: 1700px;
        }
        .left
        {
             min-height:715px;
           
             background-color:#edeeed; 
         
        }
        .row1
        {
            max-width: 1700px;
            background-color:; 
         
        }
        .image-stage
        {
        max-width:100px;
        max-height: 100px;
        margin-left:20px;
        }
        .image-profil
        {
        max-width:70px;
        max-height: 70px;
        margin-left:20px;
        }
        .input-ajout
        {
            margin:9px;
            margin-left:20px;
            max-width:420px;
           
        }
        .btn1-ajouter
        {
        margin-right:60px;
        }

        .div-flex
        {
            margin-top:40px;
            margin-right:90px;
            margin-bottom:30px;
        }

       

    </style>
</head>
<body>
        <?php 
            require('header.php');
            // pour appeler un page dans une autre page
            ?>                
    <div class="main-container">
        <div  class="row1 row"> 
            <div style="background-color:#edeeed;" class=" left  col col-md-2"> 
            <?php 
            require('leftetudiant.php');
            // pour appeler un page dans une autre page
            ?>    
            </div>



            <div style=""class=" ml-2  col-md-10">
            <h4 style="margin-left:50px;margin-top:35px; "> <i class="bi bi-info-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
            </svg>Modifier profil : </i></h4>
        <form name='form' enctype="multipart/form-data" style="max-width:930px;margin-left:230px;margin-top:30px;"class="card"  method='post'>
        <img class="rounded-circle" style="margin-left:50px;margin-top:10px;max-width:230px;max-height:230px;margin-bottom:5px;" id="img" src="<?= $image;?>">
         <div class="row g-3">
            <div class="col">
            <input type="hidden" class="input-ajout form-control" value='<?= $id_stagiare;?>' name="id_stagiare" id="nom"  placeholder="Nom" required>
            <input type="text" class="input-ajout form-control" value='<?= $nom;?>'name="nom" id="nom"  placeholder="Nom" required>
            <input type="text" class="form-control input-ajout " value="<?=$prenom;?>" name="prenom"   id="Prenom" placeholder="Prenom" required>
            <input type="text" class="form-control input-ajout " name="num" value="<?= $num;?>" placeholder="Num tel " required>

            </div>
            <div class="col">
            <div class="  input-ajout">
                <select class="form-select" name="ville">
                <option value='<?=$ville;?>'selected><?=$ville;?></option>
                <option value="Tunisie">Tunisie</option>
                <option value="Bizerte">Bizerte</option>
                <option value="Ben-arousse">Ben arousse</option>
                <option value="Ariana">Ariana</option>
                <option value="Manouba">Manouba</option>
                <option value="nabeul">nabeul</option>
                <option value="Sousse">Sousse</option>
                <option value="Monastir">Monastir</option>
                <option value="Djerba">Djerba </option>
                <option value="Jandouba">Jandouba</option>
                <option value="Gafsa">Gafsa</option>
                <option value="Mednine">Mednine</option>
                <option value="Tozeur">Touzeur</option>
                <option value="khasserine">khasserine</option>
                <option value="Tatouine">Tatouine</option> 
                <option value="Gbeli">Gbeli</option>
                <option value="Gabesse">Gabesse</option>
                <option value="Mahdia">Mahdia</option>
                <option value="Sfax">Sfax</option>
                <option value="Sidi bouzide">Sfax</option>
                <option value="karouen">Sfax</option>
                <option value="kef">Sfax</option>
                <option value="Seliana">Sfax</option>
                <option value="Beja">Sfax</option>
                </select>
            </div>
        <input type="text" class="form-control input-ajout " name="adresse" value="<?= $adresse;?>"  placeholder="Adresse" required>
     </div>
          </div>
         <div class="div-flex d-flex justify-content-end">
           <button type="submit"  class="btn btn1-ajouter btn-primary" name="valide"><i class="bi bi-check-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
           <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
           <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
           </svg>Modifier</i></button>
           
           <button type="reset" class="btn  btn-danger" name="anuuler"><i class="bi bi-dash-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
            </svg>annuler</i></button>
         </div>
               </form>
            </div>
        </div>
    </div>