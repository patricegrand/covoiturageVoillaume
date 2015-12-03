<?php

require_once '../util/fonctions.php';
$idOffre= $_REQUEST['idOffre'];
$choix= $_REQUEST['choix'];
if($choix == 'arriveeentreprise')
   $tabOffre = getOffreArriveeEntreprise($idOffre);
else 
     $tabOffre = getOffreDepartEntreprise($idOffre);
    
   
echo json_encode($tabOffre);

?>
