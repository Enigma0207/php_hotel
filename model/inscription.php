<?php
require_once ("../inc/database.php");
if(isset($_POST["submit"])){
    // recupere les info saisie par le user
    $lastName = htmlspecialchars($_POST["lastname"]);
    $firstName = htmlspecialchars($_POST["firstname"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
   
    $address = htmlspecialchars($_POST["address"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $birthday = htmlspecialchars($_POST["birthday"]);
    $gender = htmlspecialchars($_POST["gender"]);
   // cripter le mot de passe
     $criptedPassword = password_hash ($password, PASSWORD_DEFAULT);
    
    //  établir la connexion avc la BDD
    $db= dbconnexion();
    // prepare requete d'insersion pck on v envoyer à la bdd
    $request = $db->prepare("INSERT INTO `users`( `last_name`, `first_name`, `email`, `password`, `birthday`, `address`, `phone_number`, `gender`) VALUES (?,?,?,?,?,?,?,?)");
  //executer la  requete 
    try {
      $request->execute(array($lastName, $firstName, $email, $criptedPassword, $birthday, $address, $phone,$gender));
    } catch (PDOException $e) {
        echo $e->getMessage();//afficher l'erreur sql genere
    }

}
