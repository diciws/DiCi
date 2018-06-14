<?php
require_once('db/normal_import.php');
require('includes/global.php');
require('assets/language/'.$config["settings"]["language"].'.php'); //get language

if( $user->is_logged_in() ){
	header('Location: ./'); 
} 

if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];


	if($user->login($username,$password)){ 
		$_SESSION['username'] = $username;
		if($_SESSION['permission'] == "Admin"){
			header('Location: ./control/admin');
		}else if($_SESSION['permission'] == "Mod"){
			header('Location: ./control/mod');
		}else{
			header('Location: ./control/user');
			exit;
		}
                        

	} else {
		$error[] = $lang["general"]["loginerror"];
	}
    
}

require('layout/header.php'); 
?>

	
<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
			<div> <br></div>
				<h2><?php echo $lang["login"]["title"]; ?></h2>
				<p><a href='./'><?php echo $lang["login"]["r2"]; ?></a></p>
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
							echo "<h2 class='bg-success'>".$lang["login"]["succesverify"]."</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>".$lang["login"]["emailverify"]."</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>".$lang["login"]["passwordchange"]."</h2>";
							break;
					}

				}

				
				?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="<?php echo $lang["login"]["username"]; ?>" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="<?php echo $lang["login"]["password"]; ?>" tabindex="3">
				</div>
				
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-md-9">
						 <a href='reset.php'><?php echo $lang["login"]["forgotpassword"]; ?></a>
					</div>
				</div>
				
				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="<?php echo $lang["login"]["loginnow"]; ?>" class="red" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>



</div>


<?php 
require('layout/footer.php'); 
?>
