<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	  <scripy src="stylesheet" href="bootstrap/css/bootstrap.js">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
      <style> 
  
.div1
{
   
    background-repeat: no-repeat, repeat;
    background-image: url("img/12.jpg");
background-size: cover;
opacity: 0.8;
    min-height: 700px;
   
} 
.nav
{
   color:white ; 
   font-weight: bold;
  
   
}
.il1
{
  margin-top:10px;
  margin-right: 10px;
 
}
.scroll
{
max-height: 730px;
  width: px;
  overflow-y: scroll;
}
/* kjhgfd */
.animation {
    display: flex;
    align-items: center;
    justify-content: center;
   
  }
  
  .vertical-text {
    display: inline-block;
    overflow: hidden;
    white-space: nowrap;
    animation: vertical-text-animation 5s linear infinite;
  }
  
  @keyframes vertical-text-animation {
    0% {
      transform: translateY(100%);
    }
    100% {
      transform: translateY(-100%);
    }
  }
  
  .vertical-text::after {
    content: "";
    display: inline-block;
    animation: typing 4s steps(14) infinite;
  }
  
  @keyframes typing {
    0% {
      width: 0;
    }
    100% {
      width: 100%;
    }
  }
      </style>
<body class="back-main">
  <div>
    <ul class="nav justify-content-end"style="max-height:500x;background-color:rgb(101, 138, 160);">
      <li ><img src="img/logo2.png" style="max-width:100px;max-height:100px;margin-right:900px;padding-left:15px;margin-bottom:10px"></li>
    <li class="il1 nav-item">
      <a class="nav-link active nav"  aria-current="page" href="#section0">Accueil</a>
    </li> 
    <li class="il1 nav-item">
      <a class="nav-link nav" href="#section1">service</a>
    </li>
    <li class=" il1 nav-item">
      <a class="nav-link nav" href="#section2">A propos</a>
    </li>
    <li class=" il1 nav-item">
      <a class="nav-link nav" href="#section4">Offre de stage</a>
    </li>
    <li class=" il1 nav-item">
      <a class="nav-link nav" href="#section3">Contact</a>
    </li>
  
    <li class=" il1 nav-item" >
      <a  class="nav-link nav" href="login.php">
        <i class="bi bi-person-circle" style="margin-right: 5px;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </svg>
    </i>login</a>
    </li>
  </ul>
</div>
<div class="scroll">
  <div class="div1" id="section0" >
    <div class="animation" style="padding-top:290px;">
       <h1 class="vertical-text" style="color:white; text-align: center;margin-top:px; "> IDEE , INSPIRATION , PENSEE, ILLUSION ,IMAGINATION <br>
      <label style="color:white; text-align:center; margin-top:10px;margin-left:10px;"> "la valeur d'une idée n'a absolument rien à voir avec la sincérité de l'home qui exprime "</label><br>
      <label style="color:white; text-align:center; margin-top:10px;margin-left:150px;"> "On n'est crétif qu'à plusieurs "</label></h1>
    </div>    
</div>
<div id="section1" >
  <div style="text-align: center;margin-top: 50px;;"><i style="color:grey;" class="bi bi-lightbulb"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">
    <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
  </svg></i> <h1>service</h1></div>
 
  <table style="margin-left:100px; margin-right:50px; margin-top: 50px;">
    <tr>
      <td >
      <div style="border: solid;border-color: white; min-height:300px; min-width:500px;">
        <i style="color:grey;margin-left:10px;"  class="bi bi-filetype-html"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-filetype-html" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5Zm-9.736 7.35v3.999h-.791v-1.714H1.79v1.714H1V11.85h.791v1.626h1.682V11.85h.79Zm2.251.662v3.337h-.794v-3.337H4.588v-.662h3.064v.662H6.515Zm2.176 3.337v-2.66h.038l.952 2.159h.516l.946-2.16h.038v2.661h.715V11.85h-.8l-1.14 2.596H9.93L8.79 11.85h-.805v3.999h.706Zm4.71-.674h1.696v.674H12.61V11.85h.79v3.325Z"/>
        </svg></i> <label style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-left:20px;font-size: 25px;">CRÉATION DE SITE WEB</label><br>
        <div style="margin-top:20px;margin-left: 70px;; color:grey;font-size:17px;">DevIT dispose du savoir-faire et de <br>l'expérience indispensables à la conception<br> et à la création
         de sites web intelligents,<br> répondant à l'ensemble des normes actuelles.
        </div>
      </div>
    </td>
    <td >
      <div style="border: solid;border-color: white; min-height:300px; min-width:500px;">
        <i  style="color:grey;margin-left:10px;"  class="bi bi-phone"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
          <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
          <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
        </svg></i>
         <label style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-left:20px;font-size: 25px;">APPLICATIONS MOBILES</label><br>
        <div style="margin-top:20px;margin-left: 70px;; color:grey;font-size:17px;">
          L'avenir est mobile! Chaque jour, de nouvelles <br>applications innovantes font leur apparition.<br> DevIT vous propose de développer vos applications mobiles sur mesure afin que, vous aussi,<br> vous profitiez de ce marché en pleine expansion.
        </div>
      </div>
    </td>
    <td >
      <div style="border: solid;border-color: white; min-height:300px; min-width:500px;">
        <i style="color:grey;margin-left:10px;" class="bi bi-laptop">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
          <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
        </svg></i><label style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-left:20px;font-size: 25px;">APPLICATIONS DE BUREAU</label><br>
        <div style="margin-top:20px;margin-left: 70px;; color:grey;font-size:17px;">
          Vous avez besoin de solutions technologiques pour <br>mieux gérer et organiser vos affaires, DevIT vous offre<br> les meilleures solutions profossionelles façonnées à vos meusures.
        </div>
      </div>
    </td>
  </tr>

  <tr>
    <td >
    <div style="border: solid;border-color: white; min-height:300px; min-width:500px;">
      <i style="color:grey;margin-left:10px;"class="bi bi-cloud-fill"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cloud-fill" viewBox="0 0 16 16">
      <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/></svg>
      </i>
       <label style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-left:20px;font-size: 25px;">CLOUD</label><br>
      <div style="margin-top:20px;margin-left: 70px;; color:grey;font-size:17px;">
        Le cloud est un modèle qui permet un accès omniprésent,pratique et à la demande à un réseau partagé et à un ensemble de ressources informatiques configurables. Soyez au coeur de l'innovation, nos ingénieurs vous proposent des services cloud à la demandes.
      </div>
    </div>
  </td>
  <td >
    <div style="border: solid;border-color: white; min-height:300px; min-width:500px;">
      <i  style="color:grey;margin-left:10px;"  class="bi bi-database-fill"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-database-fill" viewBox="0 0 16 16">
        <path d="M3.904 1.777C4.978 1.289 6.427 1 8 1s3.022.289 4.096.777C13.125 2.245 14 2.993 14 4s-.875 1.755-1.904 2.223C11.022 6.711 9.573 7 8 7s-3.022-.289-4.096-.777C2.875 5.755 2 5.007 2 4s.875-1.755 1.904-2.223Z"/>
        <path d="M2 6.161V7c0 1.007.875 1.755 1.904 2.223C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777C13.125 8.755 14 8.007 14 7v-.839c-.457.432-1.004.751-1.49.972C11.278 7.693 9.682 8 8 8s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972Z"/>
        <path d="M2 9.161V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13s3.022-.289 4.096-.777C13.125 11.755 14 11.007 14 10v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972Z"/>
        <path d="M2 12.161V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972Z"/>
      </svg></i>
       <label style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-left:20px;font-size: 25px;">SOLUTIONS ERP</label><br>
      <div style="margin-top:20px;margin-left: 70px;; color:grey;font-size:17px;">
        Vous désiriez améliorer la gestion de votre entreprise et de ses activités. Nous avons conçu pour vous une solution de gestion qui répond aux besoins spécifiques de tous les départements de votre entreprise conformément à la loi tunisienne.
      </div>
    </div>
  </td>
  <td >
    <div style="border: solid;border-color: white; min-height:300px; min-width:500px;">
      <i style="color:grey;margin-left:10px;" class="bi bi-palette"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-palette" viewBox="0 0 16 16">
        <path d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
        <path d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8zm-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7z"/>
      </svg>
       </i> <label style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-left:20px;font-size: 25px;">DESIGN GRAPHIQUE</label><br>
      <div style="margin-top:20px;margin-left: 70px; color:grey;font-size:17px;">
        Nous intervenons non seulement dans la création des chartes graphiques, infographie, création de logo, mais encore dans la réalisation de cartes de visites, flyers et brochures, etc. Nos spécialistes assurent des créations graphiques à fort impact visuel.
      </div>
    </div>
  </td>
</tr>

  </table>
</div>
<div id="section2"style="background-color:#e8e5e5;" >
  <h1 style="padding-left:20px;padding-top:20px;">A PROPOS? </h1>
<div style="padding-top:10px;padding-bottom: 10pxq;"class="d-flex">
  <div style="margin-left:100px;margin-top:30px;font-size:20px;max-width: 1000px;" class="p-2 w-100">
    Dev It est une entreprise de services informatiques,
     spécialisée dans la conception, le design,le développement et la promotion d’applications mobiles (Androïd, iOS, windows phone, unity, etc) et des sites web (site statique, site dynamique, site vitrine, site e-commerce, site mobile, application web, site communautaire, etc).<br> Notre équipe assure aussi des services informatiques à la demande.
  </div>
  <div class="p-2 flex-shrink-1"><img src="img/logo2.png" style="padding-bottom:40px;padding-right:50px;padding-left:200px;"></div>
</div>
</div>
<div id="section4" >
  <h1 style="padding-left:20px;padding-top:25px;">OFFRE DE STAGE </h1>
  <div style="background-color: white;opacity: 0.7;color:grey;padding-left:80px;padding-top:5px;font-size:18px;padding-bottom: 15px; max-width: 1500px;">
    pour avoir plus des informations pour les offres des stages
    <button type="button" class="btn btn-link"> <a href="inscription.php">voir plus </a> </button>
  </div>
</div>
<div style="background-color: rgb(6, 6, 20);" id="section3">
<h1 style="padding-left:20px;padding-top:20px; color:white;">CONTACT </h1>
<table style="margin-left:120px;margin-top:30px;">
<tr>
  <td>
    <div style=" min-height:250px; min-width:500px;">
      <i style="color:rgb(58, 58, 113);"class="bi bi-clock"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
      </svg>
     </i> <label style="font-size:20px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ; margin-left:20px;font-size: 18px;color: rgb(58, 58, 113);">OPENING HOURS</label>
      <div style="color:white;padding-left:10px;padding-top:28px;font-size: 18px;">
        
        . MONDAY-FRIDAY<br>

          8am-9pm<br>

        ​. SATURDAY-SUNDAY<br>

        8am-9pm
      </div> 
   
  </div>
  </td>
  <td>
    <div style=" min-height:250px; min-width:500px;">
      <i style="color:rgb(58, 58, 113);" class="bi bi-info">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
          <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg></i> <label style="font-size:20px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ; margin-left:20px;font-size: 20px;color: rgb(58, 58, 113);">INFORMATIONS</label>
  
     <h5 style="color: rgb(58, 58, 113);"> </h5><br>
      <div style="color:white;padding-left:10px;padding-top:2px;font-size: 18px;"> . 500 Terry Francine Street<br>
        Tunisie, BIZERTE,7016<br>
       . info@DevIT.com<br>
       . TEL: +122-23-466-789<br>
       . FAX : 72-444-563
      </div> 
      <div style="margin-left:20px;margin-top:5px;padding-bottom:10px;">
           <a style="color:grey;" href="#"> <i class="bi bi-facebook"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg></i></a>
            <a style="color:grey;" href="#"><i  style="margin-left: 40px;"class="bi bi-twitter"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </svg></i></a>
    </div>
    </div> 
  </td>
  <td>
    <div style=" min-height:230px; min-width:500px;">
      <i style="color:rgb(58, 58, 113);"class="bi bi-cursor"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cursor" viewBox="0 0 16 16">
        <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103zM2.25 8.184l3.897 1.67a.5.5 0 0 1 .262.263l1.67 3.897L12.743 3.52 2.25 8.184z"/>
      </svg></i> <label style="font-size:20px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ; margin-left:20px;font-size: 20px;color: rgb(58, 58, 113);">FIND​ US</label>
      <br>
    <img src="img/map1.png"style="max-width:440px;max-height:500px;padding-bottom:9px;margin-top:20px;">
    </div>
  </td>
</tr>
</table>

</div>

</body>
</html>