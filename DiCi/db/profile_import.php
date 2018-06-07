<?php

require('database.php');

include('../../../classes/user.php');
include('../../../classes/phpmailer/mail.php');
$user = new User($db);

?>