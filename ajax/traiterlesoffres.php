<?php
  require_once '../util/fonctions.php';
  $type = $_REQUEST["typeoffre"];
  $lesOffres = array();
  if($type=="arriveeentreprise")
        $lesOffres = getLesOffresArriveeEntreprise();
   else 
        $lesOffres = getLesOffresDepartEntreprise();
  echo json_encode($lesOffres);
?>

