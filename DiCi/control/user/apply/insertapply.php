<?php

	include('../../../db/profile_import.php'); 
	include('../../../includes/global.php');

	$ipadress  = $_SERVER['REMOTE_ADDR'];
	
	$loginname = $_SESSION['username'];
	$referenz = htmlentities($_POST['referenz'], ENT_QUOTES, "UTF-8");
	$devbereich = htmlentities($_POST['devbereich'], ENT_QUOTES, "UTF-8");
	$warumbewirbst = htmlentities($_POST['warumbewirbst'], ENT_QUOTES, "UTF-8");
	$bewerbung = htmlentities($_POST['bewerbung'], ENT_QUOTES, "UTF-8");
	$skills = htmlentities($_POST['skills'], ENT_QUOTES, "UTF-8");
	$abschlswort = htmlentities($_POST['abschlswort'], ENT_QUOTES, "UTF-8");

    //MYSQL
    try {
        $sql = "INSERT INTO devbewerber (name, ipadress, referenz, devbereich, warumbewirbst, bewerbung, skills, abschlswort) VALUES (:name, :ipadress, :referenz, :devbereich, :warumbewirbst, :bewerbung, :skills, :abschlswort)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array("name" => $loginname, "ipadress" => $ipadress, "referenz" => $referenz, "devbereich" => $devbereich, "warumbewirbst" => $warumbewirbst, "bewerbung" => $bewerbung, "skills" => $skills, "abschlswort" => $abschlswort));
    } catch (PDOException $e) {
        echo "Ein Datenbankfehler ist aufgetreten.";
    }

	header("Location: ../");

?>