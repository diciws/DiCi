<?php 
include('../../../db/profile_import.php'); 
include('../../../includes/global.php');
require('../../../assets/language/'.$config["settings"]["language"].'.php'); //import language frome home

//set my permissions -> Security redirect :3
if(empty($_SESSION['permission'])){
	header('Location: ../../user');
}
if($_SESSION['permission'] == "Mod"){
	header('Location: ../../mod');
}

if(!$user->is_logged_in()){
	header('Location: ../../../login.php');
} 

//Connection DB for badges
$stmt = $db->prepare('SELECT firstlogin, verifyiedaccount, firstapply FROM badges WHERE name = :name');
$stmt->execute(array(':name' => $_SESSION['username']));
$row = $stmt->fetch();

include('layout/header.php'); 

include('layout/navigation.php');
?>

	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<br>
				<h3><?php echo $lang["admininterface"]["stats"]; ?></h3>
				<p></p>
                <?php
                    
                    if($row['firstlogin'] == 'Yes'){
                        echo $lang["admininterface"]["statsfirstlogin"].' <b>First Login</b></p>';
                    }
                    
                ?>

            


				
				<hr>
		</div>
	</div>



<?php 
include('layout/footer.php'); 
?>
