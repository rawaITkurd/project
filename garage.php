<?php

session_start();
if(isset($_SESSION['username'])){
    include"include/navbar.inc.php";
    
}else{
  header("location:index.php");
}
$Q_2=mysqli_query($project,"SELECT * FROM `history`");
$num_row=mysqli_num_rows($Q_2);
if($num_row!=0){
if(isset($_GET['sure_delete_garage'])){
  $delete_all=mysqli_query($project,"DELETE  FROM `history` WHERE `exit_time` != '00:00:00'");
  if($delete_all){
header('location:garage.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage</title>
</head>
<body>
    
<div class="card mt-4 mx-5 p-2">
  <div class="card-body">
  <!--ama model bo dllniai -->
  <div class="modal fade" id="info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
<h3>Do you want Delete all data ?</h3>
             <button  class="btn  btn-primary btn-lg  mt-2 w-28 p-2" data-bs-dismiss="modal">No</button>
              <input type="submit" name="sure_delete_garage" class="btn btn-danger text-light btn-lg p-2 mt-2 w-28" value="Yes">
             </form>    
       
        </div>
      </div>
    </div>
  </div>

  
<div class="table-responsive">

<table class="table table-hover table-responsive-sm">
<a data-bs-toggle="modal" data-bs-target="#info" class="btn-danger btn"> Delete</a>

  <thead>
    <tr>
      <th scope="col">Count</th>
      <th scope="col">Car-Plate-Number</th>
      <th scope="col">City</th>
      <th scope="col">Type</th>
      <th scope="col">Date</th>
      <th scope="col">Ariving-Time</th>
      <th scope="col">Exit-Time</th>
      <th scope="col">Remains</th>
      <th scope="col">User</th>
    </tr>
  </thead>
<?php

while($row=mysqli_fetch_assoc($Q_2)){
  $username2=$row['id_user'];

  $user_id2=mysqli_query($project,"SELECT `username` from `human` where id=$username2");
  $row2=mysqli_fetch_assoc($user_id2);
  static $count=1;
  ?>
  <tbody>
    <tr data-bs-toggle="modal"  width="10px" data-bs-target="#post">
      <th scope="row"><?php echo $count++  ?></th>
      <td><?php echo $row['car_number']; ?></td>
      <td><?php echo $row['city']; ?></td>
      <td><?php echo $row['car_type']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['ariving_time']; ?></td>
      <td><?php echo $row['exit_time']; ?></td>
      <td><?php echo $row['Remains']; ?></td>
      <td><?php echo $row2['username']; ?></td>
    </tr>
  </tbody>
  <?php } ?>
</table>
</div>
  <?php }
  else{
    ?>
    <div class="col-lg-6 col-sm-12 mx-auto ">
    <div class="card rad raduis-10" >
    <img class="card-img-top raduis-10   mx-auto " src="img/no-data.jpg" alt="Card image cap">
    </div>
    </div>
  <?php }exit();

  ?>
  </div>

</div>





</body>
</html>