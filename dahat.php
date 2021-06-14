<?php

session_start();
if(isset($_SESSION['username'])){
    include"include/navbar.inc.php";
    
}else{
  header("location:index.php");
}
$Q_2=mysqli_query($project,"SELECT * FROM `income` ORDER BY `id` DESC LIMIT 20 ");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income-page</title>
</head>
<body>
    


<div class="card m-4  p-2">
  <div class="card-body">
<div class="table-responsive col-12">

<table class="table table-hover table-responsive-sm">

  <thead>
    <tr>
      <th scope="col">Count</th>
      <th scope="col">Date</th>
      <th scope="col">Remains</th>
      <th scope="col">Price</th>
      <th scope="col">Offer</th>
    </tr>
  </thead>
<?php
while($row=mysqli_fetch_assoc($Q_2)){
  static $count=1;
  ?>
  <tbody>
    <tr data-bs-toggle="modal"  width="10px" data-bs-target="#post">
      <th><?php echo $count++  ?></th>
      <td><?php echo $row['date'];?></td>
      <td><?php echo $row['Remains'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php echo $row['offer'];?></td>
    </tr>
  </tbody>
  <?php } ?>
  
</table>
<br>
<div style="background-color: #91B3FA;border-radius:7px;color:white;text-align:center" class="col-lg-4 col-md-4 col-sm-12">
<h1 >Total=
<?php $koygshty= mysqli_query($project,"SELECT sum(`price`) from `income`");
$koygshty_asoc=mysqli_fetch_assoc($koygshty);
echo $koygshty_asoc['sum(`price`)']?> IQD
</h1>
</div>
</div>
  </div>
</div>



<div class="card mx-4 ">
  <div class="card-body">
    <h1 class="card-title" style="background-color: #91B3FA;width:200px;border-radius:7px;color:white;text-align:center">Calender</h1>

    <br>
    <form action="dahat.php" method="GET">
    <div class="col-md-3 col-sm-12 form-group ">
    
    <label> From date </label>
          <input type="date" name ="from_date" class="form-control">
    </div>
    
    
    <div class="col-md-3 col-sm-12 form-group">
    <label  > To  date </label>
          <input type="date" name ="to_date" class="form-control" >
    </div>

    <div class="col-md-4">
    
     <br>
    <button type="submit" name="submit" class="btn btn-primary">Click</button>
    
    </div>
    </form>
  </div>
</div>
<br>
<div class="card mx-4">
  <div class="card-body">
     <?php 
    
     if(isset($_GET['submit']))
     {
          $from_date = $_GET['from_date'];
         $to_date = $_GET['to_date'];
         $query =mysqli_query($project ," SELECT * FROM `income` WHERE  `date`  BETWEEN '$from_date' AND '$to_date' ORDER BY `date` ASC"); ?>

<div class="table-responsive">

<table class="table table-hover table-responsive-sm">

  <thead>
    <tr>
    <th scope="col">Count</th>
      <th scope="col">Date</th>
      <th scope="col">Price</th>
      <th scope="col">Remains</th>
      <th scope="col">Offer</th>
    </tr>
  </thead>
        <?php while($row=mysqli_fetch_assoc($query))
         {
           static $sum=1;
           ?>
           <tbody>
    <tr data-bs-toggle="modal"  width="10px" data-bs-target="#post">
      <th scope="row"><?php echo $sum++  ?></th>
      <td><?php echo $row['date'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php echo $row['Remains'];?></td>
      <td><?php echo $row['offer'];?></td>
    </tr>
  </tbody>
        <?php } ?>
        <div style="background-color: #91B3FA;border-radius:7px;color:white;text-align:center" class="col-lg-4 col-md-4 col-sm-12">
        <h1>Total from [<?php echo $from_date ?>] to [<?php echo $to_date ?>]</h1> <hr>
<h1> Total= <?php $koygshty= mysqli_query($project,"SELECT sum(`price`) from `income`  WHERE  `date`  BETWEEN '$from_date' AND '$to_date'");
$koygshty_asoc=mysqli_fetch_assoc($koygshty);
 echo $koygshty_asoc['sum(`price`)']?> IQD</h1>
        

        <?php }
     ?>
  </div>
</div>

</body>
</html>