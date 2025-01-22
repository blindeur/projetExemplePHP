

<?php // code qui decide ce qu'il faut donner comme valeur à la variable $template

// on ajoutera par la suite les require aux modéles

//récupération du chemin désiré
$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    $title = "page d'acceuille";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}