<?php

session_start();
if(isset($_SESSION['username'])){
    
  include"include/config.php";
  include"include/car-up.php"; 
  
}else{
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/comandstyle.css" rel="stylesheet" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car-info</title>
</head>
<body>


  
<nav class="navbar navbar-expand-lg navbar-light bg-light m-3 raduis-10  navbar-default navbar-static-top">
  <div class="container-fluid">
  <a class="navbar-brand" href="main.php"><img src="./img/park.png" width="40px" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="main.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="car.php">Car</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="user.php">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="dahat.php">income</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="garage.php">garage</a>
        </li>
      </ul>
      <form class="d-flex" method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input class="form-control me-2" name="name2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="search" type="submit">Search</button>
      </form>
    </div>

  </div>
</nav>

<div class="container">
<div class="container raduis-10 bg-light radius-10 shadow-sm p-3">
<div class="row m-3 ">
<h1 class="text-center name-company text-dark raduis-10 p-lg-3" style="background-color: #FDD166 ;" id="Car-Update-Page" >Car Update page</h1>

<?php
include"include/car-search.php"; 

  $qury=mysqli_query($project , "SELECT * FROM `car` order by `id_car` desc ");
  
  if(mysqli_num_rows($qury) != 0){?>

<?php

if(isset($_GET['delete_id_update'])){
    $id_del_car=mysqli_real_escape_string($project,htmlspecialchars($_GET['delete_id_update']));
    $qury_del=mysqli_query($project,"DELETE  FROM `car` where `id_car` = $id_del_car");
    if($qury_del){
      header("location:car-update.php");
      }else{
        echo "this prosses is not successfull";
    }
}
?>


<?php 

while($row = mysqli_fetch_assoc($qury)){
  $qure=mysqli_query($project,"SELECT * FROM `human` where `id` = (SELECT `id_user` From `car` where `id_car`= $row[id_car])");
  $row3=mysqli_fetch_assoc($qure);
    ?>

<div class="text-center raduis-10 card m-2 border-0 p-3 shadow-sm <?php if($row['car-expire-date']<=date("Y-m-d")){echo 'bg-danger text-light';}else{echo 'bg-light';}?> " style="width: 18rem;">

<img src="img/brand/<?php
if($row['car-company-model']=='NISSAN'||$row['car-company-model']=='Nissan'||$row['car-company-model']=='nissan'){
  echo 'nissan.png';
}elseif($row['car-company-model']=='Bmw'||$row['car-company-model']=='bmw'||$row['car-company-model']=='BMW'){
  echo 'bmw-logo.png';
}elseif($row['car-company-model']=='chevrolet'||$row['car-company-model']=='Chevrolet'||$row['car-company-model']=='CHEVROLET'){
  echo 'Chevrolet.png';
}elseif($row['car-company-model']=='dodge'||$row['car-company-model']=='Dodge'||$row['car-company-model']=='DODGE'){
    echo 'Dodge.png';
}elseif($row['car-company-model']=='ford'||$row['car-company-model']=='Ford'||$row['car-company-model']=='FORD'){
    echo 'ford.png';
}elseif($row['car-company-model']=='Hyundai'||$row['car-company-model']=='hyundai'||$row['car-company-model']=='HYUNDAI'){
    echo 'Hyundai.png';

}elseif($row['car-company-model']=='JEEP'||$row['car-company-model']=='Jeep'||$row['car-company-model']=='jeep'){
    echo 'Jeep.png';
  }elseif($row['car-company-model']=='kia'||$row['car-company-model']=='Kia'||$row['car-company-model']=='KIA'){
    echo 'Kia.png';
  }elseif($row['car-company-model']=='Lexus'||$row['car-company-model']=='lexus'||$row['car-company-model']=='LEXUS'){
    echo 'Lexus.png';
  }elseif($row['car-company-model']=='Mazda'||$row['car-company-model']=='mazda'||$row['car-company-model']=='MAZDA'){
    echo 'Mazda.png';
  }elseif($row['car-company-model']=='Mercedes'||$row['car-company-model']=='MERCEDES'||$row['car-company-model']=='Mercedes-Benz'||$row['car-company-model']=='Mercedes-Benz'||$row['car-company-model']=='MERCEDES-BENZ'){
    echo 'Mercedes-Benz.png';
  }elseif($row['car-company-model']=='Mitsubishi'||$row['car-company-model']=='mitsubishi'||$row['car-company-model']=='MITSUBISHI'){
    echo 'Mitsubishi.png';
  }elseif($row['car-company-model']=='TOYOTA'||$row['car-company-model']=='Toyota'||$row['car-company-model']=='toyota'){
    echo 'toyota.png';
  }elseif($row['car-company-model']=='OPEL'||$row['car-company-model']=='Opel'||$row['car-company-model']=='opel'){
    echo 'Opel.png';
  }elseif($row['car-company-model']=='Peugeot'||$row['car-company-model']=='peugeot'||$row['car-company-model']=='PEUGEOT'){
    echo 'Peugeot.png';
  }elseif($row['car-company-model']=='VOLKSWAGEN'||$row['car-company-model']=='Volkswagen'||$row['car-company-model']=='volkswagen'){
    echo 'Volkswagen.png';
  }elseif($row['car-company-model']=='volvo'||$row['car-company-model']=='Volvo'||$row['car-company-model']=='VOLVO'){
    echo 'volvo.png';
  }elseif($row['car-company-model']=='AUDI'||$row['car-company-model']=='Audi'||$row['car-company-model']=='audi'){
    echo 'audi.png';
  }else{
    echo 'car.jpg';
  }
?>" class="w-100">

<h3 class="card-title "><?php echo $row['car-company-model'];?> <h5><?php echo $row['car-model'];?></h5></h3>

<p class="card-text">Car Number =' <?php echo $row['car-num'];?> '</p>
<p class="card-text">Car City =' <?php echo $row['car-city'];?> '</p>
<p class="card-text">Car Type =' <?php echo $row['car-type'];?> '</p>
<p class="card-text">Car Color =' <?php echo $row['car-color'];?> '</p>
<p class="card-text">Car start-date =' <?php echo $row['car-ariving-date'];?> '</p>
<p class="card-text">the expire date =' <?php echo $row['car-expire-date'];?> '</p>
<p class="card-text">Offer =' <?php if($row['Stay_day'] == 15){echo "15 day";}else if($row['Stay_day'] == 30){echo "1 mounth";}
else if($row['Stay_day'] == 60){echo "2 mounth";}else if($row['Stay_day'] == 90){echo "3 mounth";}else if($row['Stay_day'] == 364){echo "1 year";} ?> '</p>
<p class="card-text">user =' <?php echo $row3['username'] ?>'</p>
<div class="row">
<div class="col-6">
<a href="car-update.php?delete_id_update=<?php echo $row['id_car']?>" width="10px" data-bs-target="#post<?php echo $row['id_car']?>">
<img src="./img/remove.svg" width="40px" >
</a>
</div>
<div class="col-6">
<a data-bs-toggle="modal"  width="10px" data-bs-target="#post<?php echo $row['id_car']?>">
<img src="./img/pencil.svg" width="40px" >
</a>
</div>

</div>
</div>
<!-- Modal -->
<div class="modal fade" id="post<?php echo $row['id_car']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
<?php
     $qure=mysqli_query($project,"SELECT * FROM `human` where `id` = (SELECT `id_user` From `car` where `id_car`= $row[id_car])");
     $row3=mysqli_fetch_assoc($qure);
 ?>
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <input type="text" value="<?php echo $row['id_car'];?>"  name="id_car" hidden  style="    color: #FE4F75;" >
            </div>
            <div class="form-group">
                <P class="text-center text-label-login">Company</P>
                <select name="car-company-model" class=" text-center browser-default form-control text-center form-control2 custom-select">
            <option selected value="<?php echo $row['car-company-model'] ?>"><?php echo $row['car-company-model'] ?></option>
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
            <P class="text-center text-label-login">Model</P>
                <input type="text" required value="<?php echo $row['car-model'];?>" name="car-model" require  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Number</P>
                <input type="number" required value="<?php echo $row['car-num'];?>" name="up_car_number" pattern="[0-9]{11}" title="please insert a correct data"  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">City</P>
            <select name="up_car_city" class="browser-default form-control text-center form-control2 custom-select">
            <option  selected value="<?php echo $row['car-city'] ?>"><?php echo $row['car-city'] ?></option>
        <option value="Sulimanyah">Sulimanyah</option>
        <option value="Halabja">Halabja</option>
        <option value="Arbil">Arbil</option>
        <option value="Karkuk">Karkuk</option>
        <option value="Duhok">Duhok</option>
        <option value="Other">Other</option>
      </select>

            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Car Type</P>
            <select name="car_type" class="browser-default form-control text-center form-control2 custom-select">
            <option  disabled selected value="<?php echo $row['car-type'] ?>"><?php echo $row['car-type'] ?></option>
        <option value="Personal">Personal</option>
        <option value="Pickup">Pickup</option>
        <option value="Taxi">Taxi</option>
        <option value="other">other..</option>
      </select>
            </div>
            <div class="form-group">
            <P class="text-center text-label-login" >Color</P>
                <input type="text" required value="<?php echo $row['car-color'];?>" name="up_car_color"   class="form-control form-control2">
            </div>
           <button  class="btn  btn-primary btn-lg  mt-2 w-28 p-2" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="update_car" class="btn btn-warning btn-lg p-2 mt-2 w-28" value="Update">
           </form>    
      </div>
    </div>
  </div>
</div>
<?php
}
?>

</div>
</div>
  <?php }else{?>
    <div class="col-lg-6 col-sm-12 mx-auto ">
    <div class="card rad raduis-10" >
    <img class="card-img-top raduis-10   mx-auto " src="img/no-data.jpg" alt="Card image cap">
    </div>
    </div>
  <?php }exit();
  ?>
  </div>
  
</body>
</html>