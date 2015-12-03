<?php
session_start();
require_once '../util/fonctions.php';
if(estConnecte())
    echo "valide";
else 
    echo "invalide"; 
?>
