<?php

require("functions.php");

$id = $_GET['id'];
$data = returnSingleResult("SELECT * FROM item WHERE itemId = $id");
$bids = runQuery("SELECT * FROM bid WHERE placedOn = $id order by price desc");

if (isset($_GET['del'])) {
    deleteRecord("bid", "bidId", $_GET['del']);
    header("Location: admin_page_product.php?id=$id");
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
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <style>
        .finished{
        <?php
            if(!hasBegun($data['endTime'])){
                echo "display:none;";
            }
            ?>
        }
        
    </style>
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
           <main class="table">
        <section class="table__header">
            <h1>Item Data:</h1>     
        </section>
        <section class="table__body">
            <table style=" z-index: 2;
 
margin: auto;
margin-top: 30px;
 
 width: 60%; 
 border-collapse: collapse;
 border-spacing: 0;
 box-shadow: 0 2px 15px rgba(64,64,64,.7);
 border-radius: 12px 12px 0 0;
 overflow: hidden;">
                    <thead>
                    <tr>
                        <th>Item ID:</th>
                        <th>Item Name:</th>
                        <th>Item Description:</th>
                        <th>Starting Price:</th>
                        <th>Photo URL:</th>
                        <th>Category:</th>
                        <th>Start Time:</th>
                        <th>End Time:</th>
                        <th>Is Approved?:</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input value=<?php echo $data['itemId'] ?>></td>                 
                        <td><input value=<?php echo $data['name'] ?>></td>                                       
                        <td><input value=<?php echo $data['descreption'] ?>></td>                   
                        <td><input value=<?php echo $data['startingPrice'] ?>></td>                   
                        <td><input value=<?php echo $data['photo'] ?>></td>                   
                        <td><input value=<?php echo $data['category'] ?>></td>                   
                        <td><input value=<?php echo $data['startTime'] ?>></td>
                        <td><input value=<?php echo $data['endTime'] ?>></td>                    
                        <td><input value=<?php echo $data['isApproved'] ?>></td>
                    </tr>
          

                </tbody>
                </table>
                 </section>
                   </main>

                 <br><br><br><br><br>
                
                <section class="table__header">
            <h2>Bids:</h2>     
        </section>
       <div class="content">
            <table border="1" style="left: 50%;
 top: 30%;">
                
                    <tr>
                        <th>Bid ID:</th>
                        <th>Date:</th>
                        <th>Bidder (ID | Name):</th>
                        <th>Price:</th>
                        <th>Action:</th>
                    </tr>
                    <?php
                    $winner = "";
                    $counter = 0;
                    while ($row = mysqli_fetch_assoc($bids)) {
                        if ($counter == 0) $winner = returnSingleResult("SELECT * FROM uuser WHERE userId = " . $row['placedBy']);
                        $counter++;
                        $bidId = $row['bidId'];
                        $Date = $row['date'];

                        $uid = $row['placedBy'];
                        $bidder = returnSingleResult("SELECT * FROM uuser WHERE userId = $uid");
                        $username = $bidder['name'];

                        $price = $row['price'];



                        echo <<< EOT
                        <tr>
                            <td>$bidId</td>
                            <td>$Date</td>
                            <td><a href="admin_page_user.php?id=$uid">$uid | $username</a></td>
                            <td>$price</td>
                            <td><a href="admin_page_product.php?del=$bidId&id=$id">❌ REMOVE BID</a></td>
                        </tr>
                        EOT;
                    }

                    ?>
                </table>
            </div>
            <br><br><br>
            <h3 class="finished">WINNER: <?php echo $winner['name'] . " (" . $winner['email'] . ")" ?></h3>
            <?php 
            $userId = $winner['userId'];
            $username = $winner['name'];
            $bid = returnSingleResult("SELECT * FROM bid WHERE placedBy = $userId order by price desc"); 
            ?>
            <h3>
                <div class="userData finished">
                    <label>Email to:</label>
                    <input value="<?php echo $winner['email']?>" disabled>
                    <textarea rows=6 >Congratulations, <?php echo $username ?>, you won the auction of (<?php echo $data['name'] ?>)!
Your offer for this product was: $<?php echo $bid['price'] ?>

Please respond to this email to continue the process.

Thanks in advance,
- bidit support.
</textarea>
                </div>

        </div>

</body>

</html>