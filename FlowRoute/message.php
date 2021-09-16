<?php
if(isset($_GET['page']))
{
$message=htmlentities(stripslashes(trim($_GET['message'])));
$page=htmlentities(stripslashes(trim($_GET['page'])));
$color=htmlentities(stripslashes(trim($_GET['color'])));	
	
	if($page=='index')
	{
?>
	<div class="alert alert-<?= $color?>">
      <strong><?php echo urldecode($message);?></strong>
    </div>

 <?php 
	}
}
 ?>   