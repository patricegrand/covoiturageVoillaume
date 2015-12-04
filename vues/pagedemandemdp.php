<div data-role="page" id="pagedemandemdp">
<?php
include "vues/entetepage.html";
include "vues/logo.html";
?>
<div data-role="content" id="divdemandemdp"> 
    Merci d'indiquer votre login
    <label for="login">Login </label>
        <input type="text" name="login" id="loginDemandeMdp" value=""  class="required" />
    Votre mot de passe va vous être envoyé par mail, à bientôt
     <p>
       <a href="#" data-role="button" id="btnvaliderdemandemdp" data-inline="true" data-mini="true" >Valider</a>
       
     </p>
  </div><!-- /content -->
   

</div><!-- /page -->