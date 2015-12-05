<?php
require_once '../util/fonctions.php';

$lesId =  $_REQUEST['lesIdOffres'];

/* à faire */
// $lesId = supprimerOffres($tabId); // supprime les offres dont les id sont dans le tableau $tabId
echo json_encode($lesId);
?>
