<?php

require("../../includes/global.php");

//required directory
require('../../db/database.php');

include('../../classes/user.php');
include('../../classes/phpmailer/mail.php');
$user = new User($db);


if(!empty($config["database"]["minecraft"])) { //check if mc-server is enabled in the config
    if ($db->query ("DESCRIBE minecraft"  )) {
        //Connect to the Database for MC-Server integration
        echo "tabel is available: ";
        echo(rand(10,100));
        

    } else {
        //If the db table for the MC-Server doesn't exists do nothing
    }

}else{
	
	echo 'MC - Server not used! See -> ./includes/global.php';
}
