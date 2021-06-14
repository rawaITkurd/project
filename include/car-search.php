<?php

include"include/config.php";
if(isset($_GET['search'])){
  $data=mysqli_real_escape_string($project,htmlspecialchars($_GET['name2']));
  $qury=mysqli_query($project , "SELECT * FROM `car` WHERE `car-color` LIKE '%$data%' or `car-num` = '$data' or `car-company-model`='$data' or `car-city`='$data'");
  if(mysqli_num_rows($qury) != 0){?>
<div class="col-lg-12 mb-1  col-sm-12 justify-content-center">
   <a href="car-update.php" class="btn btn-success text-light p-2 justify-content-center w-100" >
   <h5>Refresh</h5>
   </a>
   </div>

<div class="container bg-light radius-10 shadow-sm p-3">
<div class="row m-3 ">

<?php 
while($row = mysqli_fetch_assoc($qury)){?>

<div class="text-center raduis-10 col-sm-12 col-lg-3 card m-2 border-0 p-3 shadow-sm <?php if($row['car-expire-date']<=date("Y-m-d")){echo 'bg-danger text-light';}else{echo 'bg-light';}?> " style="width: 18rem;">
<img src="img/brand/<?php
if($row['car-company-model']=='NISSAN'||$row['car-company-model']=='Nissan'||$row['car-company-model']=='nissan'){
  echo 'nissan.png';
}elseif($row['car-company-model']=='Bmw'||$row['car-company-model']=='bmw'||$row['car-company-model']=='BMW'){
  echo 'bmw-logo.png';
}elseif($row['car-company-model']=='chevrilet'||$row['car-company-model']=='Chevrilet'||$row['car-company-model']=='CHEVRILET'){
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
    echo 'Audi.png';
  }else{
    echo 'car.jpg';
  }
?>" alt="" style="width: 100%;">
<h3 class="card-title "><?php echo $row['car-company-model'];?><h5><?php echo $row['car-model'];?></h5></h3>
<p class="card-text">Car Number =' <?php echo $row['car-num'];?> '</p>
<p class="card-text">Car City =' <?php echo $row['car-city'];?> '</p>
<p class="card-text">Car Color =' <?php echo $row['car-color'];?> '</p>
<div class="row">
<div class="col-12">
<a href="car-update.php?delete_id_update=<?php echo $row['id_car']?>" width="10px" data-bs-target="#post<?php echo $row['id_car']?>">
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
   <a href="car-update.php" class="btn btn-success text-light p-2 justify-content-center w-100" >
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