<!-- ici pour afficher la liste des hotels -->
<?php include_once "../inc/header.php" ; ?>
<?php include_once "../model/function.php" ;

$listHotel = hotelList(); ?>

<div class = container>
  <table class = "table">
    <thead>
        <tr>
        <th>Id hotel</th>
        <th>Hotel_name</th>
        <th>Location</th>
        <th>Capacity</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($listHotel as $hotel){ ?>
           <tr>
               <td><?= $hotel ['id_hotel'];?></td>
               
    <td><?= $hotel ['hotel_name'];?></td>
               
               <td><?= $hotel ['location'];?></td>
               
               <td><?= $hotel ['capacity'];?></td>
               
         </tr>
        <?php } ?>
    </tbody>
    </table>
</div>

<?php include_once "../inc/footer.php" ; ?>




