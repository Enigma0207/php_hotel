<?php
require_once "../inc/database.php" ;
if (isset($_POST["add_hotel"])){
   $hotel_Name=htmlspecialchars($_POST['hotel_name']);
   $location=htmlspecialchars($_POST['location']);
   $capacityHotel=htmlspecialchars($_POST['capacity']);


   $db=dbconnexion();
  
  // request
  $request = $db->prepare("INSERT INTO hotels(location,capacity,hotel_name)VALUES(?,?,?)");
  // EXECUT
  
  try {
   $request->execute(array ($location,$capacityHotel,$hotel_Name,));
     header("Location: http://localhost/HOTEL_PHP/admin/hotel_list.php");
  
  } catch (PDOException $e) {
    echo $e->getMessage();
  //    chemin absolue
   
  }
  
}

  

