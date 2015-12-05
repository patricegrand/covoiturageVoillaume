<?php

// code non encore écrit qui retournera le login s'il est présent en base ou une chaine vide, 
// à faire dans une itération suivante
function verifuser($login, $mdp)
{
    $tab =  GetLesUsers();
    $user = array();
    foreach($tab as $unUser){
        if($unUser['login']==$login && $unUser['mdp']==$mdp){
            $user = $unUser;
         }
    }
        
    return $user;
}
function estConnecte()
{
    return isset($_SESSION['user']);
}


// retourne un tableau trié sur les jours de la semaine croissants
function getLesOffresDepartEntreprise()
{
    $tab=array(
                array("id"=>1,
                       "idchauffeur"=>"c1",
                       "jour"=>"mardi",
                       "date"=>"permanent",
                       "heure"=>"15h",
                       "retour"=>"place gambetta Paris 20",
                       "nom"=>"Durand",
                       "prenom"=>"Jean",
                       "mail"=>"durand@gmail.com",
                       "tel"=>"0148592370"),
                array("id"=>2,
                        "idchauffeur"=>"c2",
                       "jour"=>"mardi",
                       "date"=>"15/02/2014",
                        "heure"=>"16h",
                       "retour"=>"Métro Robespierre",
                     "nom"=>"Duval",
                       "prenom"=>"Anne",
                     "mail"=>"duval@gmail.com",
                       "tel"=>"0688300169"),
                array("id"=>3,
                       "idchauffeur"=>"c3",
                       "jour"=>"mercredi",
                       "date"=>"26/02/2014",
                        "heure"=>"17h30",
                       "retour"=>"Mairie de Bobigny",
                     "nom"=>"Ahmad",
                       "prenom"=>"Louise",
                     "mail"=>"ahmad@gmail.com",
                     "tel"=>"01458798"),
                array("id"=>4,
                        "idchauffeur"=>"c1",
                       "jour"=>"mercredi",
                       "date"=>"permanent",
                        "heure"=>"17h",
                       "retour"=>"place gambetta Paris 20",
                        "nom"=>"Durand",
                       "prenom"=>"Jean",
                      "mail"=>"durand@gmail.com",
                       "tel"=>"0148592370"),
                array("id"=>5,
                       "idchauffeur"=>"c2",
                       "jour"=>"vendredi",
                       "date"=>"28/02/2014",
                        "heure"=>"17h30",
                       "retour"=>"Métro Robespierre",
                     "nom"=>"Duval",
                       "prenom"=>"Anne",
                        "mail"=>"duval@gmail.com",
                       "tel"=>"0688300169"),
                array("id"=>6,
                    "idchauffeur"=>"c3",
                       "jour"=>"vendredi",
                       "date"=>"permanent",
                        "heure"=>"15h30",
                       "retour"=>"Mairie de Bobigny",
                    "nom"=>"Ahmad",
                       "prenom"=>"Louise",
                     "mail"=>"ahmad@gmail.com",
                     "tel"=>"01458798"),
                        
    );
    return $tab;
    
}

function getOffreDepartEntreprise($id){
    $lesOffres = getLesOffresDepartEntreprise();
    $offre=array();
    foreach ($lesOffres as $uneOffre){
            if($uneOffre["id"]==$id)
                 $offre =  $uneOffre;
    }
    return $offre;
}
function getLesOffresArriveeEntreprise(){
    $tab=array(
                array("id"=>7,
                        "idchauffeur"=>"c1",
                       "jour"=>"lundi",
                       "date"=>"permanent",
                       "heure"=>"8h",
                       "ramassage"=> array(array("id"=>1,"lieu"=>"Paris porte des lilas"),array("id"=>2,"lieu"=>"Paris porte de bagnolet")),
                       "depart"=>"place gambetta Paris 20",
                       "nom"=>"Durand",
                       "prenom"=>"Jean",
                        "mail"=>"durand@gmail.com",
                       "tel"=>"0148592370"),
                array("id"=>8,
                       "idchauffeur"=>"c1",
                       "jour"=>"mardi",
                       "date"=>"15/02/2014",
                        "heure"=>"9h",
                      "ramassage"=> array(array("id"=>1,"lieu"=>"Paris porte des lilas"),array("id"=>2,"lieu"=>"Paris porte de bagnolet")),
                       "depart"=>"place gambetta Paris 20",
                     "nom"=>"Durand",
                       "prenom"=>"Jean",
                     "mail"=>"durand@gmail.com",
                       "tel"=>"0148592370"),
                array("id"=>9,
                    "idchauffeur"=>"c2",
                       "jour"=>"mardi",
                       "date"=>"26/02/2014",
                        "heure"=>"7h30",
                      "ramassage"=> array(array("id"=>1,"lieu"=>"Montreuil Mairie"),array("id"=>2,"lieu"=>"Montreuil Place Villiers")),
                       "depart"=>"Métro Robespierre",
                     "nom"=>"Duval",
                       "prenom"=>"Anne",
                        "mail"=>"duval@gmail.com",
                       "tel"=>"0688300169"),
                array("id"=>10,
                      "idchauffeur"=>"c2",
                       "jour"=>"mercredi",
                       "date"=>"permanent",
                        "heure"=>"8h",
                          "ramassage"=> array(array("id"=>1,"lieu"=>"Montreuil mairie"),array("id"=>2,"lieu"=>"Montreuil Place Villiers")),
                       "depart"=>"Métro Robespierre",
                     "nom"=>"Duval",
                       "prenom"=>"Anne",
                        "mail"=>"duval@gmail.com",
                       "tel"=>"0688300169"),
                array("id"=>11,
                       "idchauffeur"=>"c1",
                       "jour"=>"vendredi",
                       "date"=>"28/02/2014",
                        "heure"=>"7h30",
                       "ramassage"=> array(array("id"=>1,"lieu"=>"Paris porte des lilas"),array("id"=>2,"lieu"=>"Paris porte de bagnolet")),
                       "depart"=>"place gambetta Paris 20",
                     "nom"=>"Durand",
                       "prenom"=>"Jean",
                         "mail"=>"durand@gmail.com",
                       "tel"=>"0148592370"),
                array("id"=>12,
                       "idchauffeur"=>"c3",
                       "jour"=>"vendredi",
                       "date"=>"permanent",
                        "heure"=>"8h",
                     "ramassage"=> array(array("id"=>1,"lieu"=>"Métro Bobigny"),array("id"=>2,"lieu"=>"Bondy N3")),
                       "depart"=>"Mairie de Bobigny",
                    "nom"=>"Ahmad",
                       "prenom"=>"Louise",
                     "mail"=>"ahmad@gmail.com",
                     "tel"=>"01458798"),
                        
    );
    return $tab;
    
    
    
}
function getOffreArriveeEntreprise($id){
    $lesOffres = getLesOffresArriveeEntreprise();
    $offre=array();
    foreach ($lesOffres as $uneOffre){
         if($uneOffre["id"]==$id)
                 $offre =  $uneOffre;
    }
    return $offre;
}
/* retourne la liste des inscrits*/
function GetLesUsers(){
    $tab=array( 
                array("id"=>"c1","login"=>"jdurand","mdp"=>"aaaa","adresse"=>"75020 place Gambetta","mail"=>"durand@gmail.com"),
                array("id"=>"c2","login"=>"dduval","mdp"=>"bbbb","adresse"=>"93100 mairie de Montreuil","mail"=>"duval@gmail.com"),
                array("id"=>"c3","login"=>"lahmad","mdp"=>"cccc","adresse"=>"93000 Métro Bobigny","mail"=>"ahmad@gmail.com"),
                array("id"=>"c4","login"=>"pgrand","mdp"=>"cccc","adresse"=>"93000 Métro Bobigny","mail"=>"patricegrand@free.fr")
            );
   return $tab;
}

function getMesOffresDepartEntreprise($id){
    $tab = getLesOffresDepartEntreprise();
    $lesOffres = array();
    foreach($tab as $uneOffre)
        if($uneOffre['idchauffeur'] == $id)
                $lesOffres[] = $uneOffre;
    return $lesOffres;    
}
function getMesOffresArriveeEntreprise($id){
    $tab = getLesOffresArriveeEntreprise();
    $lesOffres = array();
    foreach($tab as $uneOffre)
        if($uneOffre['idchauffeur'] == $id)
                $lesOffres[] = $uneOffre;
    return $lesOffres;    
}
function getUser($login){
    $tab =  GetLesUsers();
    $user = array();
    foreach($tab as $unUser){
        if($unUser['login']==$login ){
            $user = $unUser;
         }
    }
        
    return $user;
    
}
?>
