<?php 
require('db/normal_import.php');
require('includes/global.php');
require('assets/language/'.$config["settings"]["language"].'.php'); //get language

if( $user->is_logged_in() ){ header('Location: ./control/user'); }

if(isset($_POST['submit'])){

	if(strlen($_POST['username']) < 3){
		$error[] = $lang["register"]["nametooshort"];
	} else {
		$stmt = $db->prepare('SELECT username FROM mitglieder WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = $lang["register"]["isalredyused"];
		}

	}

	if(strlen($_POST['password']) < 3){
		$error[] = $lang["register"]["pwtoshort"];
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = $lang["register"]["confpwisshort"];
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = $lang["register"]["pwnmatch"];
	}

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Bitte gib eine gültige Email-Adresse ein.';
	} else {
		$stmt = $db->prepare('SELECT email FROM mitglieder WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = $lang["register"]["emailaused"];
		}

	}


	if(!isset($error)){

		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);
		$activasion = md5(uniqid(rand(),true));
		$ip  = $_SERVER['REMOTE_ADDR'];

		try {

			$stmt = $db->prepare('INSERT INTO mitglieder (username,password,email,active,userip) VALUES (:username, :password, :email, :active, :userip)');
			$stmt->execute(array(
				':username' => $_POST['username'],
				':password' => $hashedpassword,
				':email' => $_POST['email'],
				':active' => $activasion,
				':userip' => $ip
			));
			$id = $db->lastInsertId('memberID');

			$to = $_POST['email'];
			$subject = $lang["registeremail"]["titlerp"];
			$body = $lang["registeremail"]["body1"].$lang["registeremail"]["registerlink"].": <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>"
			.$lang["registeremail"]["greetings"];


			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			header('Location: index.php?action=joined');
			exit;

		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

require('layout/header.php');
?>

</div>
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<div> <br></div>
			
			<form role="form" method="post" action="" autocomplete="off">
				<h2><?php echo $lang["register"]["title"]; ?></h2>
				<p><?php echo $lang["register"]["r2"]; ?> <a href='login.php'><?php echo $lang["register"]["login"]; ?></a></p>
				<hr>

				<?php
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>".$lang["register"]["succesregister"]."</h2>";
				}
				?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="<?php echo $lang["register"]["username"]; ?>" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="<?php echo $lang["register"]["emailadress"]; ?>" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="<?php echo $lang["register"]["password"]; ?>" tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="<?php echo $lang["register"]["confirmpassword"]; ?>" tabindex="4">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="<?php echo $lang["register"]["submitregister"]; ?>" class="red" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>

</div>

<?php
require('layout/footer.php');
?>
