<?php
$host = 'localhost';  
$dbname = 'e-learning'; 
$user = 'root';     
$pass = '';        

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the course ID and email are provided in the URL
if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['email']) && !empty($_GET['email'])) {
    // Get the course ID and email from the URL
    $course_id = $_GET['id'];
    $email = $_GET['email'];
    
    // Prepare SQL statement to delete the course
    $sql = "DELETE FROM courses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    
    // Execute the SQL statement
    if ($stmt->execute()) {
        // Redirect back to admin.php with success message and email parameter
        header("Location: admin.php?success=true&email=" . urlencode($email));
        exit;
    } else {
        // Redirect back to admin.php with error message and email parameter
        header("Location: admin.php?success=false&email=" . urlencode($email));
        exit;
    }
} else {
    // Redirect back to admin.php if course ID or email is not provided
    header("Location: admin.php?success=false&email=" . urlencode($email));
    exit;
}

$stmt->close();
$conn->close();
?>
