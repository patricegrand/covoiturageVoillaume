<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application restServeurCovoiturage
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoCovoiturage{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=bd_covoiturageV2';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;		
	private static $monPdo;
	private static $monPdoCovoiturage=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	self::$monPdo = new PDO(self::$serveur.';'.self::$bdd, self::$user, self::$mdp); 
		self::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		self::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdo(){
		if(self::$monPdoCovoiturage==null){
			self::$monPdoCovoiturage= new PdoCovoiturage();
		}
		return self::$monPdoCovoiturage;  
	}
/**
 * Retourne les informations des chauffeurs sans mot de passe ni login
 
 * @param $login 
 * @param $mdp
 * @return le tableau associatif 
*/
	public function getLesChauffeurs(){
		$req = "select id, nom, prenom, tel, mail, adresse from pgcovchauffeur";
                var_dump($req);
		$rs = self::$monPdo->query($req);
		$lesLignes = $rs->fetchAll();
             
		return $lesLignes;
	}
        public function getLesOffresArriveeLycee(){
               $req = "select O.*, nom, prenom from pgcovoffre O INNER JOIN pgcovchauffeur C ON C.id = O.idChauffeur WHERE depart = 'domicile' order by numJour";
           
                    //var_dump($req);
               error_log($req);
               $rs = self::$monPdo->prepare($req);
                    
               $rs = self::$monPdo->query($req);
               $lesLignes = $rs->fetchAll();
               return $lesLignes;
        }
        function getLesOffresDepartLycee()
        {
            $req = "select dateOffre, heure, jour, lieu,idChauffeur,nom,prenom from pgcovoffre O INNER JOIN pgcovchauffeur C ON C.id = O.idChauffeur where depart ='entreprise' order by numJour";
            error_log($req);
            $rs = self::$monPdo->prepare($req);
            $rs = self::$monPdo->query($req);
            $lesLignes = $rs->fetchAll();
            return $lesLignes;
            
        }
        
        public function getMesOffresArriveeLycee($id){
               $req = "select O.*, nom, prenom from pgcovoffre O INNER JOIN pgcovchauffeur C ON C.id = O.idChauffeur WHERE depart = 'domicile' and O.id=".$id." order by numJour";
                    
               error_log($req);
               $rs = self::$monPdo->prepare($req);
                    
               $rs = self::$monPdo->query($req);
               $lesLignes = $rs->fetchAll();
               return $lesLignes;
        }
        function getMesOffresDepartLycee($id)
        {
            $req = "select O.id,dateOffre, heure, jour, lieu,idChauffeur,nom,prenom from pgcovoffre O INNER JOIN pgcovchauffeur C ON C.id = O.idChauffeur where depart ='entreprise' and O.id=".$id." order by numJour";
            error_log($req);
            $rs = self::$monPdo->prepare($req);
            $rs = self::$monPdo->query($req);
            $lesLignes = $rs->fetchAll();
            return $lesLignes;
            
        }
        public function getLeChauffeur($id){
            $req = "select * from pgcovchauffeur where id = '$id'";
            $rs = self::$monPdo->query($req);
	    $laLigne = $rs->fetch();
            return $laLigne;
            
        }
        public function login($user,$mdp){
            
            $req = "select * from pgcovchauffeur where login= '$user' and mdp ='$mdp' ";
            error_log($req);
            $rs = self::$monPdo->query($req);
	    $laLigne = $rs->fetch();
            error_log($laLigne);
            return $laLigne;
        }
        public function supprimerOffre($mdp,$idOffre){
                $req = "select mdp from pgcovchauffeur,pgcovoffre where pgcovoffre.idChauffeur = pgcovchauffeur.id "; 
                $req .= "  and pgcovoffre.id = '".$idOffre."'";

                $rs = self::$monPdo->query($req);
                $laLigne = $rs->fetch();
                if($laLigne['mdp'] == $mdp){
                    $ret = true;
                    $req = "delete from pgcovoffre where pgcovoffre.id =".$idOffre;
                    if(self::$monPdo->exec($req)==0)
                        throw new Exception("Aucune ligne supprimée");
                }
                else 
                    throw new Exception("Vous n'avez pas les droits");
                
                
            
         
        }
        
        public function ajouterOffre($idChauffeur,$jour,$heure,$lieu,$depart,$dateOffre,$ramassage1,$ramassage2){
            
            $req ="INSERT INTO pgcovoffre (dateOffre, heure, jour, lieu, depart,idChauffeur,ramassage1,ramassage2) VALUES ";
            $req.= "('" .$dateOffre. "', '" .$heure. "','" .$jour. "','" .$lieu. "','" .$depart. "','". $idChauffeur. "',";
            if(isset($ramassage1)){
                $req.= "'" .$ramassage1. "',";
             }
            else 
                $req.= ",";
            
            if(isset($ramassage2)){
                $req.= "'" .$ramassage2. "'";
             }
            $req.= ")";
         self::$monPdo->exec($req);
        
                  //    throw new Exception("Offre non ajoutée");
       
        
        }
        public function ajouterChauffeur($nom,$prenom,$adresse,$tel,$mail, $user, $mdp){
            
            $req = "insert into pgcovchauffeur(nom, prenom,adresse, tel, mail,login, mdp)  " ;
            $req.= "values('".$nom."','".$prenom."','".$adresse."','".$tel."','".$mail."','".$user."','".$mdp."')";
             self::$monPdo->exec($req);
             error_log($req,3,'/homez.218/grandpat/www/php.log');
             
        }
       /* 
        * public function supprimerOffre($args){
           
                $mdp = $args['mdp'];
                $idOffre = $args['offre'];
                $req = "select mdp  from pgcovchauffeur,pgcovoffre where pgcovoffre.idChauffeur = pgcovchauffeur.id "; 
                $req .= "  and pgcovoffre.id = '".$idOffre."'";

                $rs = self::$monPdo->query($req);
                $laLigne = $rs->fetch();
                if($laLigne['mdp'] == $mdp){
                    $ret = true;
                    $req = "delete from pgcovoffre where pgcovoffre.id =".$idOffre;
                    if(self::$monPdo->exec($req)==0)
                        throw new Exception("Aucune ligne supprimée");
                }
                else 
                    throw new Exception("Vous n'avez pas les droits");
                
                
            
         
        }
        * public function ajouterOffre($args){
            
            $idChauffeur = $args['idChauffeur'];
            $jour = $args['jour'];
            $heure = $args['heure'];
            $lieu = $args['lieu'];
            $depart = $args['depart'];
            $dateOffre = $args['dateOffre'];
            
            $req ="INSERT INTO pgcovoffre (dateOffre, heure, jour, lieu, depart,idChauffeur,ramassage1,ramassage2) VALUES ";
            $req.= "('" .$dateOffre. "', '" .$heure. "','" .$jour. "','" .$lieu. "','" .$depart. "','". $idChauffeur. "',";
            if(isset($args['ramassage1'])){
                $ramassage1 = $args['ramassage1'];
                $req.= "'" .$ramassage1. "',";
             }
            else 
                $req.= ",";
            
            if(isset($args['ramassage2'])){
                $ramassage2 = $args['ramassage2'];
                $req.= "'" .$ramassage2. "'";
             }
            $req.= ")";
         self::$monPdo->exec($req);
        
                  //    throw new Exception("Offre non ajoutée");
       
        
        }
        public function ajouterChauffeur($args, $user, $mdp){
            $nom = $args['nom'];
            $prenom = $args['prenom'];
            $lieu = $args['lieu'];
            $tel = $args['tel'];
            $mail = $args['mail'];
            $req = "insert into pgcovchauffeur(nom, prenom,lieu, tel, mail,nomUser, mdp)  " ;
            $req.= "values('".$nom."','".$prenom."','".$lieu."','".$tel."','".$mail."','".$user."','".$mdp."')";
             self::$monPdo->exec($req);
             error_log($req,3,'/homez.218/grandpat/www/php.log');
             
        }
        */
        
}
?>
