<?php
require ('connexion.php');
/* $conn=connexionBD();

$insertMusique = insertMusique("National Antheme");

    
if($conn != NULL){
    echo "Connexion BD reussie <br/>";
}else{
    echo "Connection BD échouée <br/>";
}


/* insertHobby("Booby");

$hobbies = selectAllHobbies();

foreach ($hobbies as $hobbie)
echo '<Input type="checkbox">'.$hobbie->Type.'</Input>'; 


if($insertMusique === true){
    echo "Insertion OK<br/>";
}elseif($insertMusique === false){
    echo "Insertion pas OK<br/>";
}else{
    echo "Not catched<br/>";
}

insertPersonne("Valjean","Juliette","https://www.google.com/","1983/10/12","Sagitaire");
insertPersonne("Picobello","Julien","https://www.google.com/","1983/10/12","Babaorhum");

$musiques = selectAllMusique();

foreach ($musiques as $musique)
echo '<Input type="checkbox">'.$musique->Type.'</Input><br/>';

$personne = selectPersonneById("12");

echo $personne->Nom."<br/>";


$jeanJackques = selectPersonneByNom("Ju");

foreach ($jeanJackques as $personne){
    echo $personne->Nom."<br/>";
} */


// ORIENTE OBJET

$appliDB = new Connexion();



//$appliDB->setHobby("Ice");

/* $hobbies = $appliDB->getHobbies();

foreach ($hobbies as $hobbie)
echo '<Input type="checkbox">'.$hobbie->type.'</Input>'; */


//$appliDB->setMusic("Electronic");

//echo $appliDB->getLastId();






 
//$appliDB->setPerson("Jonathan", "Dubosque", "https:/www.google.com/maskass/","2014/07/07","Sagitaire");
//$appliDB->setPersonne("Jorge", "SanJose-Delaroya-Pinto", "https:/www.google.com/maskass/","2014/07/07","Canard laqué");

/* $hobbiesById=$appliDB->getPersonneHobby(1);



 foreach($hobbiesById as $hobbie){
    echo $hobbie->Type."<br/>";
} */

/*
$musiqueById =$appliDB->getPersonneMusique(1);

foreach($musiqueById as $musique){
    echo $musique->Type."<br/>";
} */



/* $relationByType = $appliDB->getRelationPersonne(1);
echo "<pre>";
print_r($relationByType);
echo "</pre>"; */

?>