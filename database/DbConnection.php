<?php

class DBConnection{
private $servername = "localhost"; 
private $username = "root"; 
private $password = ""; 
private $dbname = "blog"; 
private $conn;
function __construct(){
  $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
}
// Create connection

// Check connection
function getConnection(){
  if (!$this->conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // echo "Connected successfully";
  return $this->conn;
}
// $sql = "CREATE TABLE users (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   username VARCHAR(30) NOT NULL,
//   pwd VARCHAR(255) NOT NULL,
//   email VARCHAR(50) NOT NULL,
//   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//   )";

// $sqlPosts ="CREATE TABLE posts (
//   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   title VARCHAR(100) NOT NULL,
//   description TEXT NOT NULL,
//   user_id INT(6) UNSIGNED NOT NULL,
//   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   FOREIGN KEY (user_id) REFERENCES users(id)
// )";

// if ($conn->query($sql) === TRUE &&$conn->query($sqlPosts) === TRUE ) {
//   echo "Tables created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }
}


// $conn->close();
?>