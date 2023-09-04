
<?php include_once "../inc/header.php" ; ?>



<div class="container">

   <form action="../model/db_hotel.php" method="post">
         
         <div class="form-group">
           <label for="email">Name :</label>
           <input type="text" class="form-control"  name="hotel_name" >
         </div>
         
         <div class="form-group">
           <label>Location :</label>
           <input type="text" class="form-control"  name="location" >
         </div>
         <div class="form-group">
           <label >Capacity :</label>
           <input type="number" class="form-control"  name="capacity" >
         </div>
         

         <button type="submit" id="bouton" class="btn btn-primary mt-5 mb-5" name="add_hotel" value="submit">add hotel</button>
   </form>
</div>
<?php include_once "../inc/footer.php" ; ?>