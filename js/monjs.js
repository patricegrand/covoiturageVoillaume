
$(function(){
   $(document).on( "pageinit", function(e ) {
            var page = window.location.hash.substr(1);// récupère la partie après #
            if( page!="pageinscription" && page!=""){
               $.get("ajax/traiterdemandepage.php",
                foncRetourConnecte );
            }
   });
   function foncRetourConnecte(data){
       if(data == "invalide")
        $.mobile.changePage("#");
   }

    /*********************************** Page connexion************************************/  
                        
    $('#btnconnexion').click( function(e) {
                        // les deux lignes annulent le comportement par défaut du clic
                        // c'est à dire href="#" qui provoquerait un rappel de la même page
                          e.preventDefault();
                          e.stopPropagation();
                          var mdp = $("#mdp").val(); //récupère le contenue de la zone d'id mdp
                          var login = $("#login").val();
                          /* appel d'une fonction ajax */
                          // elle prend 3 arguments :
                          // 1- le nom de la fonction php qui sera exécutée
                          // 2- la liste des arguments à fournir à cette fonction
                          // 3- le nom de la fonction JS qui sera exécutée au "retour" du serveur 
                          $.post("ajax/traiterconnexion.php",{
                              // valorise les deux arguments passés à la fonction traiterconnexion
                                "mdp" : mdp,        
                                "login" : login },
                                foncRetourConnexion );
                   });
     /* fonction JS qui sera exécutée après le retour de l'appel ajax précedent */
     // le paramètre data représente la donnée envoyée par le serveur
     // résultat de l'appel de la fonction retourConnexion.php
    function foncRetourConnexion(data){
            if(data.length != 0){
                $.mobile.changePage("#pageaccueil");
             }
             else{
             // sinon affichage d'un message dans la div d'id message 
                $("#message").css({color:'red'});
                $("#message").html("erreur de login et/ou mdp");
             }
    }
   
    /***************************************** Page inscription*******************************/
                    
    $('#btninscription').click( function(e) {
                           // la méthode valid teste les contenuee des saisies et affiche
                           // les erreurs, méthode associée au plugin utilisé jquery.validate
                          if( $("#frminscription").valid()){
                                e.preventDefault();
                                e.stopPropagation();
                                var nom = $("#nom").val();
                                var prenom = $("#prenom").val();
                                var mail = $("#mail").val();
                                var tel = $("#tel").val();
                                var adresse = $("#adresse").val();
                                if(tel.length == 10)
                                $.post("ajax/enregistreruser.php",{
                                    "nom" : nom,
                                    "prenom" :prenom,
                                     "mail" : mail,
                                     "tel"  : tel,
                                     "adresse" : adresse,
                                     "type" :  $("input[type=radio][name=type]:checked").attr("value")},
                                    foncRetourEnregistrement ); 
                                else{
                                     $("#messageErreur").css({color:'red'});
                                    $("#messageErreur").html("10 chiffres attendus pour le téléphone ");
                                   
                                }
                               
                            }
        });
    function foncRetourEnregistrement(data){
                 $("#divinscription").html(data);
    }
   /*********************************** Page offresoffertes************************************/  
    
           $("#offresarrivee, #offresdepart ").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                var idBouton = $(this).attr("id");
                var paramAjax = "arriveedomicile";
                if(idBouton == "offresarrivee" )
                    paramAjax = "arriveeentreprise";
                $.post("ajax/traiterlesoffres.php",{
                    "typeoffre" : paramAjax
                 },
                    foncRetourLesOffres,"json" );
            });
       function foncRetourLesOffres(lesOffres){
            $.mobile.changePage("#pageoffresoffertes");
            $("#pageoffresoffertes #divliste").empty();  
            var jour ="";
            var n = 0;
            for(var i =0; i< lesOffres.length;i++ ){
                if(jour != lesOffres[i]['jour']){
                    n++;
                    jour = lesOffres[i]['jour'];
                    var html ="";
                    if(i!=0){
                        html="</ul></div>";
                    }
                    html += "<div data-role=collapsible id=collaps" + n + " >";
                    html += "<h3>"+jour+"</h3>";
                    html += "<ul data-role=listview id=lstoffres" + n + " > ";
                    $("#pageoffresoffertes #divliste").append(html);
                    }
                    html = "<li id=" + lesOffres[i]['id']+" ><a href =#pageoffre >";
                    $("#pageoffresoffertes #lstoffres" + n).append(html);
                    if(lesOffres[i]['ramassage']){
                        html = lesOffres[i]['date'] + " à "+ lesOffres[i]['heure']+" départ de <br>"+ lesOffres[i]['depart']+"</a></li>";
                        $("#pageoffresoffertes #"+lesOffres[i]['id']).attr("title","arriveeentreprise");  
                    }
                    else{
                        html = lesOffres[i]['date'] + " à "+ lesOffres[i]['heure']+" arrivée à <br>"+ lesOffres[i]['retour']+"</a></li>";
                        $("#pageoffresoffertes #"+lesOffres[i]['id']).attr("title","arriveedomicile"); 
                    }
                    $("#pageoffresoffertes li#"+lesOffres[i]['id']+">a").append(html);
                }
                $("#pageoffresoffertes #divliste").trigger('create');  // génère un événement créate et construit les objets jQuery
        }
  
        $("#pageoffresoffertes").on("click","li", function() {  
                          var id = $(this).attr("id");
                          var choix =  $(this).attr("title");
                          $.post("ajax/traiteroffre.php",{
                                "idOffre" : id,
                                "choix" : choix
                                },
                                 foncRetourOffre,"json" );
          });
          
           function  foncRetourOffre(data){
                
              $("#pageoffre #ramassage").empty();
           
              var nom = data["nom"];
              var lieu;
              if(data["depart"])
                  lieu = data["depart"];
              else
                  lieu = data["retour"];
              var prenom = data["prenom"];
              var numeroTel = data["tel"];
              var mail = data["mail"];
              var html="";
              $("#pageoffre #nom").html(nom);
              $("#pageoffre #prenom").html(prenom);
              if(data["ramassage"]){
                    var tabRamassage=data["ramassage"];
                    html ="<br>Etape(s)possible(s) sur le trajet : <ul>";
                    for(var etape in tabRamassage){
                        html+="<li>"+tabRamassage[etape]['lieu']+"</li>";
                    }
                    html+="</ul>";
                    $("#pageoffre #ramassage").html(html);
                }
                $("#pageoffre #tel").attr("href","tel:"+numeroTel);
                $("#pageoffre #mail").attr("href","mailto:"+mail);
                $("#carte").gmap3("destroy"); //efface la carte
                // La taille est obligatoire, pourrait être dans un fichier css
                $("#carte").width("600px").height("350px").gmap3({
                        marker:{
                            address: lieu + " ,France"
                        },
                        map:{
                            options :{
                                maxZoom: 14
                            }
                        }
                  },"autofit");
                if(data["ramassage"]){
                     var lesRamassages = data["ramassage"];
                     $.each(lesRamassages,function(index, valeur){
                        $("#carte").gmap3({
                            marker :{ address :  lesRamassages[index]["lieu"] + " ,France"
                            }
                        });
                     });
                 }
              }
       /**************************** page de gestion de mes offres*******************************************************/
       
            $("body").on("click","#gerermesoffres",function(e){
                e.preventDefault();
                e.stopPropagation();
                $.post("ajax/traitergerermesoffres.php",                    
                                 foncRetourMesOffres,"json"); 
             });
          function foncRetourMesOffres(data){
                $.mobile.changePage("#pagegerermesoffres");
                var lesOffresDepartEntreprise = data['departentreprise'];
                var lesOffresArriveeEntreprise = data['arriveeentreprise'];
                $("#listdepart").empty();
                for(var i = 0; i < lesOffresDepartEntreprise.length; i++){
                    var uneOffre = lesOffresDepartEntreprise[i];
                    var legende = uneOffre['jour'] + "   " + uneOffre['date'] + "   " + uneOffre['heure'];  
                    var html = "<input  id=" + uneOffre['id'] + " type=checkbox data-theme=b>";
                    html+="<label  for=" + uneOffre['id'] + " data-theme=b> "+ legende +"</label>";
                    $("#listdepart").append(html);
                }
                $("#listarrivee").empty();
                for( i = 0; i < lesOffresArriveeEntreprise.length; i++){
                     uneOffre = lesOffresArriveeEntreprise[i];
                     legende = uneOffre['jour'] + "   " + uneOffre['date'] + "   " + uneOffre['heure'];  
                     html = "<input  id=" + uneOffre['id'] + " type=checkbox data-theme=b>";
                    html+="<label  for=" + uneOffre['id'] + " data-theme=b> "+ legende +"</label>";
                    $("#listarrivee").append(html);
                }
                $("#divmesoffres").trigger('create'); 
          }   
          $("#btnSupprimer").click(function(){
                var valeurs=[];
                $("input[type=checkbox]:checked").each(function() {
                    var id = $(this).attr("id");
                    valeurs.push(id);
                });
             $.post("ajax/traitersuppression.php",{
                                "lesIdOffres" : valeurs
                                },
                                 foncRetourSuppression,"json");
            });
           function foncRetourSuppression(lesIdOffresAsupprimer){
                 for(var i=0;i<lesIdOffresAsupprimer.length;i++){
                    var id = lesIdOffresAsupprimer[i];
                    $("input#" + id + ", label[for=" + id + "]").remove();
               }
            }
          /************************* page ajouter offre********************************************/
             
            $("#typeoffre").change(function(){
                var typeOffre = $("#typeoffre").val();
                if(typeOffre =="depart" )
                    $("#divramassage").show();
                else
                   $("#divramassage").hide(); 
             });
             
             $("#periodicite").change(function(){
                    var periodicite = $("#periodicite").val();
                    if(periodicite =="date" ){
                        $("#divdate").show();
                        $("#divjour").hide();
                    }
                    else{
                        $("#divdate").hide();
                        $("#divjour").show();
                    }
             });
             $("#btnnouveauramassage").click(function(){
                var html = "<input type=text id=ram name=ram value=''>"; 
                $("#divramassage").append(html); 
              });
             $("#btnvalideroffre").click(function(e){
              if( $("#frmoffre").valid()){
                   e.preventDefault();
                   e.stopPropagation();
                   var typeoffre = $("#typeoffre").val();
                   var periodicite = $("#periodicite").val();
                   var heure = $("#heure").val();
                   var lieu = $("#lieu").val();
                   var minute = $("#minute").val();
                   var heureminute = heure + "h" + minute;
                   var jour = $("#jour").val();
                   var date = $("#date").val();
                   if(date != ""){
                        var tab = $("#date").val().split("/");
                        var objDate = new Date(tab[2],tab[1],tab[0]);
                        var numjour = objDate.getDay();
                        if(numjour == 1)jour = "lundi";
                        if(numjour == 2)jour = "mardi";
                        if(numjour == 3)jour="mercredi";
                        if(numjour == 4)jour="jeudi";
                         if(numjour == 5)jour="vendredi";
                         if(numjour == 6)jour="samedi";
                         if(numjour == 0)jour="dimanche";
                   }
                   var lesRamassages=[];
                    $("#divramassage > input").each(function() {
                        var value = $(this).attr("value");
                        lesRamassages.push(value);
                    });
                    $.post("ajax/traiterajouteroffre.php",{
                                "typeoffre" : typeoffre,
                                "periodicite" : periodicite,
                                "heureminute" : heureminute,
                                "lieu" : lieu,
                                "date" : date,
                                "jour" : jour,
                                "lesramassages" : lesRamassages
                                },
                                 foncRetourAjouterOffre);
                   }             
                });
                function foncRetourAjouterOffre(data){
                        if(data)
                            alert("offre bien enregistrée");
                }
                    
     
      
    
}); // fin fonction principale/* 


