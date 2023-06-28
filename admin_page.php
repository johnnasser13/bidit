<?php

require("functions.php");

$data = runQuery("SELECT * FROM POLL");

if (isset($_GET['deleteid'])) {
    deleteRecord("poll", "reportedItem", $_GET['deleteid']);
    deleteRecord("item", "itemId", $_GET['deleteid']);
    header("Location: admin_page.php");
}

if (isset($_GET['undoReq'])) {
    deleteRecord("poll", "id", $_GET['undoReq']);
    header("Location: admin_page.php");
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
                    <th>Report ID:</th>
                    <th>Reported Product:</th>
                    <th>Reported By:</th>
                    <th>Report Descreption:</th>
                    <th>Delete Product?</th>
                    <th>Cancel Report?</th>
                </tr>
                <?php

                while ($row = mysqli_fetch_assoc($data)) {
                    $id = $row['id'];
                    $userid = $row['reportedBy'];
                    $itemid = $row['reportedItem'];
                    $descreption = $row['descreption'];

                    $user = returnSingleResult("SELECT * FROM uuser WHERE userId = $userid");
                    $userEmail = $user['email'];
                    $userId = $user['userId'];

                    $item = returnSingleResult("SELECT * FROM item WHERE itemId = $itemid");
                    $itemName = $item['name'];

                    echo <<< EOT
                <tr>
                    <td>$id</td>
                    <td><a href="admin_page_product.php?id=$itemid">$itemid ($itemName)</a></td>
                    <td><a href="admin_page_user.php?id=$userId">$userId ($userEmail)</a></td>
                    <td>$descreption</td>
                    <td><a href="admin_page.php?deleteid=$itemid">✅ Delete Product</a></td>
                    <td><a href="admin_page.php?undoReq=$id">❌ Cancel Request</a></td>
                </tr>
                EOT;
                }

                ?>
            </table>
        </div>

    </div>

</body>

</html>