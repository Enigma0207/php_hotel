<?php
session_start();

require_once ("../inc/database.php");
if(isset($_POST["submit"])){
    // récupére les info saisies par le user

    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    // se connecter
    $db = dbconnexion();
    // préparer la request de lecture(recuperer les inf de la table de users)

    $_request = $db->prepare("SELECT * FROM users WHERE email =?");

    try {
       $_request->execute(array($email));
       //recuperer le résultat de la requête (cad un obje q'il faut transformer en tableau avk fetch)
       $userInfo =  $_request->fetch();
       if (empty($userInfo)) {
       
          echo "utilisateur inconnue";
       }else {
        //    verifier si le mot de passe est correct
            if(password_verify($password, $userInfo['password'])){
             //si l"utilisateur est admin,
                if($userInfo['role'] =='admin'){
                  // definir la variable de session
                    $_SESSION["role"] = $userInfo["role"];
                    $_SESSION["id_user"] = $userInfo["id_user"];
                 header("Location: http://localhost/php_hotel/admin/admin.php");
               }else{
                  // ici on dit k la session c'est client pck c'est else
                    $_SESSION["role"] = $userInfo["role"];
                 header("Location: http://localhost/php_hotel/user_home.php");
              }
           } else{
             echo "mot de passe non reconnue";
         }
       }
       
    } catch (PDOEexception $e) {
     
        $Se->getMessage();
    }



}

