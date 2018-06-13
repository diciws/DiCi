<div class="container">

	<div class="row">
		<h2><?php echo $lang["admininterface"]["admininterface"];?></h2>
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
			<a href="../"><?php echo $lang["adminnavigation"]["home"]; ?></a>
			<a href="../profil"><?php echo $lang["adminnavigation"]["profile"]; ?></a>
			<a href="./"><?php echo $lang["adminnavigation"]["stats"]; ?></a>
			<a href="../apply"><?php echo $lang["adminnavigation"]["apply"]; ?></a>
			<a href="../../../logout.php" style="color: red;"><?php echo $lang["adminnavigation"]["logout"]; ?></a>
		</div>
	
		</div>
	</div>
</div>

<hr>