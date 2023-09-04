<?php include_once "../inc/header.php" ; ?>
<?php include_once "../model/function.php" ;
$listHotel = hotelList(); ?>



<div class="container">

   <form action="../model/db_room.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label>Hotel :</label>
          <!-- on veut afficher la list des hotels ou on va ajouter les room  -->
          <select name="hotel" class="form-control" >
              <option value="">Choose hotel</option>
              <?php ; foreach($listHotel as $hotel) {?>
                <option value="<?= $hotel ['id_hotel'] ?>"><?= $hotel['hotel_name'] ?></option>
              <?php } ?>

          </select>
         
        </div>
         
         
         <div class="form-group">
         <label for="firstname">Room number :</label>
         <input type="number" class="form-control" name="room_number" >
         </div>
         
         
         <div class="form-group">
         <label for="email">Room price :</label>
         <input  class="form-control" type="text"  name="room_price" >
         </div>
         
         <div class="form-group">
         <label >persons :</label>
         <input  class="form-control" type="number"  name="person" required >
         </div>
         
         
         
         
         <div class="form-group">
          <label>capaity :</label>
          <select name="category" >
              <option value="">Choose category</option>
              <option value="Classic">Classic</option>
              <option value="VIP">VIP</option>
          </select>
         
         </div>
         <div class="form-group">
         <label >photo :</label>
         <input type="file" class="form-control"  name="image" >
         </div>
         
       
         
         
         <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="add_room" value="submit">Submit</button>
   </form>



</div>
<?php include_once "../inc/footer.php" ; ?>