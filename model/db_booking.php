<!-- verifier si la chambre est dispo a la date de reservation -->
<?php 
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/php_hotel/inc/database.php";

if(isset($_POST['book'])){
    // recupere les info
    $idRoom=htmlspecialchars ($_POST["id_room"]);
    $startDate=htmlspecialchars ($_POST["start_date"]);
    $endDate=htmlspecialchars ($_POST["end_date"]);
    $price = htmlspecialchars ($_POST["price"]);
    // convertir en date car c'etait une chaine de caractaire voir php.net
    $startDate = strtotime ($startDate);
    $endDate = strtotime($endDate);

    $duration =  $endDate - $startDate;
    $nbDay =  $duration / 86400;

    echo "nombre des jours: " .$nbDay;
    // se connexter la bdd

    $db= dbconnexion();

    // request pour verifier si la chambre est disponible à la date de depart et d'arriver

    $request = $db->prepare("SELECT * FROM bookings WHERE room_id = ? AND booking_start_date < ? AND booking_end_date > ?");
    // request execute la request

    try {
    $request->execute(array($idRoom, $startDate, $endDate));
    $books=$request->fetch();
    if (empty($books)){
        if ($startDate<$endDate) {
            // preparer la request pour reserver la chambre
            $request = $db->prepare("INSERT INTO `bookings`(`booking_start_date`, `booking_end_date`, `user_id`, `room_id`, `booking_price`, `booking_state`) VALUES (?,?,?,?,?,?)");
        }
    }
    } catch (PDOException $e) {
        echo $e->getMessage;
    }
 

}

?>