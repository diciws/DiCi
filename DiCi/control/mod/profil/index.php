<?php 
include('../../../db/profile_import.php'); 
include('../../../includes/global.php');

if(!$user->is_logged_in()){ header('Location: ../../../login.php'); } 

include('layout/header.php'); 

include('layout/navigation.php');
?>

	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<br>
				<h3>Dein Profil</h2>
				<p>Benutzername: <b><?php echo $_SESSION['username']; ?></b></p>
				<p>Minecraft Ingame-Name: <b><?php echo $_SESSION['username']; ?></b></p>
				
				<p>IP-Adresse: 
				<?php
						$ip  = $_SERVER['REMOTE_ADDR'];
						echo '<b>'.$ip.'</b>';
				?></p>
				
				<hr>
		</div>
	</div>



<?php 
include('layout/footer.php'); 
?>
