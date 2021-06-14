
<?php
if(isset($_POST['update_car'])){
  $arr =['result'=>''];
    if(empty($up_car_number) || empty($up_car_color) || empty($up_car_username)){
      $arr =['result'=>'Please fill the cells'];
    }
    $id_up_car = mysqli_real_escape_string($project,htmlspecialchars($_POST['id_car']));
    $up_car_number = mysqli_real_escape_string($project,htmlspecialchars($_POST['up_car_number']));
    $up_car_company_model=mysqli_real_escape_string($project,htmlspecialchars($_POST['car-company-model']));
    $up_car_model=mysqli_real_escape_string($project,htmlspecialchars($_POST['car-model']));
    $up_car_city=mysqli_real_escape_string($project,htmlspecialchars($_POST['up_car_city']));
    $up_car_color=mysqli_real_escape_string($project,htmlspecialchars($_POST['up_car_color']));
    $type=mysqli_real_escape_string($project,htmlspecialchars($_POST['car_type']));
    $user_name =$_SESSION['username'];
  $user_id=mysqli_query($project,"SELECT `id` FROM `human` where `username`='$user_name'");
   $row_username=mysqli_fetch_assoc($user_id);
     $a=$row_username['id'];
    if(empty($up_car_color) || empty($up_car_number) ){
      $arr =['result'=>'Please fill the cells'];?>
<script>document.getElementById("Car-Update-Page").innerHTML="<?php echo $arr['result']?>" </script>
 
  
  
  <?php
    }else{

    $up_id_user=$row_q_car['id'];
    $up = mysqli_query($project,"UPDATE `car` SET `car-num`=$up_car_number , `car-city`= '$up_car_city', `car-color`='$up_car_color' , `car-company-model`='$up_car_company_model' , `car-model`='$up_car_model', `car-type`='$type' , `id_user`= $a   where `id_car` = $id_up_car;");
  if($up){
  header("location:car-update.php");
  }elseif(!$up){
  echo "Update has'not success full";
  }
}
}

?>