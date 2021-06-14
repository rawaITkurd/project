<?php

session_start();
if(isset($_SESSION['username'])){
  
  include"include/nav-main.inc.php";
  include"include/insert-car-katy.php";
  
}else{
  header("location:index.php");
}



?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>home</title>
   
</head>
<body>

  <div class="container">
  
    <div class="row">
<div class="col-6 col-lg-3 ">
<div class="card m-1 rad raduis-10" >
      <a href="dahat.php" style="text-decoration: none;">
  <img class="card-img-top raduis-10" src="img/dahat.jpg" alt="Card image cap">
  <div class="card-body ">
    <h5 class="card-title text-center raduis-10 name-company">Income</h5>
    <div class="d-flex ">
      </a>
    </div>
  </div>
</div>
</div>
<div class="col-6 col-lg-3 ">
<div class="card m-1 rad raduis-10" >
      <a href="garage.php" style="text-decoration: none;">
  <img class="card-img-top raduis-10" src="img/garage.jpg" alt="Card image cap">
  <div class="card-body ">
    <h5 class="card-title text-center raduis-10 name-company">Garage</h5>
    <div class="d-flex ">
      </a>
    </div>
  </div>
</div>
</div>
<div class="col-6 col-lg-3 ">
<div class="card m-1 rad raduis-10" >
      <a href="car.php"  style="text-decoration: none;">
  <img class="card-img-top raduis-10" src="img/car.jpg" alt="Card image cap">
  <div class="card-body ">
    <h5 class="card-title text-center raduis-10 name-company">Car</h5>
    <div class="d-flex ">
      </a>
    </div>
  </div>
</div>
</div>
<div class="col-6 col-lg-3 ">
<div class="card m-1 rad raduis-10" >
      <a href="./user.php"  style="text-decoration: none;">
  <img class="card-img-top raduis-10" src="img/user.jpg" alt="Card image cap">
  <div class="card-body ">
    <h5 class="card-title text-center raduis-10 name-company" >User</h5>
    <div class="d-flex ">
      </a>
    </div>
  </div>
</div>
</div>
</div>


<div class="container">
<div class="container">
<div class="row">
<div class="col-12 bg-light raduis-10 mt-2">

<!--ama model bo add krdn -->
<div class="modal fade" id="post" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <div class="form-group">
            <P class="text-center text-label-login">Car Plate Number</P>
                <input type="number"   name="car-number"  class="form-control form-control2" >
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Car City</P>
            <select name="car_city"  class="browser-default form-control text-center form-control2 custom-select">
            <option value="null"  selected >Choose the city</option>
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
            <option  disabled selected value="null">Type of Car</option>
        <option value="Personal">Personal</option>
        <option value="Pickup">Pickup</option>
        <option value="Taxi">Taxi</option>
        <option value="other">other..</option>
      </select>
            </div>
           <button  class="btn  btn-primary btn-lg  mt-2 w-28 p-2" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="add_car_katy" class="btn btn-success text-light btn-lg p-2 mt-2 w-28" value="Add">
           </form>    
     
      </div>
    </div>
  </div>
</div>

<!--ama model bo search krdn -->
<div class="modal fade" id="search" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">search car</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
      <div class="form-group">
            <P class="text-center text-label-login">Car Plate Number</P>
                <input type="number"   name="text"  class="form-control form-control2" >
            </div>
           <button  class="btn  btn-primary btn-lg  mt-2 w-28 p-2" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="search" class="btn btn-success text-light btn-lg p-2 mt-2 w-28" value="search">
           </form>    
     
      </div>
    </div>
  </div>
</div>




<div class="table-responsive">
<table class="table table-hover table-responsive-sm">
<div class="row">
  <div class="col-12">
  <h1 class="card-title text-center justify-content-center raduis-10  name-company">Cars in garage</h1>
  </div>
  </div>
  <div class="row">
  <div class="col-lg-4 m-1 col-sm-12 justify-content-center">
  <a data-bs-toggle="modal" class="btn btn-warning text-dark text-center w-100"   data-bs-target="#post">
  <h5>Add Car</h5>
  </a>
  </div>
  <div class="col-lg-4 m-1 col-sm-12 justify-content-center">
  <a href="main.php" class="btn btn-success text-light justify-content-center w-100" >
  <h5>Refresh</h5>
  </a>
  </div>
  <div class="col-lg-3 m-1 col-sm-12 justify-content-center">
  <a data-bs-toggle="modal" class="btn btn-warning text-dark justify-content-center w-100"   data-bs-target="#search">
  <h5>Search</h5>
  </a>
  </div>

  </div>



  <thead>
    <tr>
      <th scope="col">Count</th>
      <th scope="col">Car number</th>
      <th scope="col">City</th>
      <th scope="col">Type</th>
      <th scope="col">Arriving-time</th>
      <th scope="col">User</th>
      <th scope="col">Exit_car</th>
    </tr>
  </thead>
<?php
while($row=mysqli_fetch_assoc($Q_2)){
  static $count=1;
  ?>
  
  <!--ama model bo dllniai -->
  <div class="modal fade" id="post<?php echo $row['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="form-group">
                <input type="text" value="<?php echo $row['id'];?>"  name="id" hidden  style="    color: #FE4F75;" >
            </div>
<h3>Are you sure exit this car ?</h3>
             <button  class="btn  btn-primary btn-lg  mt-2 w-28 p-2" data-bs-dismiss="modal">Close</button>
              <input type="submit" name="sure_delete" class="btn btn-success text-light btn-lg p-2 mt-2 w-28" value="Yes">
             </form>    
       
        </div>
      </div>
    </div>
  </div>
  






<!--  -->
  <?php
include('include/car_katy_search.php');
$car_id2=$row['id_user'];
$user_id= mysqli_query($project,"SELECT * from `human` where id = $car_id2");
$row2=mysqli_fetch_assoc($user_id);
?>


  <tbody>
    <tr >
      <th scope="row" ><?php echo $count++  ?> </th>
      <td><?php echo $row['car_number']; ?></td>
      <td><?php echo $row['city']; ?></td>
      <td><?php echo $row['car_type']; ?></td>
      <td><?php echo $row['ariving_time']; ?></td>
      <td><?php echo $row2['username'] ?></td>
      <td><a width="10px" data-bs-toggle="modal" data-bs-target="#post<?php echo $row['id']?>">
      <img src="./img/remove.svg" width="40px" >
          </a>
      </td>
    </tr>
  </tbody>

<?php }?>
</div>
</div>
</div>
</div>
</div>
  </div>


  
</body>
</html>