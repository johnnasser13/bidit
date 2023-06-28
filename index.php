<?php require("functions.php");
$user = returnUser(); ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <style rel="stylesheet">
    .thumbnail img {
      height: 250px;
      width: 100%;
    }
  </style>

  <title>Bidit</title>
</head>

<body>

  <!--Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./index.php">Bidit</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <!-- <a class="dropdown-item" href="index.php">General</a> -->
            <a class="dropdown-item" href="index.php?category=art">Art</a>
            <a class="dropdown-item" href="index.php?category=technology">Technology</a>
          </div>
        </li>

      </ul>
      <form action="index.php" method="get" class="form-inline ml-auto">
        <a href="new_product.php" class="btn btn-primary mr-2">
          <i class="fas fa-plus"></i>
        </a>
        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

        <button type="submit" class="btn btn-primary">Search</button>

        <li>
          <a href="login.html" class="btn btn-primary">logout</a>
        </li>

      </form>
    </div>
  </nav>
  &nbsp;
  <!--Cards -->
  <?php
  require('connection.php');
  if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $query = "SELECT * FROM ITEM WHERE category = '$category'";
  } else if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM ITEM WHERE name LIKE '%$search%'";
  } else $query = "SELECT * FROM ITEM";
  $result = mysqli_query($con, $query);

  $rowcount = mysqli_num_rows($result);

  if ($rowcount > 0) {
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      if($row['isApproved'] == 0) continue;

      $id = $row['itemId'];
      $endTime = $row['endTime'];
      $startTime = $row['startTime'];
      $btn = "<a class=\"btn btn-secondary\">Bidding starts: $startTime</a>";

      // Has it started?
      if(hasBegun($row['startTime'])) $btn = "<a href=\"./product_page.php?id=$id\" class=\"btn btn-primary\">place bid</a>";

      // Has it finished?
      if(hasBegun($row['endTime'])) $btn = "<a class=\"btn btn-secondary\">Auction Ended. Awaiting admins action.</a>";

      $image = $row['photo'];
      $name = $row['name'];
      $startingPrice = $row['startingPrice'];
      if ($count % 3 == 0) {
        echo <<< EOT
          <div class="container">

          <!-- Row Beginning -->
          <div class="row">
        EOT;
      }
      echo <<< EOT
            <div class="col-sm-4">
            <div class="card" style="width: 18rem">
              <img height="150" src="$image" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">$name</h5>
                <p class="card-text">

                </p>
                $btn
                <p>Starts from: $startingPrice</p>
                <p>Ends: $endTime</p>
              </div>
            </div>
          </div>
      EOT;
      $count++;
      if ($count % 3 == 0) {
        echo <<< EOT
        </div>

        </div>
        <br /><br />
        EOT;
      }
    }
  } else {
    echo "No data.";
  }

  ?>

  <br /><br /><br />

  <br />
  <!--Footer Section-->
  <footer style="background-color: rgb(34, 34, 34); min-height:80px; margin-bottom:-10%;">
    <div class="container" style="margin-left: 80px">
      <ul style="display: flex">
        <li style="margin-top: 30px; font-size: 20px">
          <a href="./compinfo.html" target="_self" style="color: #fff">Company Information</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </li>
        <li style="margin-top: 30px; font-size: 20px">
          <a href="contactus.html" target="_self" style="color: #fff">Contact Us</a>
        </li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li style="margin-top: 30px; font-size: 20px">
          <a href="terms.html" target="_self" style="color: #fff">Terms of Service</a>
        </li>
      </ul>
    </div>
  </footer>
  <!-- <footer style="height: 50px; margin-left: 130px">
        <div class="conatiner">
            <div class="row">
                <div class="col-sm-3">
                    <li>
                        <a href="./compinfo.html " target="_self " style="color: #0c30cf">Company Information</a
              >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </li>
          </div>
          <div class="col-sm-3">
            <li>
              <a href="contactus.html " target="_self " style="color: #0c30cf"
                >Contact Us</a
              >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </li>
          </div>
          <div class="col-sm-3">
            <li>
              <a href="terms.html " target="_self " style="color: #0c30cf"
                >Terms of Service</a
              >
            </li>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </div>
      </div>
    </footer> -->
</body>

</html>