<?php
include"include/config.php"
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forget_Password</title>
</head>
<body>
    
<div class="container ">




  <div class="row content raduis-10">

  <div class="col-12   mb-lg-5">
          <h1 class="text-center name-company raduis-10">Car Park System</h1>
      </div>
  <div class="col-md-6 mb-3">
          <img src="img/forget-pass.jpg" class="img-fluid">
      </div>
      <div class="col-md-6  mt-3">
      <h1 class="text-center name-company raduis-10 p-lg-3" style="background-color: #FE4F75 ;" id="forget-page-title" >Forget Password</h1>
      <form action="forgetpass.php" method="POST">
            <div class="form-group">
                <P class="text-center text-label-login">Email</P>
                <input type="email" name="email"  class="form-control" style="    color: #FE4F75;">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Phon-number</P>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">New-Password</P>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login" >Confirem-Password</P>
                <input type="password" name="confirem-password" class="form-control">
            </div>
           
<div class="row">
<div class="col-6">
<button type="submit" class="btn btn-class d-flex  mt-4   m-auto  raduis-10 " style="background-color: #FE4F75 ; border: #FE4F75 solid;" name="Back" >Back</button>
</div>
<div class="col-6">
<button type="submit" class="btn btn-class d-flex  mt-4   m-auto  raduis-10 bg-success " style=" border: #198754 solid;" name="submit" >Submit</button>
</div>
</div>
               
        </form>
      </div>
  </div>
    
</div>



<?php


if (isset($_POST['submit'])) {
    $email=mysqli_real_escape_string($project,htmlspecialchars($_POST['email']));
    $phone=mysqli_real_escape_string($project,htmlspecialchars($_POST['phone']));
    $pass=mysqli_real_escape_string($project,htmlspecialchars($_POST['password']));
$con_pass=mysqli_real_escape_string($project,htmlspecialchars($_POST['confirem-password']));
$arr=['result'=>''];

$result_db = mysqli_query($project,"SELECT * FROM `human` WHERE `email` = '$email' AND `phone_number` ='$phone'") ;
$row = mysqli_fetch_array($result_db);
    
if (empty($pass) || empty($email) || empty($phone) || empty($con_pass)) {
    $arr=['result'=>'Please fill the cells'];?>
    <script>document.getElementById("forget-page-title").innerHTML="<?php echo $arr['result']?>" </script>
   <?php }else{

   
if( $pass != $con_pass){
    $arr=['result'=>'Please confirm your password is not correct'];?>
    <script>document.getElementById("forget-page-title").innerHTML="<?php echo $arr['result']?>" </script>


   <?php }else{
       $qurey=mysqli_query($project,"UPDATE `human` SET `password`='$pass' WHERE `email`='$email' AND `phone_number`='$phone'");
       if($row){
        if ($qurey) {
            $arr=['result'=>'This Password has Update']; 
            }else{
            $arr=['result'=>'data has not update'];?>
            <script>document.getElementById("forget-page-title").innerHTML="<?php echo $arr['result']?>" </script>
            
            
            <?php }
       
}else{
    $arr=['result'=>'email and phone number is not correct'];?>
<script>document.getElementById("forget-page-title").innerHTML="<?php echo $arr['result']?>" </script>


   }
<?php 
    }
} 
}
} 
 
if(isset($_POST['Back'])){
    header('location:index.php');
}
?>
    

    
</body>
</html>