<?php 
//If signed in, show "Home", "Create Entry" & "Logout" Tabs
//Else, show "Home" & "Signin" Tabs
echo '
    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item'; if ($current=='blog'){ echo ' active';} echo'" href="index.php">Home</a>';
	  if(isset($_SESSION["AUTH"]) && $_SESSION["AUTH"] == 1){ echo '<a class="blog-nav-item'; if ($current=='new_entry'){ echo ' active';} echo'" href="new_entry.php">Create Entry</a>
          <a class="blog-nav-item" href="model/logout.php?logout">Log Out</a>';
          } else { echo '<a class="blog-nav-item" href="login.php">Sign in</a>';}
        echo' </nav>
      </div>
    </div>
';
?>
