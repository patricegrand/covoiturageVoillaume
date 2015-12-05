<?php
require_once '../util/fonctions.php';
session_start();
$id = $_SESSION['user']['id'];;
$toutesMesOffres = array();
$toutesMesOffres['departlycee']= array();
$toutesMesOffres['departlycee'] = getMesOffresDepartLycee($id);
$toutesMesOffres['arriveelycee']= array();
$toutesMesOffres['arriveelycee']= getMesOffresArriveeLycee($id);
/* A faire*/
// $toutesMesOffres = getMesOffres($id) : retourne toutes les offres d'un chauffeur
echo json_encode($toutesMesOffres);
?>

