<?php

session_start();

// Check if the user is logged in
if (isset($_SESSION['email'])) {
    // Retrieve user's email from session
    $user_email = $_SESSION['email'];

    // Check if the course ID is provided in the URL parameters
    if (isset($_GET['id'])) {
        // Get the course ID from the URL parameters
        $course_id = $_GET['id'];

        $host = 'localhost';  
        $dbname = 'e-learning'; 
        $user = 'root';     
        $pass = '';

        $conn = new mysqli($host, $user, $pass, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL query to insert into the reservation table
        $stmt = $conn->prepare("INSERT INTO reservation (course_id, user_email) VALUES (?, ?)");
        $stmt->bind_param("is", $course_id, $user_email);
        $stmt->execute();

        // Check if the reservation was successfully inserted
        if ($stmt->affected_rows > 0) {
            echo "Reservation successful!";
            
            // Insert into the history table
            $action = "Reservation";
            $date = date("Y-m-d"); // Current date

            $stmt_history = $conn->prepare("INSERT INTO history (user_id, action, date) VALUES ((SELECT id FROM user WHERE email = ?), ?, ?)");
            $stmt_history->bind_param("sss", $user_email, $action, $date);
            $stmt_history->execute();

            if ($stmt_history->affected_rows > 0) {
                header("Location: coursedetails.php?course_id=$course_id&success=true");
                exit;
            } else {
                echo "Failed to insert history record.";
            }
            $stmt_history->close();
        } else {
            echo "Failed to reserve the course.";
        }
        $stmt->close();
        $conn->close();
    } else {
        echo "Course ID is missing in the URL parameters.";
    }
} else {
    header("Location: login.php");
    exit;
}
?>
