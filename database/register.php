<?php
require ('DbConnection.php');
$newObj = new DBConnection();
$myDB = $newObj->getConnection();
// Get the user's input from the registration form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
// $conn = mysqli_connect("localhost", "root","", "blog");
$pwd_hashed = password_hash($password,PASSWORD_DEFAULT);
// Insert the user's data into the database
$sql = "INSERT INTO users (username, email, pwd) VALUES ('$username', '$email', '$pwd_hashed')";

if ($myDB->query($sql) === TRUE) {
    header("Location: ../login.php");
} else {
    echo "Error: " . $sql . "<br>" . $myDB->error;
}

$myDB->close();
?>