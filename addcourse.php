<?php
$host = 'localhost';  
$dbname = 'e-learning'; 
$user = 'root';    
$pass = '';        

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $_GET['email'];
$title = $_POST['title'];
$image = $_POST['image'];
$due_date = $_POST['due_date'];
$level = $_POST['level'];
$amount = $_POST['amount'];
$places = $_POST['places'];
$lessons = $_POST['lessons'];
$duration = $_POST['duration'];

if ($_FILES['image']['name']) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    
    if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
        echo "error";
    }
    $image = $target_file;
}

$sql = "INSERT INTO `courses`(`title`, `image`, `due_date`, `level`, `amount`, `places`, `lessons`, `duration`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $title, $image, $due_date, $level, $amount, $places, $lessons, $duration);

if ($stmt->execute()) {
    header("Location: admin.php?success=true&email=$email");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
