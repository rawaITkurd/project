<?php 

session_start();
if(isset($_SESSION['username'])){
    
    include"include/navbar.inc.php";
}else{
  header("location:index.php");
}

?>


<?php

$arr =['result'=>''];
if (isset($_POST['submit'])) {
    $name=mysqli_real_escape_string($project,htmlspecialchars($_POST['name']));
    $age=mysqli_real_escape_string($project,htmlspecialchars($_POST['age']));
    $location_user=mysqli_real_escape_string($project,htmlspecialchars($_POST['location']));
    $phone=mysqli_real_escape_string($project,htmlspecialchars($_POST['phone']));
    $email=mysqli_real_escape_string($project,htmlspecialchars($_POST['email']));
    $user=mysqli_real_escape_string($project,htmlspecialchars($_POST['user']));
    $gender=mysqli_real_escape_string($project,htmlspecialchars($_POST['gender']));
    $pass=mysqli_real_escape_string($project,htmlspecialchars($_POST['pass-add']));
    $con_pass=mysqli_real_escape_string($project,htmlspecialchars($_POST['con-pass']));
 
    




if(empty($name)||empty($age)||$location_user == "null"||empty($phone)||empty($email)||empty($user)||empty($pass)||empty($con_pass)||$gender=="null"){
 
    $arr['result']="Please fill the cells";

  }/*daxranaway if empty*/else{

    if($pass != $con_pass){
        $arr['result']="Please you need to the insert the same password ";
    }/*daxranaway if equal pass*/else{
        $qury1=mysqli_query($project,"SELECT * FROM `human` WHERE `username`='$user'");
        $qury2=mysqli_query($project,"SELECT * FROM `human` WHERE `email`='$email'");
        $qury3=mysqli_query($project,"SELECT * FROM `human` WHERE `phone_number`='$phone'");
        $row1=mysqli_num_rows($qury1);
        $row2=mysqli_num_rows($qury2);
        $row3=mysqli_num_rows($qury3);
        if($row1 != 0){
        $arr['result']="Username is used before, please try again";
        }elseif($row2 != 0){
        $arr['result']="Email is used before";
        }elseif($row3 != 0){
        $arr['result']="Phone number is used before";
        }else{

$qwrey= mysqli_query($project,"INSERT INTO `human` (`names`, `age`, `location`, `gender` , `phone_number`, `email`, `username`, `password`) values('$name',$age,'$location_user','$gender','$phone','$email','$user','$pass') ");
        if($qwrey){
            $arr['result']="user has added";
        }else{


    
            $arr['result']="user has'not added Please refresh the web and try again "; 
        }

    }
    }//daxranaway else equal pass

}//daxranaway else empty


}//daxranaway if saraky



?>




<!DOCTYPE html>
<html lang="en">
<head>
  
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add-User</title>
</head>
<body>

    <div class="container">
    <div class="row content raduis-10">
    
  <div class="col-12   mb-lg-5">
          <h1 class="text-center name-company raduis-10">Car Park System</h1>
      </div>
    <div class="col-lg-6 col-sm-12 mt-lg-5 pt-lg-5">
    <img src="img/Add-User.png"  style="width: 100%;">
    </div>


    <div class="col-lg-6 col-sm-12">
  <h1 class="text-center name-company raduis-10 p-lg-3" style="background-color: #007DFE ;" id="add-user-page-title" >Add User</h1>
      <form action="add-user.php" method="POST">
            <div class="form-group">
                <P class="text-center text-label-login">Name</P>
                <input type="text" name="name" pattern="[A-Za-z ]{1,150}" title="You can only enter 150 letters for correct name"  class="form-control form-control2" style="    color: #FE4F75;">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Age</P>
                <input type="number" name="age" pattern="[0-9]{2}" title="Insert a correct age"  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login" >Location</P>
            <select name="location" class="browser-default form-control text-center form-control2 custom-select">
        <option value="null" selected>Choose your city</option>
        <option value="Sulimanyah">Sulimanyah</option>
        <option value="Halabja">Halabja</option>
        <option value="Penjwen">Penjwen</option>
        <option value="Arbat">Arbat</option>
        <option value="Saidsadq">Saidsadq</option>
        <option value="Kalar">Kalar</option>
        <option value="Arbil">Arbil</option>
        <option value="Karkuk">Karkuk</option>
        <option value="Duhok">Duhok</option>
        <option value="Other">Other</option>
      </select>
            </div>
            <div class="form-group">
            <P class="text-center text-label-login" >Gender</P>
            <select name="gender" class="browser-default form-control text-center form-control2 custom-select">
            <option value="null" selected>Choose your Gender</option>
        <option value="male" value="male">Male</option>
        <option value="female">Female</option>
      </select>
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Phone_Number</P>
                <input type="text" name="phone" pattern="[0-9]{11}" title="Choose a correct number"  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Email</P>
                <input type="text" name="email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please insert a correct data"   class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">UserName</P>
                <input type="text" name="user" pattern="[A-Za-z0-9._]{5,11}" title="Please insert a correct data"  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Password</P>
                <input type="password" name="pass-add" pattern="[A-Za-z0-9._]{6,12}" title="Need your password more than six number and less than twelve number" class="form-control2 form-control">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Confirm Password</P>
                <input type="password" name="con-pass" pattern="[A-Za-z0-9._]{6,12}" title="Need your password more than six number and less than twelve number" class="form-control2 form-control">
            </div>
           

                <button type="submit" class="btn btn-class bg-success d-flex  mt-4  m-auto  raduis-10 w-50" style="border: #198754 solid;" name="submit" ><h3 style="margin:auto ">Submit</h3></button>
      </form>     
    </div>
    </div>
    </div>
<?php if(isset($_POST['submit'])){?>
<script>
document.getElementById("add-user-page-title").innerHTML="<?php echo $arr['result']?>";
</script>
<?php } ?>


</body>
</html>