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

$id = $_POST['id'];
$email = $_POST['email'];
echo "email = $email";
$title = $_POST['title'];
$due_date = $_POST['due_date'];
$level = $_POST['level'];
$amount = $_POST['amount'];
$places = $_POST['places'];
$lessons = $_POST['lessons'];
$duration = $_POST['duration'];

$image = $_FILES['image']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = "uploads/" . basename($_FILES["image"]["name"]); // Corrected concatenation
    echo "The file ". basename($_FILES["image"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}


$sql = "UPDATE courses SET title = ?, image = ?, due_date = ?, level = ?, amount = ?, places = ?, lessons = ?, duration = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssddddd", $title, $image, $due_date, $level, $amount, $places, $lessons, $duration, $id);

if ($stmt->execute()) {
    echo "succ";
    header("Location: admin.php?success=true&email=$email");
    exit;
} else {
    header("Location: admin.php?success=false&email=$email");
    echo "error";
    exit;
}

$stmt->close();
$conn->close();

?>
