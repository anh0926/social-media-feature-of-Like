<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Drop database if required
$sql = 'DROP DATABASE myDB';
$conn->query($sql);

// Create database
$sql = "Create DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully <br />";
} else {
  echo "Error creating database: " . $conn->error;
}
// Use DATABASE
// Change db to "myDB" db
$conn -> select_db("myDB");
// sql to create table users
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(200) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table users created successfully <br />";
} else {
  echo "Error creating table users: " . $conn->error;
}
//create users and hash password 
$user1 = 'Anh';
$password_user1 = 'anh0926';
$hashed_password_user1 = password_hash($password_user1, PASSWORD_DEFAULT);

$user2 = 'Gau';
$password_user2 ='gau0926';
$hashed_password_user2 = password_hash($password_user2, PASSWORD_DEFAULT);

// Insert data into the table users

$sql = "INSERT INTO users (username, password)
VALUES ('$user1', '$hashed_password_user1'),
       ('$user2', '$hashed_password_user2')";

if ($conn->query($sql) === TRUE) {
  echo "<br>New record of users created successfully <br />";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//create table posts: 
$sql = "CREATE TABLE posts (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
text VARCHAR(30) ,
likes INT(11)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table posts created successfully <br />";
} else {
  echo "Error creating table posts: " . $conn->error;
}
// Insert data into the table post
$sql = "INSERT INTO posts (id, text) VALUES
	(1, 'first post'),
	(2, 'second post')";

if ($conn->query($sql) === TRUE) {
  echo "<br>New record of table posts created successfully <br />";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



//create table rating_info: 
$sql = "CREATE TABLE rating_info (
user_id INT(11) NOT NULL UNIQUE,
post_id INT(11) NOT NULL UNIQUE,
rating_action  VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table rating_info created successfully <br />";
} else {
  echo "Error creating table rating_info: " . $conn->error;
}


   // close the db conn
$conn->close();
?>