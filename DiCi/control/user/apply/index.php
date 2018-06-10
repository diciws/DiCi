<?php 
include('../../../db/profile_import.php'); 
include('../../../includes/global.php');
require('../../../assets/language/'.$config["settings"]["language"].'.php'); //import language

//set my permissions -> Security redirect :3
if($_SESSION['permission'] == "Admin"){
	header('Location: ../../admin');
}
if($_SESSION['permission'] == "Mod"){
	header('Location: ../../mod');
}


if(!$user->is_logged_in()){ header('Location: ../../../login.php'); } 

include('layout/header.php'); 

include('layout/navigation.php');
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="POST" action="./insertapply.php" autocomplete="off">

				<?php
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				
				$dbname = $_SESSION['username'];
				
				if(isset($_POST['Absenden'])){
					
					$stmt = $db->prepare('SELECT name FROM devbewerber WHERE name = :name');
					$stmt->execute(array(':name' => $_POST['username']));
					$row = $stmt->fetch(PDO::FETCH_ASSOC);

					if($row['username'] == $dbname){
						$error[] = 'Du hast dich schonmal beworben!';
					}

				}

				?>				

				<div class="row">
					<div class="col-25">
						<label for="loginname">Benutzername</label>
					  </div>
					  <div class="col-75">
						<input type="text" id="loginname" name="loginname" placeholder="<?php echo $_SESSION['username']; ?>" disabled>
					  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="referenz">Referenzen</label>
				  </div>
				  <div class="col-75">
					<input type="text" id="referenz" name="referenz" placeholder="z.b GitHub,Gitlab, BitBukkit, ...">
				  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="devbereich">Nichts ausgewählt</label>
				  </div>
				  <div class="col-75">
					<select id="country" name="country">
					  <option value="devbereichnetwork">Network - Developer</option>
					  <option value="devbereichweb">Web - Developer</option>
					  <option value="devbereichjava">Java - Developer</option>
					</select>
				  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="warumbewirbst">Warum bewirbst du dich hier?</label>
				  </div>
				  <div class="col-75">
					<textarea id="warumbewirbst" name="warumbewirbst" minlength="50" placeholder="Mindestens 50 Wörter..." style="height:200px"></textarea>
				  </div>
				</div>
				
				<div class="row">
				  <div class="col-25">
					<label for="bewerbung">Schreibe hier etwas über dich.</label>
				  </div>
				  <div class="col-75">
					<textarea id="bewerbung" minlength="150" name="bewerbung" placeholder="z.b. Timeline, ..." style="height:200px"></textarea>
				  </div>
				</div>
				
				<div class="row">
				  <div class="col-25">
					<label for="skills">Was sind deine Skills?</label>
				  </div>
				  <div class="col-75">
					<textarea id="skills" minlength="30" name="skills" placeholder="z.b. PHP - 7 Jahre, Java - 3 Jahre, ..." style="height:200px"></textarea>
				  </div>
				</div>
				<div class="row">
				  <div class="col-25">
					<label for="abschlswort">Abschließende Worte?</label>
				  </div>
				  <div class="col-75">
					<textarea id="abschlswort" name="abschlswort" minlength="20" placeholder="Möchtest du uns noch etwas mitteilen?" style="height:200px"></textarea>
				  </div>
				</div>
				
				<hr>
				
				<div class="row">
				  <input type="submit" value="Absenden">
				</div>
			</form>
		</div>
	</div>



</div>



<?php 
include('layout/footer.php'); 
?>
