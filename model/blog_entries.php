<script type="text/javascript">
function ConfirmDelete(id)
  {
    if (confirm("Confirm Delete Entry?"))
      location.href='model/delete_entry.php?id='+id;
  }
</script>

<?php
//Retrieve Blog Entries
require 'model/db_login.php';
$stmt = $dbh->prepare("SELECT * FROM entries ORDER BY datetime");
$stmt->execute();
$entries = $stmt->fetchAll();
$entries = array_reverse($entries,TRUE);
$dbh = NULL;
foreach ($entries as $entry){
echo '
          <div class="blog-post">
            <h2 class="blog-post-title">'.$entry['title'].'</h2>
            <p class="blog-post-meta">'.date_format(date_create($entry['datetime']),'d/m/y g:h A').' by '.$entry['author'].'</p>
            <p>'.htmlspecialchars_decode($entry['content']).'</p>
	    ';//Delete option appear if logged in
            if(isset($_SESSION["AUTH"]) && $_SESSION["AUTH"] == 1){ echo '<input type="button" class="form-control" onclick="ConfirmDelete('.$entry['id'].')" value="Delete Entry">
          ';}echo '</div>';
}
?>
