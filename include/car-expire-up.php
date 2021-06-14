<?php
  
$future_timestamp = strtotime("+1 month");
$data = date('Y-m-d', $future_timestamp);
?>

<?php



$arr =['result'=>''];
if (isset($_POST['update_car'])) {
    $id_up_car = mysqli_real_escape_string($project,htmlspecialchars($_POST['id_car']));
    $user= $_SESSION['username'];
    $day=mysqli_real_escape_string($project,htmlspecialchars($_POST['add_day']));
    
    $future_timestamp = strtotime("$day");
    $data = date('Y-m-d', $future_timestamp);
    
    if($day == '15 day'){
        $stay_date = 15;
        
    }else if($day == '1 month'){
        $stay_date = 30;
    }else if($day == '2 month'){
        $stay_date = 60;
    }else if($day == '3 month'){
        $stay_date = 90;
    }else if($day == '1 year'){
        $stay_date = 364;
    }
    

        $q_id=mysqli_query($project , "SELECT * FROM `human` where `username` = '$user' ");

        $row=mysqli_num_rows($q_id);
        $row2 = mysqli_fetch_array($q_id);
        if($row != 0){
          
            $car_id= $row2['id'];
            $qu_up_car=mysqli_query($project,"UPDATE `car` SET  `car-ariving-date`= now(),`car-expire-date`='$data' where `id_car` = $id_up_car;");
            
            if($qu_up_car){
    $qury_price=mysqli_query($project,"SELECT * FROM `price_day` WHERE `Stay_day` = $stay_date ORDER BY `id` ASC LIMIT 1");

   while($row_price=mysqli_fetch_assoc($qury_price)){
$price= $row_price['price'];
$qury_plus=mysqli_query($project,"INSERT INTO `income`(`price`, `date`, `offer`) VALUES ($price,now(),'$day')");
if($qury_plus){
header("location:car-expire.php");
}else{
  echo"this prosecs hasnot sucessful";
}

}
}else{
   echo"this prosecs hasnot sucessful";
    }
    }//daxranaway else equal pass
  }


?>