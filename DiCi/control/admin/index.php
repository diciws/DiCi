<?php 
include('../../db/control_import.php'); 
include('../../includes/global.php');

if(!$user->is_logged_in()){
	header('Location: ../../login.php');
} 

//set my permissions -> Security redirect :3
if(empty($_SESSION['permission'])){
	header('Location: ../user');
}
if($_SESSION['permission'] == "Mod"){
	header('Location: ../mod');
}

include('layout/header.php'); 
include('layout/navigation.php'); 
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<br>

				<h2>Servus <b><?php echo $_SESSION['username']; ?></b>!</h2>
				<p>Das ist ein schönes Projekt von mir! Viel Spaß.</p>
				<p>Deine ID: <?php echo $_SESSION['memberID']; ?></p>	
				<p>Deine Permission: <?php echo $_SESSION['permission']; ?></p>	
				
				<hr>
				
		</div>
	</div>


</div>

<?php 
include('layout/footer.php'); 
?>
