<?php 

session_start();
if(isset($_SESSION['username'])){
    include"include/navbar.inc.php";
    
}else{
  header("location:index.php");
}

$arr =['result'=>''];
if (isset($_POST['submit'])) {
    $num=mysqli_real_escape_string($project,htmlspecialchars($_POST['car-num']));
    $color=mysqli_real_escape_string($project,htmlspecialchars($_POST['car-color']));
    $model=mysqli_real_escape_string($project,htmlspecialchars($_POST['car-model']));
    $company=mysqli_real_escape_string($project,htmlspecialchars($_POST['car-company-model']));
    $city=mysqli_real_escape_string($project,htmlspecialchars($_POST['car-city']));
    $type=mysqli_real_escape_string($project,htmlspecialchars($_POST['car_type']));
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
    
    if(empty($num)||empty($color)||empty($model)||empty($user)|| $company == "null" ||$city == "null"||$type == "null"){
        
        $arr['result']="Please fill the cells";
        
    }/*daxranaway if empty*/else{
        $q_id=mysqli_query($project , "SELECT * FROM `human` where `username` = '$user' ");
        $row=mysqli_num_rows($q_id);
        $row2 = mysqli_fetch_array($q_id);
        if($row != 0){
            $user_id= $row2['id'];
            $qu_add_car=mysqli_query($project,"INSERT INTO `car`(`car-num`,`car-city`,`car-type`,`car-color`,`car-company-model`,`car-model`,`car-expire-date`,`Stay_day`,`id_user`)values($num,'$city','$type','$color','$company','$model','$data',$stay_date,$user_id)");
            
            if($qu_add_car){
    $qury_price=mysqli_query($project,"SELECT * FROM `price_day` WHERE `Stay_day` = ($stay_date)");

   while($row_price=mysqli_fetch_assoc($qury_price)){
$price= $row_price['price'];
$qury_plus=mysqli_query($project,"INSERT INTO `income`(`price`, `date`, `offer`) VALUES ($price,now(),'$day')");
if($qury_plus){
    $arr['result']="Car has added";
}else{
    $arr['result']="This process has not sucsessful";
}

}
}else{
    $arr['result']="This process has not sucsessful";
}
    }
  }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
  
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add-Car</title>
</head>
<body>

    <div class="container">
    <div class="row content raduis-10">
    
  <div class="col-12   mb-lg-5">
          <h1 class="text-center name-company raduis-10">Car Park System</h1>
      </div>
    <div class="col-lg-6 col-sm-12 mb-2 ">
    <img src="img/add-car-page.png"  style="width: 100%;">
    </div>


    <div class="col-lg-6 col-sm-12">
  <h1 class="text-center name-company text-dark raduis-10 p-lg-3" style="background-color: #FDD166 ;" id="add-user-page-title" >Add New Car</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
            <P class="text-center text-label-login" >Car Company</P>
            <select name="car-company-model" class=" text-center browser-default form-control text-center form-control2 custom-select">
            <option  value="null" selected>Company name</option>
        <option value="Nissan">Nissan</option>
        <option value="Bmw">Bmw</option>
        <option value="Chevrolet">Chevrolet</option>
        <option value="Dodge">Dodge</option>
        <option value="Ford">Ford</option>
        <option value="‌‌‌Hyundai">‌‌‌Hyundai</option>
        <option value="Jeep">Jeep</option>
        <option value="Kia">Kia</option>
        <option value="Lexus">Lexus</option>
        <option value="Mazda">Mazda</option>
        <option value="Mercedes">Mercedes</option>
        <option value="Mitsubishi">Mitsubishi</option>
        <option value="Toyota">Toyota</option>
        <option value="Opel">Opel</option>
        <option value="Peugeot">Peugeot</option>
        <option value="Volkswagen">Volkswagen</option>
        <option value="Volvo">Volvo</option>
        <option value="Audi">Audi</option>

      </select>
            </div>
            <div class="form-group">
            <P class="text-center text-label-login" >Car Model</P>
                <input type="text" name="car-model"  require  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Car City</P>
            <select name="car-city"  class="browser-default form-control text-center form-control2 custom-select">
            <option value="null"  selected >Choose the city</option>
        <option value="Sulimanyah">Sulimanyah</option>
        <option value="Halabja">Halabja</option>
        <option value="Arbil">Arbil</option>
        <option value="Karkuk">Karkuk</option>
        <option value="Duhok">Duhok</option>
      </select>

            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Car Number</P>
                <input type="text" name="car-num" pattern="[0-9]{0,6}" title="Please insert a correct car number"  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Car Type</P>
            <select name="car_type" class="browser-default form-control text-center form-control2 custom-select">
            <option  disabled selected value="null">Type of Car</option>
        <option value="Personal">Personal</option>
        <option value="Pickup">Pickup</option>
        <option value="Taxi">Taxi</option>
        <option value="other">other..</option>
      </select>
            </div>
            <div class="form-group">
            <P class="text-center text-label-login" >Car Color</P>
                <input type="text" name="car-color" pattern="[A-Za-z]{2,15}"  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Add day</P>
            <select name="add_day" class="browser-default form-control text-center form-control2 custom-select">
            <option  selected value="null">Select offers</option>
        <option value="15 day">15 day</option>
        <option value="1 month">1 month</option>
        <option value="2 month">2 month</option>
        <option value="3 month">3 month</option>
        <option value="1 year">1 year</option>
      </select>

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