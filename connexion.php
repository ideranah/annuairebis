<?php

class Connexion {

        private $connexion;

        public function __construct(){
           
            $PARAM_hote='localhost';
            $PARAM_port='3306';
            $PARAM_nom_bd='annuaire';
            $PARAM_utilisateur='redi';
            $PARAM_mot_passe='Pa55w.rd';
            
            try{
                
                $this->connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd,$PARAM_utilisateur,$PARAM_mot_passe);
                
            }catch(Exception $e){

                echo 'Erreur : '.$e->getMessage().'<br />';
                echo 'N° : '.$e->getCode();
                
            }
        }

        public function getLastId(){
            return $this->connexion->lastInsertId();
        }
    
        public function setHobby(string $hobby){
        
            $requete_prepare =$this->connexion->prepare("INSERT INTO hobby (Type) values (:hobby)");
            
            $requete_prepare->execute(array( 'hobby' => "$hobby"));
                
        }

            
        public function getHobbies(){
        
            $requete_prepare =$this->connexion->prepare("SELECT type FROM hobby");
        
            $requete_prepare->execute();
            
            $resultat=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
            
            return $resultat;   
        }

        public function setPersonneHobby($personneId, $hobbyId){
            $requete_prepare =$this->connexion->prepare("INSERT INTO relation_hobby (person_id,hobby_id) values(:personneId,:hobbyId)");
            return $requete_prepare->execute(array('personneId'=>$personneId,'hobbyId'=>$hobbyId));

        }

        public function setMusic(string $style){
                
            try{
                $requete_prepare = $this->connexion->prepare("INSERT INTO music (type) values (:style)");
                
                $requete_prepare->execute(array('style' => "$style"));
                            
            }catch(Exeption $e){
                echo 'Erreur : '.$e->getMessage().'<br />';
                echo 'N° : '.$e->getCode();
                return false;
            }

            return true;
        }
                    
        public function getMusic(){
            
            $requete_prepare = $this->connexion->prepare("SELECT type FROM music");
                
            $requete_prepare->execute();
                
            $resultat=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
   
            return $resultat; 
        }
        
        public function setPerson($nom, $prenom, $urlPhoto, $dateNaissance,$genre, $status){
                        
            $requete_prepare = $this->connexion->prepare(
                "INSERT INTO person (last_name,first_name,photo_url,birthday,gender,marital_status) values (:nom,:prenom,:url_photo,:date_naissance,:genre,:status_couple)");
                
            $requete_prepare->execute(
                array('nom' => "$nom",'prenom' => "$prenom",'url_photo' => "$urlPhoto",'date_naissance' => "$dateNaissance",'genre'=>"$genre",'status_couple' => "$status"));
    
            }
        

        public function getPerson(){
                
            $requete_prepare=$this->connexion->prepare("SELECT * FROM person");
                    
            $requete_prepare->execute();
                    
            $resultat=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
                    
            return $resultat;
        }

            
        public function getPersonById(int $id){
                
            $requete_prepare=$this->connexion->prepare(
                "SELECT * FROM person WHERE id = :id");
                    
            $requete_prepare->execute(array("id"=>$id));
                    
            $resultat=$requete_prepare->fetch(PDO::FETCH_OBJ);
                    
            return $resultat;
        }

                
        public function getPersonByNameLike(string $pattern){
                    
            $requete_prepare=$this->connexion->prepare("SELECT * FROM person WHERE last_name LIKE :nom OR first_name LIKE :prenom");
    
            $requete_prepare->execute(array("nom"=>"%$pattern%","prenom"=>"%$pattern%"));

            $resultat=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
        
        return $resultat;
        }


        public function getPersonHobby(int $personneId){

            $requete_prepare = $this->connexion->prepare(
                "SELECT Type FROM person_hobby
                INNER JOIN hobby ON hobby_id = id
                WHERE person_id = :id");

            $requete_prepare->execute(
                array("id"=>$personneId));

            $hobbies = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

            return $hobbies;
        }


         public function getPersonMusic($personneId){

            $requete_prepare = $this->connexion->prepare(
                "SELECT Type FROM person_music
                INNER JOIN music ON music_id = id
                WHERE person_id = :id");

            $requete_prepare->execute(
                array("id"=>$personneId));

            $musiques = $requete_prepare->fetchAll(PDO::FETCH_OBJ);

            return $musiques;
            
        }

        public function getPersonRelation($personneId){
            
            $requete_prepare =$this->connexion->prepare(
            "SELECT * FROM person_relation
            INNER JOIN person ON person_relation.relation_id = person.id
            WHERE person_relation.person_id = :id");

            $requete_prepare->execute(array("id"=>$personneId));
            
            $relation =$requete_prepare->fetchAll(PDO::FETCH_OBJ);

            return $relation;

        }

        
}
    ?>