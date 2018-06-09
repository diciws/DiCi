<?php
require('db/normal_import.php');
require('includes/global.php');
require('assets/language/'.$config["settings"]["language"].'.php'); //get language

$memberID = trim($_GET['x']);
$active = trim($_GET['y']);

if(is_numeric($memberID) && !empty($active)){

	$stmt = $db->prepare("UPDATE mitglieder SET active = 'Yes' WHERE memberID = :memberID AND active = :active");
	$stmt->execute(array(
		':memberID' => $memberID,
		':active' => $active
	));

	if($stmt->rowCount() == 1){

		header('Location: login.php?action=active');
		exit;

	} else {
		echo $lang["activate"]["errorverify"]; 
	}
	
}
?>