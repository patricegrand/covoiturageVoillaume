<div data-role="page" id="pageinscription">
    <div data-role="header" data-theme="b">
    <h1>COVOITURAGE</h1>
        <a data-rel="back" data-icon="back">retour</a>
        <a href="#pageconnexion" data-rel="home" data-icon="home" >Accueil</a>
    </div><!-- /header -->
<?php
include "vues/logo.html";
?>
<div data-role="content" id="divinscription"> 
    <form action="#"  id="frminscription">
     <div data-role="fieldcontain" id ="champsinscription">
        <label for="nom">Nom </label>
        <input type="text" name="nom" id="nom" value=""  class="required" />
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="" class="required"/>
        <label for="mail">Mail</label>
        <input type="text" name="mail" id="mail" value=""  class="required email" />
        <label for="tel">Téléphone</label>
        <input type="tel" name="tel" id="tel" value="" class="required number" />
        <div id="messageErreur" data-theme="e"></div>
        <label for="adresse">Adresse ( indiquer le code postal et un lieu public) </label>
        <input type="text" name="adresse" id="adresse" value=""  class="required" />
        <fieldset data-role="controlgroup" data-mini="true" data-type="horizontal">
            <legend>Indiquer votre statut</legend>
            <input name="type" id="rdre" type="radio" checked="checked" value="enseignant">
            <label for="rdre">Enseignant</label>
            <input name="type" id="rdpr" type="radio" value="administratif">
            <label for="rdpr">Administratif</label>
            <input name="type" id="rdco" type="radio" value="eleve">
            <label for="rdco">Elève</label>
            <input name="type" id="rdse" type="radio" value="direction">
            <label for="rdse">Direction</label>
        </fieldset>
        
          <input type="submit" name="submit" id="btninscription" value="Envoyer"  />
     </div>
    </form>
</div>

</div><!-- fin page-->
