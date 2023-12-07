<?php
session_start(); 
include("connexion.php");
 if (!isset($_SESSION["id"])) { // Vérifier si l'utilisateur n'est pas connecté
     header('HTTP/1.0 403 Forbidden'); // Envoyer un en-tête 403 Forbidden
     echo '<div style="colorred">httpp:://page_not_found</div>'; // Afficher un message d'accès refusé
     exit();
 }
 $date_modification="";
$titre="";
$sujet="";
$date_deb="";
$date_fin="";
$duree="";
$encadrent="";
$image="";
$content="";
 if(isset($_FILES['image']))
 {
 // Lire le contenu du fichier d'image
 $content = file_get_contents($_FILES['image']['tmp_name']);
 // Échapper les caractères spéciaux dans le contenu de l'image
 $content = mysqli_real_escape_string($conx, $content);
 }
 $id_stage=$_GET['code_stage'];
 if($_SERVER["REQUEST_METHOD"]=='GET' ){ 
  
 if(!isset($_GET['code_stage']))
 {
 header("locations:listestage.php");
 exit;
 }
 $id_stage=$_GET['code_stage'];
 $req="SELECT * from stage where id_stage='$id_stage'";
 $res=$conx->query($req);
 $row=$res->fetch_assoc();
 while(!$row)
 {
     header("locations:listestage.php");
    exit;
 }
 $id_stage=$row['id_stage'];
 $titre=$row['titre'];
 $sujet=$row['sujet'];
 $encadrent=$row['nom_encadrent'];
 $date_deb=$row['date_debut'];
 $date_fin=$row['date_fin'];
 $duree=$row['duree'];
 $image=$row['image'];
$content=$row['content'];
 }
 else {
    $titre=$_POST['titre'];
    $sujet=$_POST['sujet'];
    $nom_encadrent=$_POST['encadrent'];
    $date_deb=$_POST['datedeb'];
    $date_fin=$_POST['datefin'];
    $duree=$_POST['duree'];
    $date_modification=date("Y-m-d ");
     $req2="UPDATE stage set  titre='$titre', date_modification='  $date_modification' , sujet='$sujet', date_debut='$date_deb',date_fin='$date_fin',nom_encadrent='$nom_encadrent' ,image='".$_FILES['image']['name']."',content='$content' where id_stage='$id_stage' ";
     $res=$conx->query($req2);
    header("location:listestage.php");
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	  <scripy src="stylesheet" href="bootstrap/css/bootstrap.js">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
         .input-ajout
        {
            margin:9px;
            margin-left:20px;
            max-width:420px;
            
        }
        
        .row1
        {
            max-width: 1700px;
        }
        .div-flex
        {
            margin-right:90px;
            margin-bottom:15px;
        }
        .btn1-ajouter
        {
        margin-right:60px;
        }
        /* drop deow */
       

    </style>
</head>
<body>
          <?php 
            require('headeradmin.php');
            // pour appeler un page dans une autre page
            ?>                
    <div class="main-container">
        <div  class="row1 row"> 
            <div style="background-color:#edeeed;" class=" left  col col-md-2"> 
            <?php 
            require('leftadmin.php');
            // pour appeler un page dans une autre page
            ?>   
            </div>



            <div class=" ml-2  col-md-10">
            <h4 style="margin-left:15px;margin-top:20px;margin-bottom:20px;"><i class="bi bi-info-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
            </svg>Modifier stage:</i></h4>  
                      <form name="f" enctype="multipart/form-data" method="POST" style="max-width:930px;margin-left:200px;"class="card">
        <img class="rounded-circle"style="margin-left:50px;margin-top:10px;max-width:300px;max-height:300px;margin-bottom:20px;" id="img" src="img/12.jpg">
        <div class="row g-3">
            <div class="col">
            
            <label style="margin-left:30px; color:blue;font-size:18px;">titre de stage:</label>
            <input type="text" class=" input-ajout form-control" name="titre"value="<?=$titre;?>" placeholder="Titre de Stgae" required>
            <label style="margin-left:30px; color:blue;font-size:18px;">Date début stage:</label>   
            <input type="date" class="input-ajout form-control" name="datedeb" id="datedeb"value="<?=$date_deb;?>"  placeholder="Date début stage"  required>
            <label style="margin-left:30px; color:blue;font-size:18px;">Date fin stage:</label>
            <input type="date" class="input-ajout form-control" name="datefin"id="datefin" value="<?=$date_fin;?>"  placeholder="Date fin stage" required>
            <label style="margin-left:30px; color:blue;font-size:18px;">Duréé du stage :</label>
            <input type="text" class=" input-ajout form-control" value="<?=$duree;?>" name="duree" placeholder="Duréé du stage" required>
        </div>
        <div class="col">
           <label style="margin-left:30px; color:blue;font-size:18px;">Sujet de stage:</label>
            <textarea  class="input-ajout form-control" name="sujet"id="sujet"  placeholder="sujet de stage" required><?=$sujet;?></textarea>
            <label style="margin-left:30px; color:blue;font-size:18px;">Nom de l'encadrent:</label>
            <input type="text" class="form-control input-ajout " value="<?= $encadrent;?>"name="encadrent"  placeholder="Nom de l'encadrent" required>
            <label style="margin-left:30px; color:blue;font-size:18px;">Image:</label>
            <div class="mb-3"><input  class="input-ajout form-control filee" type="file" name="image"></div>
        </div>

      </div>
     <div class="div-flex d-flex justify-content-end">
       <button type="submit"  class="btn btn1-ajouter btn-primary" name="valider"><i class="bi bi-check-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
       <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
       <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
       </svg>ajouter</i></button>
       
       <button type="reset" class="btn  btn-danger" name="anuuler"><i class="bi bi-dash-circle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
        </svg>annuler</i></button>
     </div>
     
   </form>


           
                 </div>



             
            </div> 
        </div>    
</body>
</html>