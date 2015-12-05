<div data-role="page" id="pagegerermesoffres">
    <div data-role="content" id="divmesoffres">   
<?php
include "vues/entetepageavecboutonretour.html";
?>
     <legend  >Départ de Voillaume</legend>
        <div data-role="controlgroup" id="listdepart" data-theme="b">

        </div>
     <legend>Arrivée à Voillaume</legend>   
        <div data-role="controlgroup" id="listarrivee"> 
              
            
        </div>   
       <p>
            <a data-role="button" id="btnSupprimer" data-icon="delete" data-inline="true" 
                                                            data-mini="true">Supprimer</a>
       </p>
       <p>
            <a href="#pageajouteroffre" data-role="button" id="btnAjouterOffre" data-icon="plus" 
                        data-inline="true" data-mini="true">Ajouter une offre</a>
       </p>     
  </div><!-- /fin content -->    
<?php    
    include "vues/pied.html";
?>
</div><!-- /fin page -->