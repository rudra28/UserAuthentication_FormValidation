<?php
if (isset($_GET['name'])) {
	$name = $_GET['name'];
	$display = 'Hello ' .'<font color="#BF360C">'. $name. '</font>!';
} else {
	$display = 'Hello Guest!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Project 1</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="index-body">
	<center>
	<div id="index-div">
<h1>ITMD 562 PROJECT 1</h1>
<h2>RUDRA NARAYAN BANJARA A20361827</h2>
	<h2><?php print $display; ?></h2>
	<h3>
	  <?php 
	 
	      date_default_timezone_set('America/Chicago');
	      echo date('l F j, Y - g:i:s a | U ');
      ?>
    </h3>
	<a href="form.php" target="_blank">Create a Form</a>
	</div>
</center>
</body>
</html>