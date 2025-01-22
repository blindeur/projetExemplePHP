<?php  //code php qui decide de ce qu'il faut donner comme valeur à la variable $template

//on ajoutera par la suite les require aux modeles


// récupération du chemin désiré
$uri = $_SERVER["REQUEST_URI"];
($uri);
if ($uri === "/connexion"){
    ("coucou");
    $title = "Connexion";                   //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/Users/Connexion.php";       //chemin vers la vue demandée
    require_once("Views/base.php");            //appel de la page de base qui sera remplie avec la vue demandée
}
elseif ($uri === "/deconnexion") {              //on anticipe pour la suite
    // a voir plas tard
}
elseif ($uri ==="/inscription") {
    $title = "Inscription";                     //titer à afficher dans l'onglet du navigateur
    $template = "Views/Users/inscriptionOrEditProfil.php";    //chemin vers la vue demandée
    require_once("Views/base.php");                //appel de la page de base qui sera remplie avec la vue demandée
}