<?php
include('../../../db/profile_import.php'); 
include('../../../includes/global.php');

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

$stmt = $db->prepare('SELECT supbewerberID, name, ipadress, referenz, warumbewirbst, bewerbung, skills, abschlswort FROM devbewerber WHERE supbewerberID = :supbewerberID');
$stmt->execute(array(':supbewerberID' => $_GET['id']));
$row = $stmt->fetch();

if($row['supbewerberID'] == ''){
	header('Location: ./');
	exit;
}

include('layout/header.php'); 

include('layout/navigation.php');

?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

					<div class="row">
						<div class="col-25">
							<label for="idbewerb">BewerbungID</label>
						  </div>
						  <div class="col-75">
							<p><?php echo $row['supbewerberID'] ?></p>
						  </div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="idbewerb">Name</label>
						  </div>
						  <div class="col-75">
							<p><?php echo $row['name'] ?></p>
						  </div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="idbewerb">IP-Adresse</label>
						  </div>
						  <div class="col-75">
							<p><?php echo $row['ipadress'] ?></p>
						  </div>
					</div>
					<div class="row">
						<div class="col-25">
							<label for="idbewerb">Referenzen</label>
						  </div>
						  <div class="col-75">
							<p><?php echo $row['referenz'] ?></p>
						  </div>
					</div>					
					<div class="row">
						<div class="col-25">
							<label for="idbewerb">Warum bewirbst du dich?</label>
						  </div>
						  <div class="col-75">
							<p><?php echo $row['warumbewirbst'] ?></p>
						  </div>
					</div>					
					<div class="row">
						<div class="col-25">
							<label for="idbewerb">Bewerbung</label>
						  </div>
						  <div class="col-75">
							<p><?php echo $row['bewerbung'] ?></p>
						  </div>
					</div>					
					<div class="row">
						<div class="col-25">
							<label for="idbewerb">Skills</label>
						  </div>
						  <div class="col-75">
							<p><?php echo $row['skills'] ?></p>
						  </div>
					</div>					
					<div class="row">
						<div class="col-25">
							<label for="idbewerb">Abschluss Worte</label>
						  </div>
						  <div class="col-75">
							<p><?php echo $row['abschlswort'] ?></p>
						  </div>
					</div>
					<hr>
					
					<br><br>

			</div>
		</div>
</div>