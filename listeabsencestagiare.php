
<?php
session_start(); 
include("connexion.php");
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
        .fa {
    font-size: 45px; /* Adjust the size as needed */
  }

    </style>
</head>
<body>
          <?php 
            require('headersecritaire.php');
            // pour appeler un page dans une autre page
            ?>                
    <div class="main-container">
        <div  class="row1 row"> 
            <div style="background-color:#edeeed;" class=" left  col col-md-2"> 
            <?php 
            require('leftsecritaire.php');
            // pour appeler un page dans une autre page
            ?>   
            </div>



            <div class=" ml-2  col-md-10">
            <h4 style="margin-left:15px;margin-top:20px;margin-bottom:20px;"><i class="bi bi-info-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
            </svg>Liste des absences stagiare:</i></h4>
            
            <a style="color:black;"href="marqueabsencestagiare.php"><i style="margin-left:50px;"class="fa fa-plus-square" aria-hidden="true"></i></a>
            <table style="max-width:1300px; margin-left:50px;" class="table">
                    <thead class="table-dark">
                        <tr> 
                          <td>Code secritaire</td>
                            <td>Nom</td>
                            <td>Prenom</td>
                            <td> Nombre d'absence</td>
                            <td>action</td>
                            
                        </tr>
                    </thead>
                    <?php include("connexion.php");
                    
                           $req2="SELECT count(*) as nombre_absence,st.nom,st.prenom ,st.id_stagiare ,ab.id_absence from abcence_stagiare ab join affectation  af 
                           on af.id_affectation=ab.id_affectation join demande d on d.id_demande=af.id_demande join 
                           stagiare st on  st.id_stagiare=d.id_stagiare  where af.status=' '" ;
                            $res = $conx->query($req2);
                            if(!$res)
                            {
                                die("invalide requete!");
                            }
                            while($row=$res->fetch_row())
                            echo"
                    <tbody>
                    <tr> 
                           <td >$row[3]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[0]</td>
                            <td> 
                            <a href='suprimerabsencestagiare.php?code_ab=$row[4]'><i style='color:red;' class='bi bi-trash3-fill'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                          </svg></i></a></td>
                           
                           
                    </tr>
          
                    </tbody>";
                    ?>
            </table>



             
            </div> 
        </div>    
</body>
</html>


   