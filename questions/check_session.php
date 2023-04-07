<?php 
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
          //If not redirect to the login page
    header("Location: ../Linked-page/login-form.html"); 
    exit();
}
?>
