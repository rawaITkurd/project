<?php

include"include/config.php";
if(isset($_GET['search'])){
  $data=mysqli_real_escape_string($project,htmlspecialchars($_GET['name']));
  $qury=mysqli_query($project , "SELECT * FROM `human` WHERE `names` LIKE '%$data%' or  `phone_number` = '$data' or `email`='$data' or `username`='$data' or `gender`='$data'");
  if(mysqli_num_rows($qury) != 0){?>
<div class="col-lg-12 mb-1  col-sm-12 justify-content-center">
   <a href="user-update.php" class="btn btn-success text-light p-2 justify-content-center w-100" >
   <h5>Refresh</h5>
   </a>
   </div>
<div class="container bg-light radius-10 shadow-sm p-3">
<div class="row m-3 ">

<?php 
while($row = mysqli_fetch_assoc($qury)){?>

<div class="card m-2 border-0 p-3 shadow-sm text-center" style="width: 18rem;">
<img src="img/<?php if($row['gender']=='male'){echo 'male.png';}else{ echo 'female.png';}?>" alt="">
<h3 class="card-title "><?php echo $row['names'];?></h3>
<p class="card-text">user_name =' <?php echo $row['username'];?> '</p>
<p class="card-text">age =' <?php echo $row['age'];?> '</p>
<p class="card-text">phone =' <?php echo $row['phone_number'];?> '</p>
<p class="card-text" style="font-size: small;">email =' <?php echo $row['email'];?> '</p>
<div class="row">
<div class="col-12">
<a href="user-update.php?delete_id=<?php echo $row['id']?>" width="10px" data-bs-target="#post<?php echo $row['id']?>">
<img src="./img/remove.svg" width="40px" >
</a>
</div>
</div>
</div>
<?php
}
?>
</div>
</div>
  <?php }else{?>
    <div class="col-lg-12 mb-1  col-sm-12 justify-content-center">
   <a href="user-update.php" class="btn btn-success text-light p-2 justify-content-center w-100" >
   <h5>Refresh</h5>
   </a>
   </div>
   <div class="col-lg-6 col-sm-12 mx-auto ">
<div class="card rad raduis-10" >
  <img class="card-img-top raduis-10   mx-auto " src="img/no-data.jpg" alt="Card image cap">
    </div>
  </div>

  <?php }exit();
  }?>