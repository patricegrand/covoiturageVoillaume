<?php

require_once '../util/fonctions.php';
$idOffre= $_REQUEST['idOffre'];
$choix= $_REQUEST['choix'];
if($choix == 'arriveelycee')
   $tabOffre = getOffreArriveeLycee($idOffre);
else 
   $tabOffre = getOffreDepartLycee($idOffre);
    
 /* Ces deux fonctions peuvent être regroupées en :
  * 
  *     require_once '../util/fonctions.php';
        $idOffre= $_REQUEST['idOffre'];
  *     $tabOffre = getOffre($idOffre); // retourne l'offre d'identifiant $idOffre avec un Join sur le chauffeur
  * ps : le choix ne sera plus utilisé
  *  */  
echo json_encode($tabOffre);

?>
