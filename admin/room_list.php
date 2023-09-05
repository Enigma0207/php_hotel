<!-- ici pour afficher la liste des hotel -->
<?php include_once "../inc/header.php" ;
 include_once "../model/function.php" ;
$listRoom = roomlList();
?>

<div class = container>
  <table class = "table">
    <thead>
        <tr>
        <th>Id Room</th>
        <th>Room Number</th>
        <th>Pricei</th>
        <th>Personne</th>
        <th>Category</th>
        <th>Room State</th>
        <th>Hotel Id</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($listRoom as $room){ ?>
           <tr>
               <td><?= $room ['id_room'];?></td>
               
    <td><?= $room ['room_number'];?></td>
               
               <td><?= $room ['price'];?></td>
               
               <td><?= $room ['persons'];?></td>
               <td><?= $room ['category'];?></td>
               <td><?= $room ['room_state'];?></td>
               <td><?= $room ['hotel_id'];?></td>
               
         </tr>
        <?php } ?>
    </tbody>
    </table>
</div>





  <?php include_once "../inc/footer.php" ;


?>