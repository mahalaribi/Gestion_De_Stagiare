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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
            margin-top:10Px;
            margin-right:90px;
            margin-bottom:px;
        }
        .btn1-ajouter
        {
        margin-right:60px;
        }
        /* drop deow */
       

    </style>
    <script>
        //validation date
        function validerDates() {
  var start = new Date(document.getElementById("start-date").value);
  var end = new Date(document.getElementById("end-date").value);
  var currentDate = new Date(); // Date système actuelle

  if (start >= currentDate) 

  {
    document.getElementById("result").innerText = "";

  }
  else{

    document.getElementById("result").innerText = "La date de début doit être supérieure ou égale à la date d'aujourd'hui";
    return false;
  }

  if (end >= start) {
    document.getElementById("result").innerText = "";
  } else {
    document.getElementById("result").innerText = "La date de fin doit être supérieure ou égale à la date de début";
    return false;
  }

  var startTime = document.getElementById("start-time").value;
  var endTime = document.getElementById("end-time").value;

  if (endTime >= startTime) {
    document.getElementById("result2").innerText = "";
  } else {
    document.getElementById("result2").innerText = "L'heure de fin doit être supérieure ou égale à l'heure de début";
    return false;
  }
  return true;
}

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
            </svg>  Marquer absence stagiare:</i></h4>
         <form name="f" onsubmit="return validerDates()"enctype="multipart/form-data" method="POST" style="max-width:960px;margin-left:150px;padding-bottom:10px;"class="card">
         
         <p style="margin-left:70px;color:red;margin-top:10px;"id="result"></p>
         <p style="margin-left:70px;color:red;margin-top:10px;"id="result2"></p>
         <div class="row g-3">
            <div class="col">
            <label style="margin-left:30px; color:blue;font-size:18px;">Nom  stagiare:</label>
            <select class="input-ajout form-select" id="mySelect" name="code_sec" placeholder="Nom stagiare:" >
                    <option placeholder="choisir stagiare "selected> choisir stagiare</option>
                    <?php 
                    // $re=mysqli_query($conx,"SELECT * from affec where status=' ' role='secritaire'");
                    $req=mysqli_query($conx,"SELECT * from affectation a join demande d 
                    on(a.id_demande=d.id_demande) join stagiare s
                   on(s.id_stagiare=d.id_stagiare)
                    where status=' '  ");

                    if(!$req)
                    {
                     die("invalide requete!");
                    }
                    else
                    {
                      $id_affectation="";
                      while($row=$req->fetch_assoc())  
                      {  $id_affectation=$row['id_affectation'];?>
                        <option value=<?php echo"$row[id_stagiare]"?>><?=$row['nom']," ",$row['prenom'] ;?></option>
                     <?php
                      }
                    }
                    ?>                       
                
                   </select> 
            <label style="margin-left:30px; color:blue;font-size:18px;">Date début absence:</label>   
            <input type="date" class="input-ajout form-control" name="datedeb"  id="start-date"  placeholder="Date début absence"  required>
            <label style="margin-left:30px; color:blue;font-size:18px;">Date fin absence:</label>
            <input type="date" class="input-ajout form-control" name="datefin"id="end-date"   placeholder="Date début absence" required>

        </div>
        <div style="margin-top:10px;" class="col">
           <label style="margin-left:30px; color:blue;font-size:18px;">Justification :</label>
            <textarea  class="input-ajout form-control" name="justification"id=""  placeholder="justification" required></textarea>
            <label style="margin-left:30px; color:blue;font-size:18px;">heure_debut :</label>
            <input type="time"  name="hdeb" min="09:00" max="18:00" id="start-time" onchange="validateTimeRange()" class="input-ajout form-control"  required>
            <label style="margin-left:30px; color:blue;font-size:18px;">heure_fin :</label>
            <input type="time"  name="hfin" min="09:00" max="18:00" id="end-time" onchange="validateTimeRange()" class="input-ajout form-control"  required>
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
<?php 
 if(isset($_POST['valider']))
 {
     $date_creation = date("Y-m-d ");
     $date_modification=date("Y-m-d ");
     $justification=$_POST['justification'];
     $hdeb=$_POST['hdeb'];
     $hfin=$_POST['hfin'];
     $date_deb=$_POST['datedeb'];
     $date_fin=$_POST['datefin'];
    $id=$_POST['code_sec'];
 
        $req1="INSERT into abcence_stagiare values (null,'$date_creation', '$date_modification','$id_affectation','$date_deb','$date_fin','$hdeb','$hfin','$justification')";
        $res=mysqli_query($conx,$req1);
        header("location:listeabsencestagiare.php");
 exit;
     
 }
?>