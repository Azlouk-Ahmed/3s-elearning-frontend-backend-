<?php
session_start(); 

$host = 'localhost';  
$dbname = 'e-learning'; 
$user = 'root';    
$pass = '';        

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_SESSION['role'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $img_path = $_POST['profileimage'];
    echo "img = $img_path";
    
    if ($_FILES['profile_image']['name']) {
        $target_dir = "uploads/"; 
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        
        if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            header("Location: editprofile.php?upload_error=true");
            exit();
        }
        $img_path = $target_file;
    }

    
    $stmt = $conn->prepare("UPDATE user SET name=?, lastname=?, phone_number=?, date_of_birth=?, gender=?, img=? WHERE email=?");
    $stmt->bind_param("sssssss", $name, $lastname, $phone_number, $date_of_birth, $gender, $img_path, $email);

    
    $success = $stmt->execute();

    
    $stmt->close();

    
    if ($success) {
        $_SESSION['email'] = $email;
        $_SESSION['profile_image'] = $img_path;
        $_SESSION['name'] = $name;
        if($role == 0) {
            header("Location: profil.php?email=$email&success=true");
            exit();

        }
        else {
            header("Location: admin.php?email=$email&success=true");
            exit();


        }
    } else {
        
        header("Location: editprofile.php?success=false");
        exit();
    }
}
?>