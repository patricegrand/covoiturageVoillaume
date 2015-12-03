<?php
session_start();
require_once '../util/fonctions.php';
$mdp = $_REQUEST['mdp'];
$login = $_REQUEST['login'];

$user = verifuser($login, $mdp);
if($user!="")
 $_SESSION['id'] = $user;  
echo $user;


?>
