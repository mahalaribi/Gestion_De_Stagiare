<?php
session_start(); 
include("connexion.php");
 if (!isset($_SESSION["id"])) { // Vérifier si l'utilisateur n'est pas connecté
     header('HTTP/1.0 403 Forbidden'); // Envoyer un en-tête 403 Forbidden
     echo '<div style="colorred">httpp:://page_not_found</div>'; // Afficher un message d'accès refusé
     exit();
 }
include("connexion.php");
$start=0;
$rows_per_page=3;
//get the total of rows
$req="SELECT * from  affectation";
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
$req2="SELECT * from affectation a join demande d on(a.id_demande=d.id_demande) join stagiare s on(s.id_stagiare=d.id_stagiare) where status=' ' order by id_affectation desc limit $start,$rows_per_page";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
      
        .row1
        {
            max-width: 1700px;
             
         
        }
        table
        {
          
            margin-left:80px;
            max-width:1200px;
            margin-top:40px;
        }
        .recherche-header
        {
            max-width:500px;
            max-height:20px;
            margin-top:20px;
            margin-left:30px;
        }
        /* drop deow */
       

    </style>
     <script type="text/javascript">
            $(document).ready(function() {
                $("#search").keyup(function(){
                    var input=$(this).val();
                    //alert(input);
                    if(input != "")
                    {
                        $.ajax({
                            url:"recherchestagiare.php",
                            method:"POST",
                            data:{input:input},

                            success: function(data){
                                $("#searchresult").html(data);
                            }
                        });
                    }
                    else{
                        $("#searchresult").css("display","none");
                    }
                });
            });
        </script> 
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
            </svg>Liste des stagiare:</i></h4>
            <div class="input-group mb-3 recherche-header">
                <input type="text" autocomplete="off" name="recherche" class="form-control" placeholder="recherche" id="search" aria-describedby="basic-addon1">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg></i></span>
           </div>
           <div style="margin-bottom:px;"id="searchresult">
                     <table class="table caption-top ">
                       
                        <thead>
                            <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Code_stagiare</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Num Tel</th>
                                <th scope="col">Email</th>
                                <th scope="col">Adresse</th>
                            </tr>
                        </thead>
                        <?php include("connexion.php");
                            $res = $conx->query($req2);
                            if(!$res)
                            {
                                die("invalide requete!");
                            }
                            while($row=$res->fetch_assoc())
                            echo"
                            <tr>
                                <td><img style='max-width:120px;max-height:120px;'src='$row[image]'></td>
                                <td style='padding-top:40px;'>$row[id_stagiare]</td>
                                <td style='padding-top:40px;'>$row[nom]</td>
                                <td style='padding-top:40px;'>$row[ville]</td>
                                <td style='padding-top:40px;'>$row[num]</td>
                                <td style='padding-top:40px;'>$row[email]</td>
                                <td style='padding-top:40px;'>$row[adress]</td>
                            </tr>
                            ";?>
                    
                 </table>
           
                 <div class='row mb-3'>
                    <div class='col-md-12 text-center '>
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
         </div> 
    </div>    
</body>
</html>

