<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/comandstyle.css" rel="stylesheet" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>user-page</title>
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

<?php
session_start();
if(isset($_SESSION['username'])){

    include"include/config.php";
     include"include/search.php"; 
     include"include/update.php"; 
    
}else{
  header("location:index.php");
}
  $qury=mysqli_query($project , "SELECT * FROM `human` ");
  if(mysqli_num_rows($qury) != 0){

if(isset($_GET['delete_id'])){
$id_del=mysqli_real_escape_string($project,htmlspecialchars($_GET['delete_id']));
 $qury_del=mysqli_query($project,"DELETE  FROM `human` where `id`= '$id_del'");
 if($qury_del){
header("location:user-update.php");
 }else{
   echo "this prosses is not successfull";
 }
}
?>

<div class="container bg-light radius-10 shadow-sm p-3">
<div class="row m-3 ">


<?php 
while($row = mysqli_fetch_assoc($qury)){?>
<div class="text-center card m-2 border-0 p-3 shadow-sm " style="width: 18rem;">

<img src="img/<?php
if($row['gender']=='male'){
  echo 'male.png';
}else{
  echo 'female.png';
}
?>" class="w-100">



<h3 class="card-title "><?php echo $row['names'];?></h3>
<p class="card-text">user_name =' <?php echo $row['username'];?> '</p>
<p class="card-text">age =' <?php echo $row['age'];?> '</p>
<p class="card-text">phone =' <?php echo $row['phone_number'];?> '</p>
<p class="card-text" style="font-size: small;">email =' <?php echo $row['email'];?> '</p>
<div class="row">
<div class="col-6">
<a href="user-update.php?delete_id=<?php echo $row['id']?>" width="10px">
<img src="./img/remove.svg" width="40px" >
</a>
</div>
<div class="col-6">
<span data-bs-toggle="modal" width="10px" data-bs-target="#post<?php echo $row['id']?>">
<img src="./img/pencil.svg" width="40px" >
</span>
</div>

</div>
</div>



<!-- Modal -->
<div class="modal fade" id="post<?php echo $row['id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 
 
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <input type="text" value="<?php echo $row['id'];?>"  name="id" hidden   >
            </div>
            <div class="form-group">
                <P class="text-center text-label-login">Name</P>
                <input type="text" value="<?php echo $row['names'];?>"  name="up_name" pattern="[A-Za-z ]{1,150}" title="You can only enter 150 letters for correct name"  class="form-control form-control2" style="    color: #FE4F75;" >
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Age</P>
                <input type="text" value="<?php echo $row['age'];?>" name="age" pattern="[0-9]{2}" title="Please insert the correct age"  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login" >Location</P>
            <select name="location" class="browser-default form-control text-center form-control2 custom-select">
        <option value="<?php echo $row['location'];?>" selected><?php echo $row['location'];?></option>
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
            <P class="text-center text-label-login" >gender</P>
            <select name="gender" class="browser-default form-control text-center form-control2 custom-select">
            <option value="<?php echo $row['gender'];?>"  selected><?php echo $row['gender'];?></option>
        <option value="male">male</option>
        <option value="female">female</option>
      </select>
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Phone_Number</P>
                <input type="text" value="<?php echo $row['phone_number'];?>" name="phone" pattern="[0-9]{11}" title="Please insert the correct phone number"  class="form-control form-control2">
            </div>
            <div class="form-group">
            <P class="text-center text-label-login">Email</P>
                <input type="text" value="<?php echo $row['email'];?>" name="email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please insert the correct data"   class="form-control form-control2">
            </div>
           <button  class="btn  btn-primary btn-lg  mt-2 w-25 " data-bs-dismiss="modal">Close</button>
            <input type="submit" name="update" class="btn btn-warning btn-lg  mt-2 p-2 w-25" value="update">
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
  <?php }else{
    echo "<p class='p-4 text-center text-light m-auto container bg-danger'>هیچ داتایەک نیە</p>";
  }exit();
  ?>
  </div>
  
</body>
</html>