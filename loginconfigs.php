<?php
$host = 'localhost';  
$dbname = 'e-learning'; 
$user = 'root';    
$pass = '';        
session_start();
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email']; 
$password = $_POST['password']; 

echo "email $email password $password";

$sql = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: login.php?email=false");
} else {
    $row = $result->fetch_assoc();
    if ($password === $row['password']) {
        $_SESSION['profile_image'] = $row['img'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $row['role'];
        if($row['role'] == 0){
            header("Location: profil.php?email=$email");
           exit;
        }else {
            header("Location: admin.php?email=$email");
            exit;

        }
    } else {
        header("Location: login.php?pw=false");
    }
}

$stmt->close();
$conn->close();
?>
