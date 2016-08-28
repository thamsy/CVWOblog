<?php
$timeout_duration = 3600;
ini_set('session.gc_maxlifetime', $timeout_duration);
session_start();

if (isset($_POST["useremail_input"]) && isset($_POST["pw_input"])){
	require 'db_login.php';

	$stmt = ($dbh->prepare('SELECT pw_hash FROM accounts WHERE useremail = :user_input'));
	$stmt->bindParam(':user_input', $user_input);

	$user_input = mysql_real_escape_string($_POST["useremail_input"]);
	$pw_input = mysql_real_escape_string($_POST["pw_input"]);

	$stmt->execute();
	$results = $stmt->fetch();
        $dbh = NULL;
	if (password_verify($pw_input,$results['pw_hash'])){
		session_regenerate_id(true);
		$_SESSION["AUTH"] = 1; //Determining that session is authenticated
		$_SESSION['LAST_ACTIVITY'] = time(); //To timeout session
		$_SESSION['CREATED'] = time(); //To refresh Session ID
		header("Location: ../index.php");
	}
	else{
		$_SESSION["AUTH"] = 0;
		header("Location: ../login.php");
	}
	session_write_close();
}

?>


