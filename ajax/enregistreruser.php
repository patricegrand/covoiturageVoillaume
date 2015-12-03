<?php
session_start();
$nom = $_REQUEST['nom'];
$prenom = $_REQUEST['prenom'];
$mail = $_REQUEST['mail'];
$type = $_REQUEST['type'];
$tel = $_REQUEST['tel'];
$adresse = $_REQUEST['adresse'];
// enregistrerEnBase(...); pas dans cette itération

$login = $prenom[0].$nom;
$mdp="";
for($i= 1;$i<=4;$i++){
    do{
       $n=rand(49,122); 
        
    }while( ($n>57&&$n<65)||($n>90 && $n<97));
     $mdp=$mdp.chr($n);
}




echo " login : ".$login."<br>Mot de passe : ".$mdp."<br>Adresse :".$adresse."<br>Merci de votre visite et à bientôt";
?>
