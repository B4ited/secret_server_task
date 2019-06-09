<?php
session_start();
require "class/Data.php";
$obj=new Data;
$db=0;
$form=false;

if(isset($_POST["send"])){
	$form=true;
	$_SESSION["secret"]=$_POST["secret"];
	$_SESSION["views"]=$_POST["views"];
	$_SESSION["after"]=$_POST["after"];
	header("location:index.php");
}






?>

<!DOCTYPE html>
<html>
<head>
<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
	<div class="container-fluid">
	<div class="login-form">

		<form method="post" action="">
			<div class="form-group">
			<a href="index.php">Search json file</a>
		</div>
				<div class="form-group">
			<input type="text" class="form-control" name="secret"   required="required" placeholder="Secret:" >
		</div>

			<div class="form-group">
			<input type="number" class="form-control" name="views"   required="required" placeholder="ExpireAfterViews:" >
		</div>

		<div class="form-group">
			<input type="number" class="form-control" name="after"   required="required" placeholder="ExpireAfter:" >
		</div>
		<div class="form-group">
			<input type="submit" class="btn-primary" name="send" id="se"  required="required" value="Execute" >
		</div>

		 	</form>

</div>	
</div>
</body>
</html>

