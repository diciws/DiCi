<?php 
include('../../../db/profile_import.php'); 
include('../../../includes/global.php');

if(!$user->is_logged_in()){
	header('Location: ../../../login.php');
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
