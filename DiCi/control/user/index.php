<?php 
include('../../db/control_import.php'); 
include('../../includes/global.php');
require('../../assets/language/'.$config["settings"]["language"].'.php'); //import language

//set my permissions -> Security redirect :3
if($_SESSION['permission'] == "Admin"){
	header('Location: ../admin');
}
if($_SESSION['permission'] == "Mod"){
	header('Location: ../mod');
}

if(!$user->is_logged_in()){ 
	header('Location: ../../login.php'); 
} 

include('layout/header.php'); 

include('layout/navigation.php'); 
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<br>

				<h2><?php echo $lang["userinterface"]["welcome"];?> <b><?php echo $_SESSION['username']; ?></b>!</h2>
				<p><?php echo $lang["userinterface"]["text1"]; ?></p>
				
				<hr>
				
		</div>
	</div>


</div>

<?php 
include('layout/footer.php'); 
?>
