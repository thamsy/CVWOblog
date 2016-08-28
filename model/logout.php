<?php

session_start();

if (isset($_GET["logout"])){
        session_unset();
	session_destroy();
	echo "<script type= 'text/javascript'>alert('Successfully Logged Out'); location.href='../index.php';</script>";
}

?>
