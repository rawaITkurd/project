<?php
include"include/config.php"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/comandstyle.css" rel="stylesheet" >
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
            car
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="car.php">Car</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="add-car.php">Car-Add</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="car-update.php">Car-Detail</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
            user
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="user.php">user</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="add-user.php">Add User Page</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="user-update.php">Detail User</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="car-expire.php">Car-Expire</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dahat.php">income</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="garage.php">garage</a>
        </li>
      </ul>

    </div>

  </div>
</nav>






</body>
</html>