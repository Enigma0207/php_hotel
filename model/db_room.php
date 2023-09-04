<?php

require_once"../inc/database.php";
if(isset($_POST['add_room'])){
    $hotel=htmlspecialchars($_POST['hotel']);
    $room_Number=htmlspecialchars($_POST['room_number']);
    $room_Price=htmlspecialchars($_POST['room_price']);
    $person=htmlspecialchars($_POST['person']);
    $category=htmlspecialchars($_POST['category']);
    $imageName=$_FILES['image']['name'];
    $tmpName=$_FILES['image']['tmp_name'];
    $destination = $_SERVER["DOCUMENT_ROOT"] .'/HOTEL_PHP/assets/imgs/' .$imageName;

    if(move_uploaded_file( $tmpName, $destination)){
        // se connecter a la bdd
        $db = dbconnexion();

        $request = $db->prepare("INSERT INTO rooms(room_number, price , room_imgs , persons , category, hotel_id)VALUES(?,?,?,?,?,?)");
    //    execute la request
    try {
        $request->execute(array($room_Number, $room_Price , $imageName , $person , $category, $hotel));
        // rediriger vert la list_room.pho
        header("Location:http://localhost/admin/room_list.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    }

}