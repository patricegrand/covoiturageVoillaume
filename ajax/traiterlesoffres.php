<?php
  require_once '../util/fonctions.php';
  $type = $_REQUEST["typeoffre"];
  $lesOffres = array();
  $pdo=PdoCovoiturage::getPdo();
  if($type=="arriveelycee")
          $lesOffres = $pdo->getLesOffresArriveeLycee();
   else 
        $lesOffres = $pdo->getLesOffresDepartLycee();
  echo json_encode($lesOffres);
?>

