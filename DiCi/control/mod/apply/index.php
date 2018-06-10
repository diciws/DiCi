<?php 
include('../../../db/profile_import.php'); 
include('../../../includes/global.php');
require('../../../assets/language/'.$config["settings"]["language"].'.php'); //import language

if(!$user->is_logged_in()){
	header('Location: ../../../login.php');
} 

//set my permissions -> Security redirect :3
if(empty($_SESSION['permission'])){
	header('Location: ../../user');
}
if($_SESSION['permission'] == "Admin"){
	header('Location: ../../admin');
}

include('layout/header.php'); 

include('layout/navigation.php');
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
						<h1>Für Mods Disabled!!!</h1>
						<hr>
						<br><br><br>
		</div>
	</div>



</div>



<?php 
include('layout/footer.php'); 
?>
