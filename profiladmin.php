<?php 
session_start(); 
       if (!isset($_SESSION["id"])) { // Vérifier si l'utilisateur n'est pas connecté
           header('HTTP/1.0 403 Forbidden'); // Envoyer un en-tête 403 Forbidden
           echo '<div style="colorred">httpp:://page_not_found</div>'; // Afficher un message d'accès refusé
           exit();
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
            <h4 style="margin-left:50px;margin-top:35px; "> <i class="bi bi-info-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
            </svg>Voir profil :</i></h4>
                <form name='form' class="" action='profile-action.php' method='post'>
                    <div class="row m-3" >
                     <div class="card  text-center col-md-4 "  style="margin-left:30px;margin-top:30px;min-height: 500px;">
                         <div class="col">
                             <div class="mb-3 mt-4" >
                               <img src="<?=$row['image'];?>" class="rounded-circle" style="max-width:220px;max-height:220px;"/>
                             </div>
                            
                             <div style="margin-top:40px;">
                             <?php
                              $req="SELECT * from user where id_user='".$_SESSION["id"]."' "  ;
                              $res=$conx->query($req);
                              if(!$res)
                              {
                               die("invalide requete!");
                              }
                              $row=$res->fetch_assoc();
                              
                             echo"
                                 <h2>$row[nom] $row[prenom]</h2>
                                 <small>$row[ville] , $row[adress]</small>
                             </div><br>";?>
                             
                           
                             <div style="margin-top:10px;" class="col mb-3 ">
                             <?php
                              echo"
                              <button type='button' class='btn btn-primary'><i class='bi bi-brush'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-brush' viewBox='0 0 16 16'>
                              <path d='M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z'/>
                               </svg></i><a  style='color:white;'href='modifierprofiladmin.php?code_u=$row[id_user]'>Modifer un profil</button><br>4
         
                               <br><button type='button' class='btn btn-danger'><i class='bi bi-lock'></i><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-lock' viewBox='0 0 16 16'>
                               <path d='M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z'/>
                                 </svg><a  style='color:white;'href='modifermotdepasseadmin.php?code_u=$row[id_user]'>Modifier mot de passe</a></button> ";
                                 ?>
                               
                             </div>
         
                          </div>
                         </div> 
                         <div style="margin-left:20px;margin-top:30px;"class="card  col-md-7">
                         <table class="table">
                           <tbody>
                           <tr>
                     <?php
                              $req="SELECT * from user where id_user='".$_SESSION["id"]."' "  ;
                              $res=$conx->query($req);
                              if(!$res)
                              {
                               die("invalide requete!");
                              }
                              $row=$res->fetch_assoc();
                        echo"
                        <th scope='row'>Nom complet</th>
                         <td> $row[nom] $row[prenom]</td>
                       </tr>
                       <tr>
                        <th scope='row'>Email</th>
                         <td>$row[email]</td>
                       </tr>
                       <tr>
                        <th scope='row'>Num tel</th>
                         <td>$row[num]</td>
                       </tr>
                       <tr>
                        <th scope='row'>Ville</th>
                         <td>$row[ville]</td>
                       </tr>
                       <tr>
                        <th scope='row'>Adresse</th>
                         <td>$row[adress]</td>
                       </tr>
                       <tr>
                        <th scope='row'>Passe word</th>
                         <td>$row[pwd]</td>
                       </tr>";?>
                  </tbody>
                           </tbody>
                           </table>
                     </form>
                 </div>



             
            </div> 
        </div>    
</body>
</html>