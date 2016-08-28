<?php
require_once 'check_session.php';
date_default_timezone_set('Asia/Singapore');

if (isset($_POST['blogtitle']) && $_POST['blogtitle'] && isset($_POST['blogcontent']) && $_POST['blogcontent']){
  $blogtitle = htmlspecialchars($_POST['blogtitle']);

  //Whitelist Tags and Attributes from Content
  $dom = new DOMDocument();
  $dom -> loadHTML($_POST['blogcontent']);
  $allowed_tags = array('html','body','h2','h3','h4','h5','strong','b','em','i','p','blockquote','br','pre','ul','ol','li');
  $allowed_attributes = array('id');
  $nodelist = $dom->getElementsByTagName('*');
  foreach($nodelist as $node){
    if(!in_array($node->nodeName,$allowed_tags)){
      $node->parentNode->removeChild($node);
      continue;
    }
    $attributes = $node->attributes;
    for($i=0; $i<$attributes->length; $i++){
      $attribute = $attributes->item($i);
      if(!in_array($attribute->name,$allowed_attributes)){ $node->parentNode->removeChild($node);}
    }
  }
  $blogcontent = htmlspecialchars($dom->saveHTML());   
  $blogdatetime = date('c');

  require 'db_login.php';
  $stmt = $dbh->prepare("INSERT INTO entries (title, author, datetime, content) VALUES (:blogtitle,:blogauthor,:blogdatetime,:blogcontent)");

  if ($stmt->execute(array(':blogtitle'=>$blogtitle, ':blogauthor'=>'cvwo_admin', ':blogdatetime'=>$blogdatetime, 'blogcontent'=>$blogcontent))) {
    echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully'); location.href='../index.php';</script>";
  }else{
    echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.'); location.href=history.go(-1);</script>";
  }
  $dbh = NULL;
} else {
  echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.'); location.href=history.go(-1);</script>";
}

?>
