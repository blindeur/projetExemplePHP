<!-- /*
Fonction createUser
-------------------------
BUT : ajouter les données encodées par l'utilisateur dans la table des utilisateurs
IN : $pdo reprenant toutes les information de connexion
*/ -->
<?php
function createUser($pdo)
{

    try{
        //définition de la requête d'insertion en utilisant la notion de paramètre 
        $query = 'insert into utilisateurs(nomUser, prenomUser, loginUser, passWordUser, emailUser, role) 
        values (:nomUser, :prenomUser, :loginUser, :passWordUser, :emailUser, :role)';
        //préparation de la requête
        $ajouterUser = $pdo->prepare($query);
        //exécution en attribuant les valeurs récupérées dans le formulaire aux paramètres
        $ajouterUser->execute([
            'nomUser' => $_POST["nom"],
            'prenomUser' => $_POST["prenom"],
            'loginUser' => $_POST["login"],
            'passWordUser' => $_POST["mot_de_passe"],
            'emailUser' => $_POST["email"],
            'role' => 'user' 
        ]);
    }catch (PDOEXCEPTION $e) {
        $message = $e->getMessage();
        die($message);      }

}

/* 
Fonction connectUser
-----------------------
BUT : rechercher les données de l'utilisateur dans la base de données pour les mémoriser dans la variable session
IN : $pdo reprenant toutes les information de connexion
*/
function connectUser($pdo)
{
    try {
        //définition de la rquête select en utilisant la notion de paramètre 
        $query = 'select * from utilisateurs where loginUser = :loginUser and passWordUser = :passWordUser';
        //préparation de la requête 
        $connectUser = $pdo->prepare($query);
        //exécution en attribuant les valeurs récupérées dans le formulaire aux paramètres
        $connectUser->execute([
            'loginUser' => $_POST["login"],
            'passWordUser' => $_POST["mot_de_passe"]
        ]);
        //stokage des données trouvées dans la variavle $user
        $user = $connectUser->fetch();
        if (!$user){
            return false;
        }
        else{
            //ajout de celle-ci à la variable session
            $_SESSION["user"] = $user;
            return true;
        }
    }catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}