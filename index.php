<?php

include"include/config.php";

session_start();



 $arr =['result'=>''];

if(isset($_POST['submit'])){
    $user =mysqli_real_escape_string($project,htmlspecialchars($_POST['user'])) ;
    $pass =mysqli_real_escape_string($project,htmlspecialchars($_POST['password']));
    
    $result_db = mysqli_query($project,"SELECT * FROM `human` WHERE `username` = '$user' AND `password` ='$pass'");
    $row = mysqli_fetch_array($result_db);
$x=mysqli_num_rows($result_db);

    if(empty($user)||empty($pass)){
        $arr['result']="Please fill the cells";
    }else if($x==0){
$arr['result']="User name or password incorrect";
}else{
if ($row['username'] == $user && $row['password'] == $pass ) {
    $_SESSION['username']=$user;
    header("location:main.php");

    }
}
  
}




?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>login-page</title>
   
</head>
<body >
<div class="container">

  <div class="row content raduis-10">
      <div class="col-12   mb-lg-5">
          <h1 class="text-center name-company raduis-10">Car Park System</h1>
      </div>
      <div class="col-md-6 mb-3">
          <img src="img/login-back.jpg" class="img-fluid" width="750px">
      </div>
      <div class="col-md-6">
      <h1 class="signin-text mb-lg-3 mt-lg-2 text-center name-company raduis-10 " id="login-car-Page">Login</h1> 
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div class="form-group">
            
                <P class="text-center text-label-login">User Name</P>
                <input type="text" name="user"  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Password</P>
                <input type="password" name="password" class="form-control form-control2 ">
            </div>
           

                <button type="submit" class="btn btn-class d-flex  mt-4   m-auto  raduis-10 " name="submit"  >Login</button>
               
        </form>
        
       <p class="text-center  my-3 a-login-page"> <a href="forgetpass.php" >forget password? click here</a></p>
      </div>
  </div>  
</di>





</div>






<div>
            <?php if(isset($_POST['submit'])){
                if(empty($user) || empty($pass)){?>

        <script>document.getElementById ("login-car-Page").innerHTML="<?php echo $arr['result']?>" </script>


        <?php }else if ($x==0) {?>

<script>document.getElementById("login-car-Page").innerHTML="<?php echo $arr['result']?>" </script>


<?php }}?>

            </div>










</body>

</html>