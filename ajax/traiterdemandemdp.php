<?php
require_once '../util/fonctions.php';
$login = $_REQUEST['login'];
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $to)) {
            $passage_ligne = "\r\n";
        } else {
            $passage_ligne = "\n";
        }
        $user = getUser($login);
        $mail = $user['mail'];
        $mdp = $user['mdp'];
//=====Déclaration des messages au format texte et au format HTML.
        $message_html = "<html><head></head><body> Bonjour voici votre mot de passe : " .$mdp. "</body></html>";

//=====Création de la boundary
        $boundary = "-----=" . md5(rand());

//=====Définition du sujet.
        $sujet = "Mot de passe Covoiturage Voillaume";

//=====Création du header de l'e-mail.
        $header = "From: \"Covoiturage\"<voillaume@hotmail.fr>" . $passage_ligne;
        $header.= "Reply-to: \"Covoiturage\" <voillaume@hotmail.fr>" . $passage_ligne;
        $header.= "MIME-Version: 1.0" . $passage_ligne;
        $header.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;


        $message = $passage_ligne . "--" . $boundary . $passage_ligne;
//=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
        $message.= $passage_ligne . $message_html . $passage_ligne;

        $message.= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;

//=====Envoi de l'e-mail.
        $ok = mail($mail, $sujet, $message, $header);
       echo $ok;
?>

