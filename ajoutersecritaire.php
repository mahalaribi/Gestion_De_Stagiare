<?php
session_start(); 
include("connexion.php");
 if (!isset($_SESSION["id"])) { // Vérifier si l'utilisateur n'est pas connecté
     header('HTTP/1.0 403 Forbidden'); // Envoyer un en-tête 403 Forbidden
     echo '<div style="colorred">httpp:://page_not_found</div>'; // Afficher un message d'accès refusé
     exit();
 }
include("connexion.php");
if(isset($_POST['valide'])&&isset($_FILES['image']))
{
  if(!empty($_POST['mail']) && !empty($_POST['mdp'])&& !empty($_POST['mdp']))
  {
  $date_creation = date("Y-m-d ");
  $date_modification=date("Y-m-d ");
  $mail=$_POST['mail'];
  $pass=$_POST['mdp'];
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $adresse=$_POST['adresse'];
  $ville=$_POST['ville'];
  $confirmmdp=$_POST['confirmmdp'];
  $num=$_POST['num'];

  // Lire le contenu du fichier d'image
  $content = file_get_contents($_FILES['image']['tmp_name']);
  // Échapper les caractères spéciaux dans le contenu de l'image
  $content = mysqli_real_escape_string($conx, $content);  
  $req2=mysqli_query($conx,"SELECT * from user where email='$mail' ");
  $res1=mysqli_num_rows ($req2);
  $req1=mysqli_query($conx,"SELECT email from stagiare where email='$mail'");
    if(mysqli_num_rows ($req1)>0 || $res1>0 )
    {
     $msg= '<p style="color:red;margin-left:200px;margin-top:15px;">Email déja saisire tapez un autre!</p>';
    }
    elseif($pass!=$confirmmdp)
    {
      $msg=  ' <div ><p style="color:red;">Confirmer le mot de passe!</p></div>';
    }
    else 
    {
      // $confirmmdp=password_hash($_POST['mdp'], PASSWORD_BCRYPT);
       //$pass=password_hash($_POST['mdp'], PASSWORD_BCRYPT);
      $req=mysqli_query($conx,"INSERT into user (nom,prenom,ville,num,email,pwd,cpwd,image,content,role,date_creation,date_modification,adress)
        values
        ('$nom','$prenom','$ville','$num ','$mail','$pass',' $confirmmdp','".$_FILES['image']['name']."','$content','secritaire',' $date_creation',' $date_modification','$adresse')");
       header("location:listsecritaire.php");
    }

  }
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
      
        .row1
        {
            max-width: 1700px;
            
         
        }
        .div-login
        {
            max-width:600px;
            margin-left:300px;
         
        
        }
        .div-input2
        {
            max-width:400px;
            margin-left:100px;
            margin-top:20px;
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
            <h4 style="margin-left:15px;margin-top:20px;margin-bottom:10px;"> <i class="bi bi-info-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
            </svg> Ajouter sécritaire :</i> </h4>
            <div class="text-center" style="margin-top:5px;color:red;">
      </div>
      <div class="card   div-login">
      <?php
       if(isset($msg)){ echo $msg;}
       ?> 
      <form name="f" enctype="multipart/form-data" method="POST">
  <div class=" div-input2">
    <input type="text" name="nom" class="form-control" placeholder="Nom" required >
  </div>
  <div class=" div-input2">
    <input type="text" name="prenom" class="form-control" placeholder="Prenom" required >
  </div>
  
  <div class=" div-input2">
     <select class="form-select" name="ville">
      <option selected>Choisir une ville</option>
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
    
      </select>
  </div>
  <div class=" div-input2">
    <input type="text" class="form-control" name="adresse" placeholder="Adresse" aria-label="adresse"required>
  </div>
  <div class=" div-input2">
    <input type="number" class="form-control" name="num" placeholder="Num Téléphone" aria-label="adresse"required>
  </div>
  <div class="div-input2">
    <input type="email" class="form-control" name="mail" placeholder="Email" id="inputEmail4"required>
  </div>
  <div class="div-input2">
    <input type="password" class="form-control" name="mdp" placeholder="Password" id="inputPassword4"required>
  </div>
  <div class="div-input2">
    <input type="password" class="form-control" name="confirmmdp" placeholder="Confirm password" id="inputPassword4"required>
  </div>
  <div class="div-input2">
  <input class="input-ajout form-control filee" type="file" name="image" required>
  </div>
     <button type="submit" name="valide"   style="margin-bottom:15px;margin-top:19px;min-width:180px;margin-left:200px"  class="btn btn-primary">
          <i class="bi bi-pencil"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
          <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
          </svg>S'inscrire
      </button> 
      </form >
      </div>
            </div> 
        </div>    
</body>
</html>

