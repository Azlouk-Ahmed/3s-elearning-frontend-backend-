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
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $location = $_POST['location'];
    $course_level = $_POST['course_level'];
    $participating_in = $_POST['participating_in'];
    $reserve_for = $_POST['reserve_for'];
    $additional_notes = $_POST['additional_notes'];
    $course_id = $_GET['course_id'];

    $stmt = $conn->prepare("INSERT INTO course_request (name, address, phone_number, start_date, end_date, location, course_level, participating_in, reserve_for, additional_notes, course_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssi", $name, $address, $phone_number, $start_date, $end_date, $location, $course_level, $participating_in, $reserve_for, $additional_notes, $course_id);

    if ($stmt->execute()) {
        header("Location: courses.php?success=true&email=$email");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
