<?php
require_once "model/check_session.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="static/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="static/css/blog.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="static/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php
//Determine Nav Pointer
$current = 'new_entry';
include 'nav.php';
?>
    <div class="container">
      <div class="blog-header">
        <h2 class="blog-title">New Blog Entry</h2>
      </div>

<form class='form_group' role="form" action='model/submit_new_entry.php' method=POST>
  <div class="form-group">
    <label for="blogtitle">Title:</label>
    <input type='text' class='form-control' id='blogtitle' name='blogtitle' autofocus required></textarea>
  </div>
  <div class="form-group">
    <label for="blogcontent">Type Entry (in html):</label>
    <textarea class='form-control' id='blogcontent' rows=20 name='blogcontent' required></textarea>
    <p>Allowed Tags: 'html','body','h2','h3','h4','h5','strong','b','em','i','p','blockquote','br','pre','ul','ol','li'</p>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-default">Post Entry</button>
  </div>
</form>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="static/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="static/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
