
<?php

$Q_2=mysqli_query($project,"SELECT * FROM `car_katy`");
$future_timestamp = strtotime('+1 hour');
$time = date("H:i:s",$future_timestamp); 


if(isset($_GET['add_car_katy'])){
  $user_name =$_SESSION['username'];
  $user_id=mysqli_query($project,"SELECT `id` FROM `human` where `username`='$user_name'");
$row_username=mysqli_fetch_assoc($user_id);
$a=$row_username['id'];
  $car_number=mysqli_real_escape_string($project,htmlspecialchars($_GET['car-number']));
  $city=mysqli_real_escape_string($project,htmlspecialchars($_GET['car_city']));
  $type=mysqli_real_escape_string($project,htmlspecialchars($_GET['car_type']));
  $add=mysqli_query($project,"INSERT INTO `car_katy`(`car_number`, `city`, `car_type`, `id_user`) VALUES ($car_number,'$city','$type',$a)")+ mysqli_query($project,"INSERT INTO `history`(`car_number`, `city`, `car_type`, `id_user`) VALUES ($car_number,'$city','$type',$a)");
if($add){
  header("location:main.php");
}
else{
  ?>
  <script>
  alert("This car has arriving here")
  </script>
  <?php
}

}


  if(isset($_POST['sure_delete'])){
  
  $id_del_car_katy=mysqli_real_escape_string($project,htmlspecialchars($_POST['id']));
  $add3=mysqli_query($project,"UPDATE `history` SET `exit_time`= '$time'
   where `ariving_time`= (SELECT `ariving_time` from `car_katy` where `id`= $id_del_car_katy)
   AND `car_number`= (SELECT `car_number` from `car_katy` where `id`= $id_del_car_katy)
   AND `city`=(SELECT `city` from `car_katy` WHERE `id`= $id_del_car_katy)
   AND `car_type`= (SELECT `car_type` from `car_katy` where `id`= $id_del_car_katy)
   AND `date`=(SELECT `date` FROM `car_katy` WHERE `id`=$id_del_car_katy)");
  if($add3){

    $qury_up_anjam=mysqli_query($project,"UPDATE `history` set `Remains` = (SELECT TIMEDIFF(`exit_time`,`ariving_time`) FROM `history` where `ariving_time`= (SELECT `ariving_time` from `car_katy` where `id`= $id_del_car_katy)
    AND `car_number`= (SELECT `car_number` from `car_katy` where `id`= $id_del_car_katy)
    AND `city`=(SELECT `city` from `car_katy` WHERE `id`= $id_del_car_katy)
    AND `car_type`= (SELECT `car_type` from `car_katy` where `id`= $id_del_car_katy)
    AND `date`=(SELECT `date` FROM `car_katy` WHERE `id`=$id_del_car_katy))
    where `ariving_time`= (SELECT `ariving_time` from `car_katy` where `id`= $id_del_car_katy)
    AND `car_number`= (SELECT `car_number` from `car_katy` where `id`= $id_del_car_katy)
    AND `city`=(SELECT `city` from `car_katy` WHERE `id`= $id_del_car_katy)
    AND `car_type`= (SELECT `car_type` from `car_katy` where `id`= $id_del_car_katy)
    and `date`=(SELECT `date` FROM `car_katy` WHERE `id`=$id_del_car_katy)");

if($qury_up_anjam){
$qury_price=mysqli_query($project,"SELECT * FROM `price` WHERE `time` > (SELECT `Remains` FROM `history`
 WHERE `ariving_time`= (SELECT `ariving_time` from `car_katy` where `id`= $id_del_car_katy)
AND `car_number`= (SELECT `car_number` from `car_katy` where `id`= $id_del_car_katy)
AND `car_type`= (SELECT `car_type` from `car_katy` where `id`= $id_del_car_katy)
and `date`=(SELECT `date` FROM `car_katy` WHERE `id`=$id_del_car_katy)
AND `city`=(SELECT `city` from `car_katy` WHERE `id`= $id_del_car_katy)
)ORDER BY `id` ASC LIMIT 1");

  while($row_price=mysqli_fetch_assoc($qury_price)){
  $price= $row_price['price'];
  $qury_plus=mysqli_query($project,"INSERT INTO `income`(`price`, `date`, `Remains`,`offer`) VALUES ($price,now(),(SELECT `Remains` from `history`
     WHERE `car_number`=(SELECT `car_number` from `car_katy` WHERE `id`= $id_del_car_katy) AND
     `city`=(SELECT `city` from `car_katy` WHERE `id`= $id_del_car_katy) AND
     `car_type`=(SELECT `car_type` from `car_katy` WHERE `id`= $id_del_car_katy)AND
     `ariving_time`=(SELECT `ariving_time` from `car_katy` WHERE `id`= $id_del_car_katy)AND 
     `date`= (SELECT `date` from `car_katy` where `id`= $id_del_car_katy)
     ),'daily')");
     
       if($qury_plus){
  $qury_del=mysqli_query($project,"DELETE  FROM `car_katy` where `id` = $id_del_car_katy");
     if($qury_del){
      header("location:main.php");
    }else{
      echo "this prosses is not successfull";
  }
    }else{
      echo "this prosses is not successfull";
  }
}
}
else{
  echo "this prosses is not successfull";
}
}
}


?>