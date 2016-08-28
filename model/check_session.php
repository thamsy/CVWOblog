<?php

session_start();

$timeout_duration = 3600;

//Check Last activity time --> session destroy or refresh
if (isset($_SESSION['LAST_ACTIVITY'])){
    if(time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration) {
        session_unset();
        session_destroy();
    } else {
        $_SESSION['LAST_ACTIVITY'] = time();
    }
}

//Refresh Session after a set amount of time
if (isset($_SESSION['CREATED']) && time() - $_SESSION['CREATED'] > $timeout_duration) {
    session_regenerate_id(true);
    $_SESSION['CREATED'] = time();
}

//If not auth, go back to 
if(!isset($_SESSION["AUTH"]) || $_SESSION["AUTH"]!=1){
    header("Location: login.php");
    exit();
}

?>
