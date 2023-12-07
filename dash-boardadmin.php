<?php
include("connexion.php");
 session_start(); 
if (!isset($_SESSION["id"])) { // Vérifier si l'utilisateur n'est pas connecté
    header('HTTP/1.0 403 Forbidden'); // Envoyer un en-tête 403 Forbidden
    echo '<div style="colorred">httpp:://page_not_found</div>'; // Afficher un message d'accès refusé
    exit();
}
$start=0;
$rows_per_page=2;
//get the total of rows
$req="SELECT * from  stage";
$res=mysqli_query($conx,$req);
$nr_of_rows=$res->num_rows;
//calculating the nbr of rows
$pages=ceil($nr_of_rows/$rows_per_page);
//if the user lick on the paginatuion button we set a new statrting point
if(isset($_GET['pagenr2']))
{
  $page= $_GET['pagenr2'] - 1;
  $start=$page*$rows_per_page;
}
$req2 = "SELECT * FROM stage WHERE NOT EXISTS (SELECT * FROM affectation  a join demande d on d.id_demande=a.id_demande join stage s 
on s.id_stage=d.id_stage
WHERE d.id_stage = stage.id_stage)limit $start,$rows_per_page";
// $req2="SELECT * from stage  limit $start,$rows_per_page";
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
            <h4 style="margin-left:15px;margin-top:20px;margin-bottom:20px;"><i class="bi bi-info-lg"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
            </svg>Nombre des demandes par stages:</i></h4>
            <?php
include("connexion.php");

$res = $conx->query($req2);
if (!$res) {
    die("Invalid query!");
}

while ($row = $res->fetch_assoc()) {
    $count = 0;
    $req4 = "SELECT COUNT(*) FROM demande WHERE etat_demande = 'en cours traiter' AND id_stage = '$row[id_stage]' AND id_demande NOT IN (SELECT id_demande FROM demande WHERE etat_demande = 'refuser' AND id_stage = '$row[id_stage]')";

    //$req4 = "SELECT count(*) FROM demande  WHERE  NOT EXISTS (select * from demande  where etat_demande='refuser' and id_stage='$row[id_stage]') WHERE   etat_demande='en cours traiter' and id_stage='$row[id_stage]'";

   // $req4 = "SELECT count(*) FROM demande WHERE etat_demande='en cours traiter' AND id_stage='$row[id_stage]'";
    $res1 = $conx->query($req4);
    if (!$res1) {
        die("Invalid query!");
    }
    
    $row1 = $res1->fetch_row();
    $count = $row1[0]; // Récupérer la valeur de count(*) dans $count

    echo "
    <div style='border-bottom:inset;margin-left:30px;border-top:outset;margin-bottom:15px;max-width:1300px;'>
        <table>
            <tr>
                <td>
                    <div>
                        <img style='margin-bottom:10px;margin-top:10px;' src='$row[image]' style='max-width:1000px;'>
                    </div>
                </td>
                <td>
              
                    <div style='max-width:900px;margin-left:50px;'>
                        <div style='margin-top:10px;margin-bottom:25px;'>
                            <h6>Titre de stage: $row[titre]</h6>
                        </div><br>
                        <label>code de stage: </label>
                        :$row[id_stage]<br>
                        <label>sujet: </label>
                        :$row[sujet]<br>
                        <label>date_fin: </label>
                        :$row[date_fin]<br>
                        <label>date_debut:</label>
                        :$row[date_debut]
                        
                    </div>

                    <a href='demandeparstage.php?code_stage=$row[id_stage]'>
                        <button type='button' class='btn' style='margin-left:200px;margin-top:50px;background-color:blue ;min-width:550px;margin-bottom:10px;'>
                            <label style='color:white;'>$count demande pour ce projet!!
                        </button>
                    </a>
                </td>
            </tr>
        </table>
    </div>
    ";
}
?>

                            <div class='row mb-3'><div class='col-md-12 text-center '>
                    <?php
                    if(!isset($_GET['pagenr2']))
                    {
                        $page=1;
                    }
                    else{
                        $page=$_GET['pagenr2'];
                    }
                    ?>
                 <span class="fw-semibold">showing  <?php echo $page?> of <?php echo $pages?>  pages</span> 
                            <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="?pagenr2=1">first</a></li>
                        <?php 
                        if(isset($_GET['pagenr2']) && $_GET['pagenr2'] > 1)
                        {
                        ?>
                        <li class="page-item"><a class="page-link" href="?pagenr2=<?php echo $_GET['pagenr2'] -1 ?>">Previous</a>
                        </li>
                        <?php
                            } 
                        else{ 
                            ?>
                        <li class="page-item"><a class="page-link">Pervious</a></li>
                        <?php
                            }
                            ?>
                            <?php
                            for($counter = 1;$counter <= $pages;$counter ++){
                            ?>
                            <li class="page-item"><a class="page-link" href="?pagenr2=<?php echo $counter?>"><?php echo $counter?></a></li>
                        <?php
                        }?>
                            
                            <?php 
                        if(!isset($_GET['pagenr2']) ){
                        ?>
                        <li class="page-item"><a class="page-link" href="?pagenr2=2">Next</a></li>
                        <?php }else{
                            if($_GET['pagenr2']>= $pages) {
                            ?>
                            <li class="page-item"><a class="page-link" href="">Next</a></li>
                            <?php 
                            }else{?>
                                <li class="page-item"><a class="page-link" href="?pagenr2=<?php echo $_GET['pagenr2'] + 1 ?>">Next</a></li>
                            <?php
                            }
                        }
                        ?>

                            <li class="page-item"><a class="page-link" href="?pagenr2=<?php echo $pages?>">last</a></li>

                        </ul>
                        </nav>
                        </div>
                    </div>
             
        </div>
  </div>     
</body>
</html>