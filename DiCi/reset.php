<?php 
require('db/normal_import.php');
require('includes/global.php');

if( $user->is_logged_in() ){ header('Location: ./control/user'); }

if(isset($_POST['submit'])){

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Bitte gib eine richtige Email Adresse ein.';
	} else {
		$stmt = $db->prepare('SELECT email FROM mitglieder WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(empty($row['email'])){
			$error[] = 'Die E-Mail Adresse wird benötigt.';
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
			$subject = "Passwort-Zurücksetzung";
			$body = "<p>Jemand hat eine Anfrage gestellt dein Passwort zurückzusetzen.</p>
			<p>Wenn dies ein Fehler sein sollte, ignoriere diese Email.</p>
			<p>Um dein Passwort zurückzusetzen klicke auf den folgenden Link: <a href='".DIR."resetPassword.php?key=$token'>".DIR."resetPassword.php?key=$token</a></p>";

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
				<h2>Passwort zurücksetzen</h2>
				<p><a href='login.php'>Zurück zum Login</a></p>
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
							echo "<h2 class='bg-success'>Dein Account ist nun verifiziert, du kannst dich nun einloggen.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Bitte überprüfe deinen E-Mail Ordner nach den Zurücksetzungslink.</h2>";
							break;
					}
				}
				?>

				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" value="" tabindex="1">
				</div>

				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Link absenden" class="red" class="btn btn-primary btn-block btn-lg" tabindex="2"></div>
				</div>
			</form>
		</div>
	</div>


</div>

<?php
require('layout/footer.php');
?>
