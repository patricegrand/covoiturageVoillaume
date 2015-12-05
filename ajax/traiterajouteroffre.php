<?php
  $typeOffre = $_REQUEST['typeoffre'];
  $periodicite = $_REQUEST['periodicite'];
  $jour = $_REQUEST['jour'];
  $heureminute= $_REQUEST['heureminute'];
  $date = $_REQUEST['date'];
  $lieu = $_REQUEST['lieu'];
  $lesramassages = $_REQUEST['lesramassages'];
   /* A faire*/
   // $ok = enregistrerEnBase($typeoffre, $periodicite,$heureminute, $jour, $date,$lieu, $lesramassages);
   $ok = true;
   echo $ok;
?>
