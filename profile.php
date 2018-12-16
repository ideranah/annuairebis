
<?php
    require ('connexion.php');
    $appliDB = new Connexion();
    $personne=$appliDB->getPersonneById($_GET["id"]);
    $hobbiesById=$appliDB->getPersonneHobby($_GET["id"]);
    $relationsById=$appliDB->getRelationPersonne($_GET["id"]);
    $musiqueById=$appliDB->getPersonneMusique($_GET["id"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Profil</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <a class="navbar-brand" href="annuaire.php">
            <img src="https://www.freeiconspng.com/uploads/am-a-19-year-old-multimedia-artist-student-from-manila--21.png"
                alt="" height="30" width="30">
            ReannuairE
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="inscription.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="annuaire.php">Annuaire</a>
            </ul>
        </div>
    </nav>

    <div class="container ">
        <div class="container-medium border shadow-lg p-3 mb-5 bg-white rounded">
            <div class="row justify-content-center">
                <img class="rounded-circle" src="https://pbs.twimg.com/profile_images/817411634113040385/x3omzI6x_400x400.jpg"
                    alt="">
            </div>
            <div class="container border shadow-lg p-3 bg-white rounded float-righ mt-5">
                <h4 class="genremusical row justify-content-center">Donnes personnelles</h4>
                <div class="nom row justify-content-center"><?php echo $personne->Prenom ?></div>
                <div class="prenom row justify-content-center"><?php echo $personne->Nom ?></div>
                <div class="datenaissance row justify-content-center"><?php echo $personne->Date_Naissance ?></div>
                <div class="statut row justify-content-center"><?php echo $personne->Statut_couple ?></div>
            </div>

            <div class="container-medium border shadow-lg p-3 mb-5 mt-5 bg-white rounded">
                <h4 class="genremusical row justify-content-center">Genre de musique</h4>
                <?php
                    foreach($musiqueById as $musique){

                        echo '<div class="genre">'.$musique->Type.'</div>';
                    }
                ?>
            </div>

            <div class="container-medium border shadow-lg p-3 mb-5 mt-5 bg-white rounded">
                <h4 class="genremusical row justify-content-center">Hobbies</h4>
                <?php
                    foreach($hobbiesById as $hobbie){

                        echo '<div class="genre">'.$hobbie->Type.'</div>';

                    }
                ?>

            </div>


            <ul class="list-group container border shadow-lg p-3 mb-5 bg-white rounded">
                <li class="list-group-item profil-title">
                    <a class="" href="profile.html">
                        LISTE DES AMIS
                    </a>
                </li>

                <?php
                foreach($relationsById as $relation){

                echo '<li class="list-group-item">
                     <a class="link-profil" href="profile.php?id='.$relation->Id.'">
                     <img src="https://avatarfiles.alphacoders.com/547/54795.jpg" width="50" height="50" alt="">
                     '.$relation->Nom.' '.$relation->Prenom.'
                     </a>
                     </li>';
                }
                ?>
            </ul>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>