<?php 
session_start();
$_SESSION["user_id"] = "";
$_SESSION["name"] = "";
session_destroy();
header("Location: ../index.php");
?>