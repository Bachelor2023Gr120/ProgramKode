<?php
// get the user ID from the $_POST array
$user_id = $_GET['user_id'];

// delete the user from the database
$conn = new PDO("mysql:host=192.168.1.25; dbname=usercompanydb",'root', 'passord');
$stmt = $conn->prepare("DELETE FROM user WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

// close the database connection
$conn = null;

// return a response to the AJAX request
header("Location: ../adminPanel.php");
?>