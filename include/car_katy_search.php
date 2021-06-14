<?php

if(isset($_GET['search'])){
  $data=mysqli_real_escape_string($project,htmlspecialchars($_GET['text']));


  $qury=mysqli_query($project , "SELECT * FROM `car_katy` WHERE `car_number` = '$data'  ");
  if(mysqli_num_rows($qury) != 0){?>


<?php 
while($row = mysqli_fetch_assoc($qury)){?>
<tbody>
    <tr >
      <th scope="row" ><?php echo $count++  ?> </th>
      <td><?php echo $row['car_number']; ?></td>
      <td><?php echo $row['city']; ?></td>
      <td><?php echo $row['car_type']; ?></td>
      <td><?php echo $row['ariving_time']; ?></td>
      <td><a width="10px" data-bs-toggle="modal" data-bs-target="#post<?php echo $row['id']?>">
      <img src="./img/remove.svg" width="40px" >
          </a>
      </td>
    </tr>
  </tbody>
<?php
}
?>
</div>
</div>
  <?php }else{
    echo "<h4 class='p-4 text-center text-light m-auto container bg-danger'>Have not any data</h4>";
  }exit();
  }
?>