<?php

if(isset($_POST['update'])){
    $id_up = mysqli_real_escape_string($project,htmlspecialchars($_POST['id']));
    $nameup=mysqli_real_escape_string($project,htmlspecialchars($_POST['up_name']));
    $age_up=mysqli_real_escape_string($project,htmlspecialchars($_POST['age']));
    $phone_up=mysqli_real_escape_string($project,htmlspecialchars($_POST['phone']));
    $email_up=mysqli_real_escape_string($project,htmlspecialchars($_POST['email']));
    $location_up=mysqli_real_escape_string($project,htmlspecialchars($_POST['location']));
    $gender_up=mysqli_real_escape_string($project,htmlspecialchars($_POST['gender']));

    
    $up = mysqli_query($project,"UPDATE `human` SET `names`='$nameup' , `age`= $age_up, `phone_number`='$phone_up' , `email`= '$email_up' , `location`='$location_up' , `gender`='$gender_up'  where `id` = $id_up;");
  if($up){
  header("location:user-update.php");
  }elseif(!$up){
  echo "update hasnot success full";
  }
  }


?>