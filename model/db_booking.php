<!-- verifier si la chambre est dispo a la date de reservation -->
<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/php_hotel/inc/database.php";

if (isset($_POST['book'])) {
    // recupere les info
    $idRoom = htmlspecialchars($_POST["id_room"]);
    $startDate = htmlspecialchars($_POST["start_date"]);
    $endDate = htmlspecialchars($_POST["end_date"]);
    $price = htmlspecialchars($_POST["price"]);
    // convertir en date car c'etait une chaine de caractaire voir php.net
    $dateStart = strtotime($startDate);
    $dateEnd = strtotime($endDate);

    $duration = $dateEnd - $dateStart;
    $nbDay = $duration / 86400;
    //  recuperer la date d'aujourdui en php
    $today = date("ymd");
    //  echo   $today;
    //convertir en second, si $today est superieur a la date de debut de reservation ou inferieur a la date de la fin de reservation
    if(strtotime($today)> strtotime($startDate) ||  strtotime($today)> strtotime($endDate)){
         echo '<script> alert("votre date de debut ou de fin de rservation ne peut pas etre inferieur a la adate d aujourdhui")</script>';
         echo '<script>window.location.href = "http://localhost/php_hotel/booking.php?room='.$idRoom.'&price='.$price.'";</script>';
    }else{
        // se connecter a la bd
        $db = dbconnexion();

        // preparer la requete pour verifier si la chambre est dispo entre la date de depart et la date de fin
        $request = $db->prepare("SELECT * FROM bookings WHERE room_id = ? AND ((booking_start_date <= ? AND booking_end_date >= ?) OR (booking_start_date <= ? AND booking_end_date >= ?))");    // request execute la request

        try {
            $request->execute(array($idRoom, $startDate, $startDate, $endDate, $endDate));
            $books = $request->fetch();
            if (empty($books)) {
                if ($startDate < $endDate) {
                    // preparer la request pour reserver la chambre
                    $request = $db->prepare("INSERT INTO `bookings`(`booking_start_date`, `booking_end_date`, `user_id`, `room_id`, `booking_price`, `booking_state`) VALUES (?,?,?,?,?,?)");
                    //executer la request
                    try {
                        $request->execute(array($startDate, $endDate, $_SESSION["id_user"], $idRoom, $price * $nbDay, "in progress"));
                        //redirige vers user_home.php

                        header("Location:http://localhost/user_home.php");
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }else{
                echo "Chambre pas disponible a cette date";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
   
}

    // echo "nombre des jours: " . $nbDay;



?>