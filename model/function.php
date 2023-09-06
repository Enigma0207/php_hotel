<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/php_hotel/inc/database.php";




function hotelList (){
     $listHotel=null;
    // se connecter à la bdd
$db= dbconnexion();
    //  prepare la request, recupere tous les champs de la table hotels, sachant que le nom de l'hotel est unique

    $request= $db->prepare("SELECT * FROM hotels");
    //execute la requete
    try {
         $request->execute();
    // recupere les resultat dans un tableau 
    $listHotel= $request->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
   
    return $listHotel;
}

// fonction pour list room

function roomlList (){
     $listRoom=null;
    // se connecter à la bdd
$db= dbconnexion();
    //  prepare la request, recupere tous les champs de la table hotels, sachant que le nom de l'hotel est unique

    $request= $db->prepare("SELECT * FROM rooms");
    //execute la requete
    try {
         $request->execute();
    // recupere les resultat dans un tableau 
    $listRoom= $request->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
   
    return $listRoom;
}

// fonction pour recuperer les reservation d'un utilisateur particulier qui s'est connecté

function userBookList ($idUser){
    // se connecter à la bdd
$db= dbconnexion();
    //  prepare la request, recupere tous les champs de la table hotels, sachant que le nom de l'hotel est unique

    $request= $db->prepare("SELECT * FROM bookings WHERE user_id=? AND booking_state = ?");
    $userBookingList = null;
    //execute la requete
    try {
         $request->execute(array($idUser, 'in progress'));
    // recupere les resultat dans un tableau 
    $userBookingList= $request->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
   
    return  $userBookingList;
}