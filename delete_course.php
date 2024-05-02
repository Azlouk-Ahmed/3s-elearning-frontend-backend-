<?php
$host = 'localhost';  
$dbname = 'e-learning'; 
$user = 'root';     
$pass = '';        

$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['email']) && !empty($_GET['email'])) {
    
    $course_id = $_GET['id'];
    $email = $_GET['email'];
    
    
    $sql = "DELETE FROM courses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    
    
    if ($stmt->execute()) {
        
        header("Location: admin.php?success=true&email=" . urlencode($email));
        exit;
    } else {
        
        header("Location: admin.php?success=false&email=" . urlencode($email));
        exit;
    }
} else {
    
    header("Location: admin.php?success=false&email=" . urlencode($email));
    exit;
}

$stmt->close();
$conn->close();
?>
