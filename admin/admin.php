<?php 
session_start();
// si  $_SESSION["role"] est definie ou qu'il soit definie mais sa valeur est differente de admin
if (!isset($_SESSION["role"]) || $_SESSION["role"] !="admin") {
  header("Location:http://localhost/php_hotel/login.php");
}
include_once '../inc/header.php' ;?>

<!-- d-flex cest le display flex de bootstrap -->
<div class= "container d-flex justify-content-around flex-wrap flex_cont">
    <!-- de boootsrap, pour lister les taches de l'utilisateur -->
    <div class="card  m-2 "  style="width: 18rem;">
    
    <!-- on remplace img par fontawersome -->
      <i class="fa-solid fa-plus text-center"></i> 
      <div class="card-body">
        <h5 class="card-title">Ajouter hotel</h5>
        <p class="card-text">Clique ici.</p>
        <a href="add_hotel.php" class="btn btn-primary">Ajouter hotel</a>
      </div>
    </div>
    
    <div class="card  m-2 "style="width: 18rem;">
      <i class="fa-solid fa-plus text-center"></i>
      <div class="card-body">
        <h5 class="card-title">Ajouter chambre</h5>
        <p class="card-text">Clique ici.</p>
        <a href="add_room.php" class="btn btn-primary">Ajouter chambre</a>
      </div>
    </div>
<!-- pour la reservation -->
    <div class="card m-2" style="width: 18rem;">
      <i class="fa-solid fa-list text-center"></i>
      <div class="card-body">
        <h5 class="card-title">Liste reservation</h5>
        <p class="card-text">Clique ici pour la liste de reservations.</p>
        <a href="#" class="btn btn-primary">liste de la reservation</a>
      </div>
    </div>
<!-- acceder directement à la liste des chambre -->
    <div class="card m-2" style="width: 18rem;">
      <i class="fa-solid fa-list text-center"></i>
      <div class="card-body">
        <h5 class="card-title">Liste Hotel</h5>
        <p class="card-text">Clique ici pour la liste hotel.</p>
        <a href="hotel_list.php" class="btn btn-primary">listeHotel</a>
      </div>
    </div>
    <div class="card m-2"  style="width: 18rem;">
      <i class="fa-solid fa-list text-center"></i>
      <div class="card-body">
        <h5 class="card-title">Liste Chambre</h5>
        <p class="card-text">Clique ici pour voir la liste des chambres.</p>
        <a href="room_list.php" class="btn btn-primary">liste Chambre</a>
      </div>
    </div>



</div>


<?php include_once '../inc/footer.php' ;?>