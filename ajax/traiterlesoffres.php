<?php
  require_once '../util/fonctions.php';
  $type = $_REQUEST["typeoffre"];
  $lesOffres = array();
  if($type=="arriveelycee")
      /* A faire */
        $lesOffres = getLesOffresArriveeLycee(); // retourne les offres d'arrivee au lycée avec un join sur le chauffeur
   else 
        /* A faire */
        $lesOffres = getLesOffresDepartLycee(); // retourne les offres de départ avec un join sur le chauffeur
  echo json_encode($lesOffres);
?>

