<div class="container">

	<div class="row">
		<h2>Mod - Interface</h2>
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
			<a href="./">Startseite</a>
			<a href="./profil">Profil</a>
			<a href="./stats">Stats</a>
			<a href="./apply">Bewerbungen</a>
			<a href="../../logout.php" style="color: red;">logout</a>
		</div>
	
		</div>
	</div>
</div>

<hr>