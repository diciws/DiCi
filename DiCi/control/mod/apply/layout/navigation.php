<div class="container">

	<div class="row">
		<h2><?php echo $lang["modinterface"]["modinterface"]; ?></h2>
	</div>
	<div class="row">
		<div class="profile_info">
		<?php
		$url = 'https://cravatar.eu/helmavatar/';
		$name = $_SESSION['username'];
		
		echo	'<a data-placement="top" rel="tooltip" style="display: inline-block;" title="'. $name .'">
			<img src="'.$url.$name.'/50" size="40" width="40" height="40" style="width: 30px; height: 30px; "/></a>';
			
			?>
		<div>
		
			<br>
			<a href="../"><?php echo $lang["modinterface"]["home"]; ?></a>
			<a href="../profil"><?php echo $lang["modinterface"]["profile"]; ?></a>
			<a href="../stats"><?php echo $lang["modinterface"]["stats"]; ?></a>
			<a href="./"><?php echo $lang["modinterface"]["apply"]; ?></a>
			<a href="../../../logout.php" style="color: red;"><?php echo $lang["modinterface"]["logout"]; ?></a>
		</div>
	
		</div>
	</div>
</div>

<hr>