<?php 
include('../../../db/profile_import.php'); 
include('../../../includes/global.php');
require('../../../assets/language/'.$config["settings"]["language"].'.php'); //import language

if(!$user->is_logged_in()){ header('Location: ../../../login.php'); } 

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

	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<br>
				<h3><?php echo $lang["modinterface"]["profile"]; ?></h2>
				<p>Benutzername: <b><?php echo $_SESSION['username']; ?></b></p>
				<p>Minecraft Ingame-Name: <b><?php echo $_SESSION['username']; ?></b></p>
				<p><?php echo $lang["modinterface"]["getid"]; ?> <?php echo $_SESSION['memberID']; ?></p>	
				<p><?php echo $lang["modinterface"]["permissions"]; ?> <?php echo $_SESSION['permission']; ?></p>	
            
				<p><?php echo $lang["modinterface"]["ipadress"]; ?> 
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
