<?php 
require('db/normal_import.php');
require('includes/global.php');
require('assets/language/'.$config["settings"]["language"].'.php'); //get language

if( $user->is_logged_in() ){ header('Location: ./control/user'); }

if(isset($_POST['submit'])){

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = $lang["resetpw"]["emailfail"];
	} else {
		$stmt = $db->prepare('SELECT email FROM mitglieder WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(empty($row['email'])){
			$error[] = $lang["resetpw"]["emailisneeded"];
		}

	}

	if(!isset($error)){

		$token = md5(uniqid(rand(),true));

		try {

			$stmt = $db->prepare("UPDATE mitglieder SET resetToken = :token, resetComplete='No' WHERE email = :email");
			$stmt->execute(array(
				':email' => $row['email'],
				':token' => $token
			));

			$to = $row['email'];
			$subject = $lang["resetpwemail"]["titlerp"];
			$body = $lang["resetpwemail"]["body1"].$lang["resetpwemail"]["resetlink"].": <a href='".DIR."resetPassword.php?key=$token'>".DIR."resetPassword.php?key=$token</a></p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			header('Location: login.php?action=reset');
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
			
			<form role="form" method="post" action="" autocomplete="off">
			<div> <br></div>
				<h2><?php echo $lang["resetpw"]["title"]; ?></h2>
				<p><a href='login.php'><?php echo $lang["resetpw"]["r2"]; ?></a></p>
				<hr>

				<?php
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>".$lang["resetpw"]["succeslogin"]."</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>".$lang["resetpw"]["resetpwemailfolder"]."</h2>";
							break;
					}
				}
				?>

				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="<?php echo $lang["resetpw"]["username"]; ?>" value="" tabindex="1">
				</div>

				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="<?php echo $lang["resetpw"]["sendlink"]; ?>" class="red" class="btn btn-primary btn-block btn-lg" tabindex="2"></div>
				</div>
			</form>
		</div>
	</div>


</div>

<?php
require('layout/footer.php');
?>
