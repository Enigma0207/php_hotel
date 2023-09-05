
<?php 
session_start();
include_once 'inc/header.php' ;
require_once("model/function.php");
$listRoom = roomlList();

?>
<!-- on veux afficher la liste des hotels -->



<div class="container d-flex flex-wrap">
        <!-- bootstrap -->
   <?php foreach($listRoom as $room){ ?>

       <div class="card" style="width: 18rem;">

          <div class="img_room">
             <img src="assets/imgs/<?=$room["room_imgs"]; ?>" class="card-img-top" alt="image"; ?>
          </div>
        <div class="card-body">
           <p class="card-text"><?=$room["price"]; ?>£/nuit</p>
           <p class="card-text"><?=$room["category"]; ?></p>
           <p class="card-text"><?=$room["persons"]; ?> persons</p>
           <!-- on veut faire passer le parametre avk la methode get sinon on cree un formulaire pour la methode post -->
           <a class="btn btn-success" href="booking.php?room=<?= $room["id_room"]; ?>&price=<?= $room["price"] ?>">Book this Room</a>
       </div>

   </div>
 <?php } ?>



</div>


<?php include_once 'inc/footer.php' ;?>
<!-- cintenu de la page d'accueil -->










 
