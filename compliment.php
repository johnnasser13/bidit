<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/-->
<!DOCTYPE html>
<html>
<head>
<title>FeedbacK Engine</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegant Feedback Form  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //custom-theme -->
<link href="css/stylefb.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>
<body class="agileits_w3layouts">

    <a  class="agileinfo" type="submit" href="./index.php">Home </a>

    <h1 class="agile_head text-center">Report form</h1>

    <div class="w3layouts_main wrap">
	  <h3>Please help us to serve you better by taking a couple of minutes. </h3>
	    <form action="feedback.php?id=<?php echo $_GET['id'] ?>" method="post" class="agile_form">

			<h2>If you have specific feedback, please write to us...</h2>
			<textarea placeholder="Describe abuse" class="w3l_summary" name="comments" required=""></textarea>
			<center><input type="submit" value="submit report" class="agileinfo" /></center>
	  </form>
	</div>
	
</body>
</html>

