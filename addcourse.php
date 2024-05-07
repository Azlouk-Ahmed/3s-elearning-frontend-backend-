<?php
$host = 'localhost';
$dbname = 'e-learning';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Course Details
    $email = $_GET['email'];
    $title = $_POST['title'];
    $cover = uploadFile('cover', 'uploads/');
    $instructorname = $_POST['instructorname'];
    $category = $_POST['category'];
    $overview = $_POST['overview'];
    $will_learn = $_POST['will_learn'];
    $certification = $_POST['certification'];
    $curruculam = $_POST['curruculam'];
    $reviews = $_POST['reviews'];
    $inst_img = uploadFile('inst_img', 'uploads/');

    // Insert into course_details
    $stmt = $conn->prepare("INSERT INTO `course_details`(`cover`, `instructorname`, `category`, `overview`, `will_learn`, `certification`, `curruculam`, `reviews`, `inst_img`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $cover, $instructorname, $category, $overview, $will_learn, $certification, $curruculam, $reviews, $inst_img);
    $stmt->execute();
    $course_details_id = $stmt->insert_id;

    // Course
    $image = uploadFile('image', 'uploads/'); // Uploading image
    $due_date = $_POST['due_date'];
    $level = $_POST['level'];
    $amount = $_POST['amount'];
    $places = $_POST['places'];
    $lessons = $_POST['lessons'];
    $duration = $_POST['duration'];

    // Insert into courses
    $stmt = $conn->prepare("INSERT INTO `courses`(`course_details_id`, `title`, `image`, `due_date`, `level`, `amount`, `places`, `lessons`, `duration`, `category`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssssss", $course_details_id, $title, $image, $due_date, $level, $amount, $places, $lessons, $duration, $category);
    if ($stmt->execute()) {
        header("Location: admin.php?success=true&email=$email");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}




function uploadFile($inputName, $targetDir) {
    $targetFile = $targetDir . basename($_FILES[$inputName]["name"]);
    if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
        return $targetFile;
    } else {
        return null;
    }
}

$conn->close();
?>
