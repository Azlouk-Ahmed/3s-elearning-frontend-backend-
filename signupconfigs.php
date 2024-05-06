<?php
$host = 'localhost';  
$dbname = 'e-learning'; 
$user = 'root';    
$pass = '';        


$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$username = $_POST['username']; $email = $_POST['email']; $password =
$_POST['password']; $confirm_password = $_POST['confirm_password']; if
($password !== $confirm_password) { echo "Passwords do not match."; exit; } $sql
= "SELECT id FROM user WHERE email = ?"; $stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email); $stmt->execute(); $result = $stmt->get_result();
if ($result->num_rows > 0) { echo "Email already in use."; } else { $sql =
"INSERT INTO `user`(`name`, `email`, `password`) VALUES (?, ?, ?)"; $stmt =
$conn->prepare($sql); $stmt->bind_param("sss", $username, $email, $password); if
($stmt->execute()) { header("Location: profil.php?email=$email"); exit; } else {
echo "Error: " . $stmt->error; } } $stmt->close(); $conn->close(); ?>
