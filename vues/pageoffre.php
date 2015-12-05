<div data-role="page" id="pageoffre"> 
<?php
include "vues/entetepageavecboutonretour.html";
?>
<div data-role="content" id="contenu" >  
         <ul data-role ="listview" id="list" >
             <li id="nomprenom">                       </li>
             <li id="lieu">                    </li>
             <li id="ramassage">                 </li>  
         </ul>
         <a href="" data-role="button" data-icon="grid"   id="tel"  data-inline="true" data-mini="true">Appeler</a>
         <a href="" data-role="button" data-inline="true" data-mini="true" id="mail">Contacter</a>
         <div id = "carte">
             
         </div> 
 </div><!-- /fin content -->
<?php
    include "vues/pied.html";
?>
</div><!-- /fin page -->