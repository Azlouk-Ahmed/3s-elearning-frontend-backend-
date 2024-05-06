<?php
$host = 'localhost';  
$dbname = 'e-learning'; 
$user = 'root';     
$pass = ''; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $phone_number = $_POST['phone_number'];
        $message = $_POST['message'];

        // Prepare SQL statement to insert data into contact table
        $sql = "INSERT INTO contact (username, email_address, subject, phone_number, message) 
                VALUES (:username, :email, :subject, :phone_number, :message)";
        
        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':message', $message);

        // Execute the SQL statement
        $stmt->execute();

        // Redirect back to the form page with success message
        header("Location: contact.php?success=true");
        exit();
    } else {
        // If form is not submitted, redirect back to the form page
        echo "error";
    }
} catch(PDOException $e) {
    // Display error message if unable to connect to database
    echo "Connection failed: " . $e->getMessage();
}
?>
