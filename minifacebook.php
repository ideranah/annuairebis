<?php
 require ('connexion.php');
 
// var_dump($_POST);
 
 function inscription(){
    $appliDB = new Connexion();
    $relationType=$_POST['relation'];
    $musiquesId=$_POST['musique'];
    $hobbysId=$_POST['hobby'];
    
    $appliDB->setPerson($_POST['nom'],$_POST['prenom'],$_POST['urlphoto'],$_POST['date'],$_POST['civilite']);
    $personne_id=$appliDB->getLastId();
        
     
    foreach($hobbysId as $hobbyId){
        $appliDB->setPersonHobby($personne_id,$hobbyId);
    }
    foreach($musiquesId as $musiqueId){
        $appliDB->setPersonMusic($personne_id,$musiqueId);
    } 
    
    foreach($relationType as $relation_id => $rt){
       $appliDB->setPersonRelation($personne_id,$relation_id,$rt);
    }
 }
 
        inscription();
?>