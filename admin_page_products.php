<?php

require("functions.php");

$listings = runQuery("SELECT * FROM item");

if (isset($_GET['del'])) {
    deleteRecord("poll", "reportedItem", $_GET['del']);
    deleteRecord("item", "itemId", $_GET['del']);
    header("Location: admin_page_products.php");
}

if (isset($_GET['lockid'])) {
    ItemApprover($_GET['lockid'], "APPROVE");
    header("Location: admin_page_products.php");
}

if (isset($_GET['unlockid'])) {
    ItemApprover($_GET['unlockid'], "UNBAN");
    header("Location: admin_page_products.php");
}


?>

<!DOCTYPE html>
<html lang="en">

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
    
    <link href="css/main.css" rel="stylesheet" />

    <title>Admin Dashboard</title>
</head>

<body>
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
        <li class="nav-item">
          <a class="nav-link" href="./admin_page_users.php">USERS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admin_page.php">REPORTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admin_page_products.php">PRODUCTS</a>
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

        

      </form>
    </div>
  </nav>

    
        <div class="content">
            <table border="1">
                <tr>
                    <th>ID:</th>
                    <th>Name:</th>
                    <th>Description:</th>
                    <th>Starting Price:</th>
                    <th>Photo:</th>
                    <th>Category:</th>
                    <th>Start Time:</th>
                    <th>End Time:</th>
                    <th>is Approved:</th>
                    <th>STATUS:</th>
                    <th>Delete?</th>
                </tr>
                <?php

                while ($row = mysqli_fetch_assoc($listings)) {
                    $itemId = $row['itemId'];
                    $itemName = $row['name'];
                    $itemDescreption = substr($row['descreption'], -10) . "...";
                    $itemPrice = $row['startingPrice'];
                    $itemPhoto = $row['photo'];
                    $itemCategory = $row['category'];
                    $itemStart = $row['startTime'];
                    $itemEnd = $row['endTime'];
                    $itemApp = $row['isApproved'];
                    
                    if(hasBegun($itemEnd)) $status = "FINISHED";
                    else if(hasBegun($itemStart)) $status = "ACTIVE";
                    else $status = "PENDING";
                    $approver;
                    if($itemApp == 1) $approver = "<a href=\"admin_page_products.php?unlockid=$itemId\">Disapprove</a>";
                    else $approver = "<a href=\"admin_page_products.php?lockid=$itemId\">Approve</a>";

                    echo <<< EOT
                        <tr>
                            <td>$itemId</td>
                            <td><a href="admin_page_product.php?id=$itemId">$itemName</a></td>
                            <td>$itemDescreption</td>
                            <td>$itemPrice</td>
                            <td><img height="30px" src="$itemPhoto"></td>
                            <td>$itemCategory</td>
                            <td>$itemStart</td>
                            <td>$itemEnd</td>
                            <td>$approver</td>
                            <td>$status</td>
                            <td><a href="admin_page_products.php?del=$itemId">❌ DELETE ITEM</a></td>
                        </tr>
                        EOT;
                }

                ?>
            </table>
        </div>

    </div>

</body>

</html>