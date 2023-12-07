
<?php
include("connexion.php");
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["id"])) {
    header('HTTP/1.0 403 Forbidden');
    echo '<div style="color:red">Access Denied</div>';
    exit();
}


// Récupérer l'ID de l'étudiant connecté
$studentId = $_SESSION["id"];
// Contrôle 2 : Vérifier si l'étudiant a déjà envoyé une invitation pour le même sujet
if (isset($_GET['code_stage'])) {
  $stageCode = $_GET['code_stage'];


  $req2 = "SELECT COUNT(*)  as count ,s.date_fin FROM demande d join stage s on s.id_stage=d.id_stage WHERE id_stagiare = '$studentId' AND d.id_stage = '$stageCode'";
  $res = $conx->query($req2);

  if ($res->num_rows > 0) {
      $row1= $res->fetch_assoc();
      $invitationCount = $row1['count'];

      if ($invitationCount > 0) {
          $_SESSION['error_message'] = "You have already sent an invitation for the same stage!";
          header('location: dashboard-etudiant.php');
          
          exit;
      }
  }
}

// Contrôle 1 : Vérifier si l'étudiant a une dernière demande en cours ou refusée
$req1 = "SELECT etat_demande FROM demande WHERE id_stagiare = '$studentId' ORDER BY id_demande DESC LIMIT 1";
$res = $conx->query($req1);

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $lastDemandStatus = $row['etat_demande'];

    if ($lastDemandStatus == 'en cours traiter') {
        $_SESSION['error_message'] = "Do not send a new request until the admin replies to your last request!";
        header('location: dashboard-etudiant.php');
        exit;
    }
    elseif ($lastDemandStatus == 'accepter' ) {
      if( $row1[1] <strtotime(date("Y-m-d")))
      {
      $_SESSION['error_message'] = "Do not send a new request finished your stage when end date stage inferieur of date systeme!";
      header('location: dashboard-etudiant.php');
      exit;
    }
  }
  
  //   elseif ($lastDemandStatus == 'accepter'||$row1[1]<date("Y-m-d")  ) {

  // }


}



// Si tous les contrôles sont passés, vous pouvez poursuivre l'envoi de la demande
$date_creation = date("Y-m-d");
$date_modification = date("Y-m-d");

if (isset($_GET['code_stage'])) {
    $code = $_GET['code_stage'];
    $req3 = "INSERT INTO demande VALUES (null, '$date_creation', '$date_modification', '$studentId', '$code', 'en cours traiter')";
    $res = $conx->query($req3);
    $_SESSION['valide']="Un demande effectuer";
    header('location: dashboard-etudiant.php');
    exit;
}

?>