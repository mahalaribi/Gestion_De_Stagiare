<?php
session_start(); 
include("connexion.php");
 if (!isset($_SESSION["id"])) { // Vérifier si l'utilisateur n'est pas connecté
     header('HTTP/1.0 403 Forbidden'); // Envoyer un en-tête 403 Forbidden
     echo '<div style="colorred">httpp:://page_not_found</div>'; // Afficher un message d'accès refusé
     exit();
 }
$id_user="";
$last_mdp="";
$new_mdp="";
$confirm_mdp="";
if($_SERVER["REQUEST_METHOD"]=='GET'){ 
if(!isset($_GET['code_u']))
{
header("locations:profiladmin.php");
exit;
}
$id_user=$_GET['code_u'];
$req="SELECT * from user where id_user='$id_user'";
$res=$conx->query($req);
$row=$res->fetch_assoc();
while(!$row)
{
    header("locations:profiladmin.php");
   exit;
}
$id_user=$row['id_user'];
}
else {
    $id_user=$_POST['id_user'];
    $last_mdp=$_POST['lastpassword'];
    $new_mdp=$_POST['newpassword'];
    $confirm_mdp=$_POST['confirmpassword'];
    $req="SELECT * from user where id_user='$id_user'";
    $res=$conx->query($req);
    $row=$res->fetch_assoc();
    
      if($last_mdp!=$row['pwd'])
    {
        $msg=  ' <div style="margin-top:15px;" class="alert alert-danger" role="alert">
        Password incorrect! !
      </div>';
     
    }
    elseif($new_mdp!=$confirm_mdp or $new_mdp==$row['mdp']&&$row['mdp']==$confirm_mdp)
    {
        $msg=  ' <div style="margin-top:15px;" class="alert alert-danger" role="alert">
        Confirmer Password !
      </div>
      ';  
      
    }
    else
    {

    $date_modif=date("Y-m-d ");
    $req2="UPDATE user set pwd='$new_mdp', date_modification='$date_modif',cpwd='$confirm_mdp' where id_user=' $id_user'";
    $res=$conx->query($req2);
    header("location:profiladmin.php");
     }

}
$req="SELECT * from user where id_user='".$_SESSION["id"]."' "  ;
$res=$conx->query($req);
if(!$res)
{
 die("invalide requete!");
}
$row=$res->fetch_assoc();
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
        .header
        {
            min-height:60px;
            background-color: ;
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
            <div  class=" ml-2  col-md-10">
            <h4 style="margin-left:50px;margin-top:35px; "> <i class="bi bi-info-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
            </svg>Modifier mote de passe:</i></h4>
           

            <form name='form' class="" action='' method='post'>
           <div class="row m-3" >
            <div class="card  text-center col-md-4 "  style="margin-left:40px;margin-top:30px;">
                <div class="col">
                    <div class="mb-3 mt-4" >
                      <img src="<?=$row['image']?>"class="rounded-circle" style="max-width:220px;max-height:220px;"/>
                    </div>
                    <div>
                    <?php
                     echo"
                        <h2>$row[nom] $row[prenom]</h2>
                        <small>$row[ville],$row[adress]</small>
                    </div><br>
                    ";?>
                  </div>
                </div> 
                <div style="margin-left:20px;margin-top:30px;"class="card  col-md-7">
                <h4 style="margin-top:15px;">Changer mot de passe:</h4>
                <?php
                   if(isset($msg)){ echo $msg;}
                 ?>
                <div  style="margin-top:15px;">
                    <input type="hidden" style="margin-top:15px;margin-bottom:15px;" value='<?= $id_user;?>'  name="id_user" class="form-control" placeholder="id_user" id="inputPassword4" required>
                     <input style="margin-top:15px;margin-bottom:15px;" type="password" name="lastpassword" class="form-control" placeholder="Last-Password" id="inputPassword4" required>
                     <input type="password" style="margin-top:15px;margin-bottom:15px;" name="newpassword" class="form-control" placeholder="New-Password" id="inputPassword4" required>
                     <input type="password" style="margin-top:15px;margin-bottom:15px;" name="confirmpassword" class="form-control" placeholder="Confirm-Password" id="inputPassword4" required>
                </div>
                <div class="  col mb-3"  style="margin-top:15px;margin-left:130px" >
                    <button  style="margin-top:20px;margin-bottom:15px; margin-left:80px;" type="submit" class="btn btn-primary"><i class="bi bi-chevron-down"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                       <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                     </svg></i>Enregistre</button>
                    <button style="margin-top:20px;margin-bottom:15px; margin-left:80px;" type="button" class="btn btn-danger"><i class="bi bi-x"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                     <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                         </svg></i>Annuler</button>
                </div>
            </form>




             
            </div> 
        </div>    
</body>
</html>