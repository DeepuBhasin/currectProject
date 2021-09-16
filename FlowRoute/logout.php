<?php
session_start() ;
session_destroy() ;
header("location:index.php?page=index&message=Logout Successfully&color=success");
?>