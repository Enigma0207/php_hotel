<?php
function dbconnexion(){
    $connexiondb =null;
    try {
         $connexiondb = new PDO("mysql:host=localhost;dbname=hotel_db","root","");
    } catch (PDOEexption $e) {
       $connexiondb = $e->getMessage();
    }
  return  $connexiondb ;
}