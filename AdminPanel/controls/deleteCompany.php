<?php
// get the user ID from the $_POST array
$company_id = $_GET['company_id'];

// delete the user from the database
$conn = new PDO("mysql:host=192.168.1.25; dbname=usercompanydb",'root', 'passord');
$stmt = $conn->prepare("DELETE FROM company WHERE company_id = :company_id");
$stmt->bindParam(':company_id', $company_id);
$stmt->execute();

// close the database connection
$conn = null;

// return a response to the AJAX request
header("Location: ../adminPanel.php");
?>