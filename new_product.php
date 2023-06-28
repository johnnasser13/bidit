.
<?php require("functions.php");
$user = returnUser(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <style rel="stylesheet">
        .jumbotron {
            text-align: center;
        }
    </style>

    <title>New Product</title>

    <title>Bidit</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-top: -2%;">
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
            <form class="form-inline ml-auto" style="margin-top: 1%;">
                <a href="#" class="btn btn-primary mr-2">
                    <i class="fas fa-plus"></i>
                </a>
                <a href="search engine.html" class="btn btn-primary">Search</a>
                 <li>
          <a href="login.html" class="btn btn-primary">logout</a>
        </li>
            </form>
        </div>
    </nav>

    <div class="container ">
        <div class="row ">
            <div class="col-lg-12 ">
                <div class="jumbotron ">
                    <h1>Product Details</h1>
                    <p>Got Any New Stuff to Sell !!!!!!<br>Post It Here</p>

                </div>
            </div>
        </div>
        <?php if(isset($_GET['error'])) echo "<p class=\"error\">Error: ".$_GET['error']." </p>"; ?>
        <div class="col-lg-12 ">
            <div class="well well-lg ">
                <form class="form-group" action="addproduct.php" method="post">
                    <label>Product Name </label>
                    <input name="name" class="form-control " placeholder="Product Name " required>
                    <br>
                    <label>Product Category </label>
                    <select name="category" class="form-control " required>
                        <option>---SELECT---</option>
                        <option value="art">Art</option>
                        <option value="technology">Technology</option>


                    </select>
                    <br>
                    <label>Product Description</label>
                    <textarea name="description" class="form-control " rows="3 " placeholder="Type or paste the product description here.Only Plain text is supported. " required></textarea>
                    <br>
                    <label>Start Auction Date</label>
                    <input name="startTime" type="date" class="form-control" required>
                    <br>
                    <!-- <label>Start Auction Time</label>
                    <input type="date" class="form-control ">
                    <br> -->

                    <label>End Auction Date</label>
                    <input name="endTime" type="date" class="form-control" required>
                    <br>
                    <!-- <label>End Auction Time</label>
                    <input type="Time " class="form-control ">
                    <br> -->
                    <label>Upload Photo</label>
                    <input name="photo" placeholder="Photo URL" class="form-control " required>
                    <!-- <input type="file"> -->
                    <br>
                    <label>Base Price</label>
                    <div class="form-group input-group ">
                        <span class="input-group-addon "><i class="fa fa-rupee "></i></span>
                        <input name="startingPrice" type="text " class="form-control " placeholder="Bidding starts from " required>
                    </div>
                    <br>
                    <button type="submit " class="btn btn-primary btn-lg center-block ">Submit</button>
                </form>
            </div>
        </div>
</body>

</html>