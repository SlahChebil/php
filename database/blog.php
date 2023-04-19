<?php
session_start();
require ('DbConnection.php');
$newObj = new DBConnection();
$conn = $newObj->getConnection();
// Get the user's input from the registration form
$title = $_POST['title'];
$description = $_POST['description'];
$email = $_SESSION['email'];

$sqluser = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sqluser);
$user = mysqli_fetch_assoc($result);
// Insert the user's data into the database
$id_user = $user['id'];

$sql = "INSERT INTO posts (title, description, user_id) VALUES ('$title', '$description', '$id_user')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>