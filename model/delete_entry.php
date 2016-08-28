<?php
require_once 'check_session.php';

if(isset($_GET['id']) && ctype_digit($_GET['id'])){
  require 'db_login.php';
  $stmt = $dbh->prepare("DELETE FROM entries where id=:id");
  $stmt->execute(array('id'=>$_GET['id']));
  $dbh = NULL;
}

header("Location: ../index.php");

?>
