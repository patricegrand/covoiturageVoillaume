<?php
require_once '../util/fonctions.php';
session_start();
$id = $_SESSION['user']['id'];;
$toutesMesOffres = array();
$toutesMesOffres['departentreprise']= array();
$toutesMesOffres['departentreprise'] = getMesOffresDepartEntreprise($id);
$toutesMesOffres['arriveeentreprise']= array();
$toutesMesOffres['arriveeentreprise']= getMesOffresArriveeEntreprise($id);
echo json_encode($toutesMesOffres);
?>

