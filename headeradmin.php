<?php 

include("connexion.php");
$req="SELECT * from user where id_user='".$_SESSION["id"]."' and role='admin'" ;
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
            min-height:75px;
            background-color: rgb(101, 138, 160);
            max-width: 1700px;
          
        }
        .image-stage
        {
          margin-top: 10px;
        max-width:90px;
        max-height: 1000px;
        margin-left:20px;
        }
        .image-profil
        {
          margin-top: px;
        max-width:65px;
        max-height: 90px;
        margin-left:20px;
        }
        /* drop deow */
        .dropdown {
  position: relative;
  display: inline-block;
}

.dropbtn {
  padding: px;
  background-color:rgb(101, 138, 160) ;
  border: none;
  cursor: pointer;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: rgb(101, 138, 160);
  min-width: 40px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.dropdown-content a {
  display: block;
  padding: px;
  text-decoration: none;
  color: #000;
}

.dropdown:hover .dropdown-content {
  display: block;
}

    </style>
</head>
<body>
    <div class=" heder1 header">
        <div style="margin-right:12px;" class="d-flex justify-content-between">
            <div>
           <a href="dash-boardadmin.php"> <img class="image-stage "  src="img/logo2.png"></a>
            </div>
            
            
            <div style="padding-top:5px;">
                <label style="color:white;margin-top:px;font-size: 25px;"><?php echo "$row[nom] $row[prenom]";?></label>
                <a href='imageadmin.php?code_u=<?= $row['id_user'];?>'> <img class="image-profil rounded-circle"  src=" <?= $row['image'];?>"></a>
                <div class="dropdown">
                  <button  class="dropbtn"><i class="bi bi-caret-down-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                  </svg></i></button>
                  <div class="dropdown-content">
                    <a href="logout.php">Out</a>
                  </div>
                </div>

            </div>
         </div>
    </div>
  </body>
    </html>