<?php
 session_start();
 require "class/Data.php";
 $obj=new Data;
 $form=false;
//header('Content-Type: application/json');
if(isset($_POST["send"])){
	 $items=$obj->fileOut($_POST["hash"]);
	foreach ($items as $value) {
		$hash=$value["hash"];
		$secret=$value["secretText"];
		$create=$value["createdAt"];
		$time=$value["expiresAt"];
		$view=$value["remainingViews"]-1;
		$obj->change($hash,$secret,$create,$time,$view);
	}

	if($_POST["hash"]==$hash){
		$form=true;
	}

	else if(!isset($_SESSION["secret"])){
		header("location:index.php");
	}


	else {
		$form=true;
		$obj->create($_POST['hash'],$_SESSION["secret"],$_SESSION["views"],$_SESSION["after"]);
		
	
	}

	
}


 ?>


<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/style.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container-fluid">
	<div class="login-form">
		<?php if(!$form){ ?>
		<form  method="post" action="">

		<div class="form-group">
			<a href="page.php">Create json file</a>
		</div>	

		<div class="form-group">
			<input type='text' class='form-control' name='hash'  required="required" placeholder="Hash:"> 
		
			
		
		</div>

		<div class="form-group">
			<input type="submit" class="btn-primary" name="send" id="se2" value="Find it!" >
		</div>

	</form>

	 
	
		
	<?php 

	}
	else{
		echo "<div id='countdown'></div>";
		echo "<p id='time' class=".$time."><p>";


	
		

		echo "<p id='text'>Hash: ".$hash."</p>";
		echo "<p id='text'>Secret: ".$secret."</p>";
		echo "<p id='text'>createdAt: ".$create."</p>";
		echo "<p id='text'>expiresAt: ".$time."</p>";
		echo "<p id='text'>RemainingViews: ".$view."</p>";
		


	if($view<=0){
		//echo "<script type='text/javascript'>alert('Upload');</script>";
		//echo "Upload";
		unlink("secret/".$hash.".json");
		session_destroy();
		header("location:index.php");
		
		
	}
	
	}

	?>
	</div>
	</div>	
</body>
</html>