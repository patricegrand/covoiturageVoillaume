<?php
session_start();
require_once '../util/fonctions.php';
$mdp = $_REQUEST['mdp'];
$login = $_REQUEST['login'];
// A faire
$pdo=PdoCovoiturage::getPdo();

$user = $pdo->login($login,$mdp);// retourne le chauffeur (select *)
if($user!="")
 $_SESSION['user'] = $user;  
echo json_encode($user);


?>
