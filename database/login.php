<?php
  require ('DbConnection.php');
session_start(); // start session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  echo "pwd::".$password."email::".$email;
  // connect to the database
  $newObj = new DBConnection();
  $conn = $newObj->getConnection();
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // query the database for the user with the given email and password
  // $sqlpwd = "SELECT pwd FROM users WHERE email='$email'";
  $sql = "SELECT * FROM users WHERE email='$email'";

  $result = $conn->query($sql);
  // $result2 =$conn->query($sqlpwd);
  // echo "result: " . var_dump($result);
  $user = mysqli_fetch_assoc($result);
  echo "user: " . var_dump($user);
if($user){
  if(password_verify($password,$user['pwd'])){
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $user['id'];
    $_SESSION['connected'] = true; // save email in session
    header("Location: ../dashboard.php"); // re
  }else{
    echo "Invalid email or password";
  }
}else{
  echo "User Not found";
}
  mysqli_close($conn);
}
?>


