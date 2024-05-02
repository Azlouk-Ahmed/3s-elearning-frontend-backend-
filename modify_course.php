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

$id = $_GET['id'];
$email = $_GET['email'];

$sql = "SELECT * FROM courses WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $course = $result->fetch_assoc();
} else {
    echo "Course not found";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Course</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/normalise.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="center mt4">


    <div class="title">Modify Course</div>
    <form action="update_course.php?email=<?php echo urlencode($email); ?>" class="df-c mt4" method="POST" class="df-c container" enctype="multipart/form-data" style="width: 67vh;">
        <input type="hidden" name="id" value="<?php echo $course['id']; ?>">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">



        <div class="input-txt-div">
        <input type="text" id="title" name="title" value="<?php echo $course['title']; ?>"  placeholder="Name" autocomplete="off" id="title">
        <label for="title">Title</label>
        </div>



        <div class="input-txt-div">
                <input type="file" id="image" style="
            padding: 12px 17px;
            display: flex;
        " accept="image/*" value="<?php echo $course['image']; ?>" name="image" placeholder="Image URL" autocomplete="off" required>
                <label for="image">Image URL</label>
            </div>


        <div class="input-txt-div">
            <input type="date" id="due_date" name="due_date" value="<?php echo $course['due_date']; ?>" required>
            <label for="due_date">Due Date</label>
        </div>

        <select id="level" name="level" required>
            <option value="beginner" <?php if ($course['level'] == 'beginner') echo 'selected'; ?>>Beginner</option>
            <option value="intermediate" <?php if ($course['level'] == 'intermediate') echo 'selected'; ?>>Intermediate</option>
            <option value="advanced" <?php if ($course['level'] == 'advanced') echo 'selected'; ?>>Advanced</option>
        </select><br>

        <div class="input-txt-div">
            <input type="number" id="amount" placeholder="Amount" value="<?php echo $course['amount']; ?>" name="amount" step="0.01" required>
            <label for="amount">Amount</label>
        </div>





        <div class="input-txt-div">
            <input type="number" id="places" placeholder="Amount" value="<?php echo $course['places']; ?>"  name="places" required>
            <label for="places">Places</label>
        </div>



        
        <div class="input-txt-div">
            <input type="number" id="lessons" placeholder="Amount" value="<?php echo $course['lessons']; ?>" name="lessons" required>
            <label for="lessons">Lessons</label>
        </div>




        <div class="input-txt-div">
        <input type="number" id="duration" placeholder="Amount" value="<?php echo $course['duration']; ?>" name="duration" required>
        <label for="duration">Duration (in hours)</label>
    </div>

    <input type="submit" class="btn w-100" value="Submit">
    </form>

    </div>
</body>
</html>
