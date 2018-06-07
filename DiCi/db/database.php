<?php
ob_start();
session_start();

date_default_timezone_set('Europe/London');

define('DBHOST','localhost');
define('DBUSER','Username');
define('DBPASS','Password');
define('DBNAME','DiCi_System');

define('DIR','http://dici.ws/DiCi/');
define('SITEEMAIL','tgdici004@gmail.com');

try {

	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

?>
