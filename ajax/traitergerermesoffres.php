<?php
require_once '../util/class.pdocovoiturage.inc.php';
session_start();
$id = $_SESSION['user']['id'];
$pdo=PdoCovoiturage::getPdo();
$toutesMesOffres = array();
$toutesMesOffres['departlycee']= array();
$toutesMesOffres['departlycee'] = $pdo->getMesOffresDepartLycee($id);
$toutesMesOffres['arriveelycee']= array();
$toutesMesOffres['arriveelycee']= $pdo->getMesOffresArriveeLycee($id);
/* A faire*/
// $toutesMesOffres = getMesOffres($id) : retourne toutes les offres d'un chauffeur
echo json_encode($toutesMesOffres);
?>

