<div data-role="page" id="pageajouteroffre">
    <div data-role="content" id="divajouteroffre">   
<?php
include "vues/entetepageavecboutonretour.html";
?>
<form id="frmoffre" action="#">
    <legend> Départ </legend>
    <select id="typeoffre" data-role="slider" data-inline="true">
        <option value="depart">Domicile</option>
        <option value="arrivee">Entreprise</option>
     </select>
     <legend> Offre </legend>
    <select id="periodicite" data-role="slider" data-inline="true">
        <option value="permanente">Permanente</option>
        <option value="date">Date</option>
     </select>
     <div id="divjour">
     <legend>Jour proposé</legend>
     <div data-role="controlgroup" data-type="horizontal" id="jour">
         <label for="lundi">Lu</label>
         <input type ="radio" id="lundi" name="choixjour" checked="">
         <label for="mardi">Ma</label>
         <input type ="radio" id="mardi" name="choixjour">
         <label for="mercredi">Me</label>
         <input type ="radio" id="mercredi" name="choixjour">
         <label for="jeudi">Je</label>
         <input type ="radio" id="jeudi" name="choixjour">
         <label for="vendredi">Ve</label>
         <input type ="radio" id="vendredi" name="choixjour">
      </div><!-- /fin listjours -->   

     </div><!-- /fin jour -->
     <label for="heure">Indiquer l'heure de départ :</label>
    <input name="heure" id="heure" type="range" min="6" max="23"  value="6" data-highlight="true">
    <label for="minute">Préciser les minutes :</label>
    <input name="minute" id="minute" type="range" min="0" max="55" step="5" value="0" data-highlight="true">
     <div id="divdate">
         <label for="date">Date </label>
        <input type="date" name="date" id="date" placeholder="05/12/2014" value="" class="required date"  />	
      </div><!-- /fin date -->
      <label for="lieu">Lieu proposé </label>
        <input type="text" name="lieu" id="lieu"  value="" class="required" />	  
        <div id="divramassage">
            <legend>Points de ramassage éventuels sur le parcours</legend>
            <a href="#" data-role="button" data-icon="plus"  data-inline="true" id="btnnouveauramassage">Ajouter un point de ramassage</a>
            
            
        </div>
         <input  type="button" name="btnvalideroffre" id="btnvalideroffre" value="Envoyer"  />

</form><!-- /fin formulaire -->
 </div><!-- /fin content -->
<?php    
    include "vues/pied.html";
?>
        
</div><!-- /fin page -->