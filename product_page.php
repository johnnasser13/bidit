<?php
require('connection.php');
require("functions.php");
$user = returnUser();
$userid = $user['userId'];
$string = "";
$id = $_GET['id'];
$data = returnSingleResult("SELECT * FROM item WHERE itemId = $id");
if(hasBegun($data['endTime'])) header("Location: index.php");


// If there's a bid by the same user on the same item, delete it.
if (isset($_POST['price']) && !isset($_POST['DEL'])) {
    $date = date("d/m/y");
    $userid = $user['userId'];
    $price = $_POST['price'];

    if((int)$price > (int)$data['startingPrice']) {
        // $bid = returnSingleResult("SELECT * FROM bid WHERE placedBy = " . $user['userId'] . " AND placedOn = " . $data['itemId']." ORDER BY price DESC");

        // if ($bid) {
        //     runQuery("DELETE FROM bid WHERE placedBy = $userid AND placedOn = " . $data['itemId']);
        //     $string = "Successfully updated bid to: ".$_POST['price'];
        // }
    
        $query = "INSERT INTO Bid (date, placedBy, placedOn, price) VALUES ('$date', $userid, $id, $price)";
        runQuery($query);
        header("Location: product_page.php?id=$id");
    } else $error = "Your bid must be larger than starting price: $".$data['startingPrice'];

}

if(isset($_POST['DEL'])) {
    runQuery("DELETE FROM bid WHERE placedBy = ".$user['userId']." AND placedOn = " . $data['itemId']);
    header("Location: product_page.php?id=$id");
}
$bid = returnSingleResult("SELECT * FROM bid WHERE placedBy = $userid AND placedOn = $id order by price desc");

$highestBidObject = returnSingleResult("SELECT * FROM bid WHERE placedOn = $id order by price desc");
if ($highestBidObject) $highestBid = $highestBidObject['price'];

// Adding a new bid here..
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />

    <!-- Custom CSS -->
    <link href="my_css/product_page.css" rel="stylesheet" />
    <link href="my_css/footer.css" rel="stylesheet" />

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <title>Product page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bidit</a>
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
                        <a class="dropdown-item" href="./art.php">Art</a>
                        <a class="dropdown-item" href="./tech.php">Technology</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline ml-auto">
                <a href="#" class="btn btn-primary mr-2">
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
    <!-- Page Content -->
    <div class="container">
        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Information</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">
            <div class="col-md-8">
                <h1><?php echo $data['name']; ?></h1>
                <img class="img-responsive" width="500" src="<?php echo $data['photo']; ?>" alt="product_image" />
            </div>

            <div class="col-md-4">
                <h3>Product Description</h3>
                <p><?php echo $data['descreption']; ?></p>
                <!-- <h3>Product Details</h3>
                 -->
                <a href="compliment.php?id=<?php echo $data['itemId'] ?>" type="submit" class="btn btn-danger">Report Product</a>
                <p>
                <h2>Current Highest Bid: <?php if($highestBidObject) echo $highestBid; else echo "None."; ?><h2>
                        </p>
            </div>

            <form action="product_page.php?id=<?php echo $_GET['id'] ?>" method="post" class="col-lg-3">
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
                    <input name="price" type="text" class="form-control" placeholder="Enter your bid.." />
                    <p><?php if (isset($error)) echo $error ?> </p>
                    <!-- <p><?php if (isset($string)) echo $string ?> </p> -->
                </div>
                <button type="submit" class="btn btn-primary">Bid for Product</button>
                <?php
                    if(isset($bid)) echo "<button type=\"submit\" name=\"DEL\" class=\"btn btn-danger\">DELETE BID ( $".$bid['price']." )</button>";
                ?>
               
            </form>
        </div>

        <!-- /.row -->

        <!-- Related Projects Row -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
</body>

</html>