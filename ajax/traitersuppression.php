<?php
require_once '../util/fonctions.php';

$lesId =  $_REQUEST['lesIdOffres'];

/* à faire dans une prochaine itération*/
// $lesId = supprimerOffres($tabId);
echo json_encode($lesId);
?>
