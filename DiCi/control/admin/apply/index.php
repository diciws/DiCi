<?php 
include('../../../db/profile_import.php'); 
include('../../../includes/global.php');
require('../../../assets/language/'.$config["settings"]["language"].'.php'); //import 

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

include('layout/header.php'); 

include('layout/navigation.php');
?>
<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<h2>Dev - Bewerbungen</h2>
			<?php 
				$sql = "SELECT * FROM devbewerber";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $res = $stmt->fetchAll();

                if(!$res) {
                    echo "Es sind zurzeit keine Bewerbungen verfügbar!<br>";
                }  else {
					echo "Hier sind alle verfügbaren Bewerbungen!<br>";
                    foreach($res as $row) { ?>

					<div class="row">
						<div class="col-25">
							<label for="idbewerb">Bewerbung - <?php echo $row['devbewerberID'] ?></label>
						  </div>
						  <div class="col-75">
							<p>Name: <?php echo $row['name'] ?> | IP-Adresse: <?php echo $row['ipadress'] ?></p>
						  </div>
					</div>
					<div class="row">
					<?php
						echo '<a type="button" href="./devapply.php?id='.$row['devbewerberID'].'">Bewerbung ansehen</a>';
					?>
					</div>
					
					<hr>
					
					<br><br>
					<?php
						}
					}
				?>
			</div>
		</div>
</div>



<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<h2>Supporter - Bewerbungen</h2>
			<?php 
				$sql = "SELECT * FROM supbewerber";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $res = $stmt->fetchAll();

                if(!$res) {
                    echo "Es sind zurzeit keine Bewerbungen verfügbar!<br>";
                }  else {
					echo "Hier sind alle verfügbaren Bewerbungen!<br>";
                    foreach($res as $row) { ?>

					<div class="row">
						<div class="col-25">
							<label for="idbewerb">Bewerbung - <?php echo $row['supbewerberID'] ?></label>
						  </div>
						  <div class="col-75">
							<p>Name: <?php echo $row['name'] ?> | IP-Adresse: <?php echo $row['ipadress'] ?></p>
						  </div>
					</div>
					<div class="row">
					<?php
						echo '<a type="button" href="./supapply.php?id='.$row['supbewerberID'].'">Bewerbung ansehen</a>';
					?>
					</div>
					
					<hr>
					
					<br><br>
					<?php
						}
					}
				?>
			</div>
		</div>
</div>

<?php 
include('layout/footer.php'); 
?>
