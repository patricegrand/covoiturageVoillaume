<div data-role="page" id="pageconnexion">
<?php
include "vues/entetepage.html";
include "vues/logo.html";
?>
<div data-role="content" id="divconnexion">       
    <div data-role="fieldcontain">
        <label for="login">Login </label>
        <input type="text" name="login" id="login" value="" />
        <label for="login">Mot de passe </label>
        <input type="password" name="mdp" id="mdp" value="" />
     </div>
   <div id="message" data-theme="e"></div>
     <p>
       <a href="#" data-role="button" id="btnconnexion" data-inline="true" data-mini="true" >Connexion</a>
        <a href="#pageinscription" data-role="button" data-mini="true" data-inline="true">Vous inscrire</a> 
     </p>
  </div><!-- /content -->
   
<?php    
//include "vues/pied.html";
?>
</div><!-- /page -->