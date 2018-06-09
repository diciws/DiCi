<?php 
require('db/normal_import.php'); 
require('includes/global.php');
require('assets/language/'.$config["settings"]["language"].'.php'); //get language

if( $user->is_logged_in() ){ header('Location: ./control'); } 

$stmt = $db->prepare('SELECT resetToken, resetComplete FROM mitglieder WHERE resetToken = :token');
$stmt->execute(array(':token' => $_GET['key']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(empty($row['resetToken'])){
	$stop = $lang["resetverifiedpw"]["falsetoken"];
} elseif($row['resetComplete'] == 'Yes') {
	$stop = $lang["resetverifiedpw"]["justeditedpassword"];
}

if(isset($_POST['submit'])){

	if(strlen($_POST['password']) < 3){
		$error[] = $lang["resetverifiedpw"]["passwordtooshort"];
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = $lang["resetverifiedpw"]["confirmpasswordtooshort"];
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = $lang["resetverifiedpw"]["passwordnmatch"];
	}

	if(!isset($error)){

		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		try {

			$stmt = $db->prepare("UPDATE mitglieder SET password = :hashedpassword, resetComplete = 'Yes'  WHERE resetToken = :token");
			$stmt->execute(array(
				':hashedpassword' => $hashedpassword,
				':token' => $row['resetToken']
			));

			header('Location: login.php?action=resetAccount');
			exit;

		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

require('layout/header.php'); 
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<div> <br></div>

	    	<?php if(isset($stop)){

	    		echo "<p class='bg-danger'>$stop</p>";

	    	} else { ?>

				<form role="form" method="post" action="" autocomplete="off">
					<h2><?php echo $lang["resetverifiedpw"]["title"]; ?></h2>
					<hr>

					<?php

					if(isset($error)){
						foreach($error as $error){
							echo '<p class="bg-danger">'.$error.'</p>';
						}
					}


					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>".$lang["resetpw"]["succeslogin"];."</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>".$lang["resetpw"]["resetpwemailfolder"];."</h2>";
							break;
					}
					?>

					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="<?php echo $lang["resetverifiedpw"]["Password"]; ?>" tabindex="1">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="<?php echo $lang["resetverifiedpw"]["confirmpassword"]; ?>" tabindex="1">
							</div>
						</div>
					</div>
					
					<hr>
					<div class="row">
						<div class="col-xs-6 col-md-6"><input type="submit" name="Bestätigen" value="<?php echo $lang["resetverifiedpw"]["changepassword"]; ?>" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
					</div>
				</form>

			<?php } ?>
		</div>
	</div>


</div>

<?php 
require('layout/footer.php'); 
?>