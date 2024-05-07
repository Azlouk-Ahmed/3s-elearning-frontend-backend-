<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/normalise.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_SESSION['name'])) {
    // If session exists, display user's name and image
    $email = $_SESSION['email'];
} else {
    // If session doesn't exist, redirect to the login page
    header("Location: login.php");
    exit;
}

// Select user information
$sql_user = "SELECT * FROM user WHERE email = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("s", $email);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

// Fetch user information
$user = $result_user->fetch_assoc();

$stmt_user->close();

// Select all messages from contact table
$sql_contact = "SELECT * FROM contact";
$result_contact = $conn->query($sql_contact);

// Fetch all contact messages
$contact_messages = $result_contact->fetch_all(MYSQLI_ASSOC);

// Select all course requests
$sql_course_request = "SELECT * FROM course_request";
$result_course_request = $conn->query($sql_course_request);

// Fetch all course requests
$course_requests = $result_course_request->fetch_all(MYSQLI_ASSOC);

// Select all reservations
$sql_reservation = "SELECT * FROM reservation";
$result_reservation = $conn->query($sql_reservation);

// Fetch all reservations
$reservations = $result_reservation->fetch_all(MYSQLI_ASSOC);

// Display success or error message if set
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    echo '<div class="success df "><img src="img/sucess.png"> Successfully updated info</div>';
} elseif (isset($_GET['success']) && $_GET['success'] == 'false') {
    echo '<div class="success error df tw "><img src="img/error.png"> Oops, something went wrong</div>';
}

// Fetch all courses
$sql_courses = "SELECT * FROM courses";
$result_courses = $conn->query($sql_courses);

?>



<div class="progress-wrap float">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
    <div class="header container bg">
      <div>
        <svg
          width="12"
          height="16"
          viewBox="0 0 12 16"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M5.38338 15.6772C0.842813 9.09472 0 8.41916 0 6C0 2.68628 2.68628 0 6 0C9.31372 0 12 2.68628 12 6C12 8.41916 11.1572 9.09472 6.61662 15.6772C6.31866 16.1076 5.68131 16.1076 5.38338 15.6772ZM6 8.5C7.38072 8.5 8.5 7.38072 8.5 6C8.5 4.61928 7.38072 3.5 6 3.5C4.61928 3.5 3.5 4.61928 3.5 6C3.5 7.38072 4.61928 8.5 6 8.5Z"
            fill="#703BF7"
          />
        </svg>
        Menzel Abderrahman Bizerte, 7035
      </div>
      <div class="df">
        <div class="df">
          <svg
            width="17"
            height="16"
            viewBox="0 0 17 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M16.2348 11.306L12.7348 9.80597C12.5853 9.74225 12.4192 9.72882 12.2613 9.76771C12.1035 9.8066 11.9626 9.8957 11.8598 10.0216L10.3098 11.9153C7.87726 10.7684 5.91959 8.81073 4.77266 6.37815L6.66641 4.82815C6.79256 4.72555 6.88184 4.58465 6.92075 4.42676C6.95966 4.26888 6.94606 4.10262 6.88203 3.95315L5.38203 0.453154C5.31175 0.292032 5.18746 0.160481 5.03058 0.081185C4.8737 0.00188911 4.69407 -0.0201814 4.52266 0.0187791L1.27266 0.768779C1.1074 0.806941 0.959952 0.899991 0.854386 1.03274C0.74882 1.16549 0.691368 1.33011 0.691406 1.49972C0.691406 9.51534 7.18828 15.9997 15.1914 15.9997C15.3611 15.9998 15.5258 15.9424 15.6586 15.8368C15.7914 15.7313 15.8845 15.5838 15.9227 15.4185L16.6727 12.1685C16.7114 11.9962 16.6888 11.8159 16.6089 11.6585C16.529 11.501 16.3967 11.3764 16.2348 11.306Z"
              fill="#703BF7"
            />
          </svg>
          +216 51 717 722
        </div>
        <div class="df">
          <svg
            width="17"
            height="12"
            viewBox="0 0 17 12"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M15.7555 3.9625C15.8773 3.86563 16.0586 3.95625 16.0586 4.10938V10.5C16.0586 11.3281 15.3867 12 14.5586 12H1.55859C0.730469 12 0.0585938 11.3281 0.0585938 10.5V4.1125C0.0585938 3.95625 0.236719 3.86875 0.361719 3.96562C1.06172 4.50937 1.98984 5.2 5.17734 7.51562C5.83672 7.99687 6.94922 9.00938 8.05859 9.00313C9.17422 9.0125 10.3086 7.97813 10.943 7.51562C14.1305 5.2 15.0555 4.50625 15.7555 3.9625ZM8.05859 8C8.78359 8.0125 9.82734 7.0875 10.3523 6.70625C14.4992 3.69688 14.8148 3.43437 15.7711 2.68437C15.9523 2.54375 16.0586 2.325 16.0586 2.09375V1.5C16.0586 0.671875 15.3867 0 14.5586 0H1.55859C0.730469 0 0.0585938 0.671875 0.0585938 1.5V2.09375C0.0585938 2.325 0.164844 2.54062 0.346094 2.68437C1.30234 3.43125 1.61797 3.69688 5.76484 6.70625C6.28984 7.0875 7.33359 8.0125 8.05859 8Z"
              fill="#703BF7"
            />
          </svg>
          contact@3s-spring.tn
        </div>
      </div>
    </div>
    <nav class="nav--bar df container">
      <img src="img/Layer_2.png" alt="" class="layer" srcset="" />
      <div class="links df" id="links">
      <a href="landing.php">Home</a><a href="about.php">About Us</a><a href="courses.php">Courses</a
          ><a href="blog.php">Blog</a><a href="contact.php">Contact Us</a>
      </div>
      <div class="nav-profile df">
        <?php if (!empty($user['img'])): ?>
        <img src="<?php echo $user['img']; ?>" alt="Profile Image">
        <?php else: ?>
        <img src="img/profil.png" alt="Profile Image">
        <?php endif; ?>
        <div class="name">
            <?php if ($_SESSION['role'] == 0): ?>
                <a href="profil.php?email=<?php echo $email ?>"><?php echo $user['name']; ?></a>
            <?php else: ?>
                <a href="admin.php"><?php echo $user['name']; ?></a>
            <?php endif; ?>
        </div>
        <div class="btn">
            <a href="logout.php">logout</a>
        </div>
    </div>
      <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 6.5H19V8H5V6.5Z" fill="#703BF7"/>
        <path d="M5 16.5H19V18H5V16.5Z" fill="#703BF7"/>
        <path d="M5 11.5H19V13H5V11.5Z" fill="#703BF7"/>
        </svg>
        <div class="night-mode-button">
          <input type="checkbox" class="checkbox" id="night-mode">
          <label for="night-mode" class="label">
            <svg  class="fa-moon"  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
     viewBox="0 0 56 56" xml:space="preserve">
    <path style="fill:#A5A5A4;" d="M29,28c0-11.917,7.486-22.112,18-26.147C43.892,0.66,40.523,0,37,0C21.561,0,9,12.561,9,28
    s12.561,28,28,28c3.523,0,6.892-0.66,10-1.853C36.486,50.112,29,39.917,29,28z"/>
    </svg>
    <svg  width="30px" class="fa-sun" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
     viewBox="0 0 52 52" xml:space="preserve">
    <ellipse style="fill:#EEAF4B;" cx="26" cy="26" rx="22.5" ry="26"/>
    <path style="fill:#F0C419;" d="M26,48C15.799,48,7.5,38.131,7.5,26S15.799,4,26,4s18.5,9.869,18.5,22S36.201,48,26,48z"/>
    <path style="fill:#F3D55B;" d="M26,35c-2.543,0-5.5-3.932-5.5-9s2.957-9,5.5-9s5.5,3.932,5.5,9S28.543,35,26,35z"/>
    </svg>
            <div class="blob"></div>
          </label>
        </div>
    </nav>
      <div class="title ta-c"> hello admin</div>
      <form class="center container" action="editprofile.php?role='1'" method="post" enctype="multipart/form-data">
    <div class="editprofil container gap-3 df fx-s">
        <div class="df-c ai-c img">
            <?php if (!empty($user['img'])): ?>
                <img class="profileimg" src="<?php echo $user['img']; ?>" alt="Profile Image">
            <?php else: ?>
                <img src="img/profil.png" class="profileimg" alt="Default Image">
            <?php endif; ?>
            <span class="ta-c cp" id="importImage">import image</span>
            <input type="file" id="fileInput" name="profile_image" value="<?php echo $user['img']; ?>" style="display : none">
            <input type="text" id="ninjainput" name="profileimage" value="<?php echo $user['img']; ?>" style="opacity: 0; visiblity : hidden">
        </div>
        <div class="df-c gap-3">
            <div class="input__container" id="input">
                <div class="input-txt-div">
                    <input type="text" name="name"  placeholder="Name" autocomplete="off" id="name" value="<?php echo $user['name']; ?>">
                    <label for="name">Name</label>
                </div>
            </div>
            <div class="input__container" id="input">
                <div class="input-txt-div">
                    <input type="text" name="phone_number" placeholder="Phone Number" autocomplete="off" id="phone_number" value="<?php echo $user['phone_number']; ?>">
                    <label for="phone_number">Phone Number</label>
                </div>
            </div>
            <div class="df">
                <label for="dateofbirth">Date Of Birth</label>
                <input type="date" name="dateofbirth" id="dateofbirth" value="<?php echo $user['date_of_birth']; ?>">
            </div>
            <select name="gender" class="w-50" id="gender">
                <option value="">Gender</option>
                <option value="male" <?php if ($user['gender'] == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if ($user['gender'] == 'female') echo 'selected'; ?>>Female</option>
            </select>
        </div>
        <div class="df-c gap-3">
            <div class="input__container" id="input">
                <div class="input-txt-div">
                    <input type="text" name="lastname" placeholder="Last Name" autocomplete="off" id="lastname" value="<?php echo $user['lastname']; ?>">
                    <label for="lastname">Last Name</label>
                </div>
            </div>
            <div class="input__container" id="input">
                <div class="input-txt-div">
                    <input type="email" name="email" placeholder="Email" autocomplete="off" id="email" value="<?php echo $user['email']; ?>">
                    <label for="email">Email</label>
                </div>
            </div>
        </div>
    </div>
    <button class="btn w-50">edit info</button>
</form>

<div class="container center">
    <div class="title">add a course</div>
    <form action="addcourse.php?email=<?php echo urlencode($email); ?>" class="df-c container adminform" enctype="multipart/form-data" style="width: 67vh;" method="POST">
    <!-- Course Details -->
    <div class="input-txt-div">
        <input type="text" name="title" placeholder="Name" autocomplete="off" id="title">
        <label for="title">Title</label>
    </div>

    <div class="input-txt-div">
        <input type="file" id="cover" name="cover" placeholder="Cover" required>
        <label for="cover">Cover</label>
    </div>
    <select class="w-100" name="category" required>
        <option value="Business">Business</option>
        <option value="Development">Development</option>
        <option value="Marketing">Marketing</option>
        <option value="Finance">Finance</option>
        <option value="Design">Design</option>
        <option value="Data Science">Data Science</option>
    </select>

    <div class="input-txt-div">
        <input type="text" id="instructorname" name="instructorname" placeholder="Instructor Name" required>
        <label for="instructorname">Instructor Name</label>
    </div>

    <div class="input-txt-div">
        <input type="text" id="overvie" name="overview" placeholder="Overview">
        <label for="overvie">Overview</label>
    </div>

    <div class="input-txt-div">
        <input type="text" id="will_learn" name="will_learn" placeholder="What You'll Learn" required>
        <label for="will_learn">What You'll Learn</label>
    </div>

    <div class="input-txt-div">
        <input type="text" id="certification" name="certification" placeholder="Certification" required>
        <label for="certification">Certification</label>
    </div>

    <div class="input-txt-div">
        <input type="text" id="curruculam" name="curruculam" placeholder="Curriculum" required>
        <label for="curruculam">Curriculum</label>
    </div>

    <div class="input-txt-div">
        <input type="text" id="reviews" name="reviews" placeholder="Reviews" required>
        <label for="reviews">Reviews</label>
    </div>

    <div class="input-txt-div">
        <input type="file" id="inst_img" name="inst_img" placeholder="Instructor Image" required>
        <label for="inst_img">Instructor Image</label>
    </div>

    <!-- Course -->
    <div class="input-txt-div">
        <input type="date" id="due_date" name="due_date" required>
        <label for="due_date">Due Date</label>
    </div>

    <div class="input-txt-div">
        <select id="level" class="w-100" name="level" required>
            <option value="beginner">Beginner</option>
            <option value="intermediate">Intermediate</option>
            <option value="advanced">Advanced</option>
        </select>
    </div>

    <div class="input-txt-div">
        <input type="number" id="amount" placeholder="Amount" name="amount" step="0.01" required>
        <label for="amount">Amount</label>
    </div>

    <div class="input-txt-div">
        <input type="number" id="places" placeholder="Places" name="places" required>
        <label for="places">Places</label>
    </div>

    <div class="input-txt-div">
        <input type="number" id="lessons" placeholder="Lessons" name="lessons" required>
        <label for="lessons">Lessons</label>
    </div>

    <div class="input-txt-div">
        <input type="number" id="duration" placeholder="Duration (in hours)" name="duration" required>
        <label for="duration">Duration (in hours)</label>
    </div>
    <div class="input-txt-div">
    <input type="file" id="image" name="image" placeholder="Image URL" required>
        <label for="image">course thmubnail</label>
    </div>

    <input type="submit" class="btn w-100" value="Submit">
</form>

</div>

<div class="div center">

                <div class="title">courses</div>



    <?php
    if ($result_courses->num_rows > 0) {
        ?>
        <table class="mt4">
    <thead>
      <tr>
        <th>id</th>
        <th>title</th>
        <th>image</th>
        <th>due date</th>
        <th>level</th>
        <th>Amount</th>
        <th>places</th>
        <th>lessons</th>
        <th>duration(in hours)</th>
        <th>actions</th>
    </tr>
</thead>
<tbody> <?php
        while ($row = $result_courses->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><a href="#"><?php echo $row['title']; ?></a></td>
                <td><img src="<?php echo $row['image']; ?>" alt="Course Image"></td>
                <td><?php echo $row['due_date']; ?></td>
                <td><p class="status <?php echo $row['level']; ?>" style =""><?php echo $row['level']; ?></p></td>
                <td class="amount"><?php echo $row['amount']; ?></td>
                <td><?php echo $row['places']; ?></td>
                <td><?php echo $row['lessons']; ?></td>
                <td><?php echo $row['duration']; ?></td>
                <td class="">
                        <a href="modify_course.php?id=<?php echo $row['id']; ?>&email=<?php echo urlencode($email); ?>"> 
<svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="#8B54FF" xmlns="http://www.w3.org/2000/svg">
<path d="M20.1497 7.93997L8.27971 19.81C7.21971 20.88 4.04971 21.3699 3.27971 20.6599C2.50971 19.9499 3.06969 16.78 4.12969 15.71L15.9997 3.84C16.5478 3.31801 17.2783 3.03097 18.0351 3.04019C18.7919 3.04942 19.5151 3.35418 20.0503 3.88938C20.5855 4.42457 20.8903 5.14781 20.8995 5.90463C20.9088 6.66146 20.6217 7.39189 20.0997 7.93997H20.1497Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M21 21H12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                    </a>
                        <a href="delete_course.php?id=<?php echo $row['id']; ?>&email=<?php echo urlencode($email); ?>">
                        <svg width="1rem" height="1rem" viewBox="0 0 24 24" fill="#8B54FF" xmlns="http://www.w3.org/2000/svg">
<path d="M10 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M14 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg></a>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='10'><div style='margin : 1rem 0; padding: 0 1rem' class='error df tw wfc '><img src='img/error.png'> its empty here</div></td></tr>";
    }
    ?>
</tbody>

</table>
</div>
<div class="div center">
    <div class="title">contact</div>

    <!-- Display contact messages -->
    <?php
    if ($result_contact->num_rows > 0) {
        ?>
        <table class="mt4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>Subject</th>
                    <th>Phone Number</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contact_messages as $message) {
                    echo "<tr>";
                    echo "<td>{$message['id']}</td>";
                    echo "<td>{$message['username']}</td>";
                    echo "<td class='status beginner'>{$message['email_address']}</td>";
                    echo "<td>{$message['subject']}</td>";
                    echo "<td>{$message['phone_number']}</td>";
                    echo "<td>{$message['message']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php } else {
        echo "<div style='margin : 1rem 0; padding: 0 1rem' class='error df tw wfc '><img src='img/error.png'> It's empty here</div>";
    }
    ?>
</div>
</div>
<div class="div center">
    <div class="title">Course Requests</div>

    <!-- Display course requests -->
    <?php
    if ($result_course_request->num_rows > 0) {
        ?>
        <table class="mt4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Location</th>
                    <th>Course Level</th>
                    <th>Participating In</th>
                    <th>Reserve For</th>
                    <th>Additional Notes</th>
                    <th>Course ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($course_requests as $request) {
                    echo "<tr>";
                    echo "<td>{$request['id']}</td>";
                    echo "<td>{$request['name']}</td>";
                    echo "<td>{$request['address']}</td>";
                    echo "<td>{$request['phone_number']}</td>";
                    echo "<td>{$request['start_date']}</td>";
                    echo "<td>{$request['end_date']}</td>";
                    echo "<td>{$request['location']}</td>";
                    echo "<td>{$request['course_level']}</td>";
                    echo "<td>{$request['participating_in']}</td>";
                    echo "<td>{$request['reserve_for']}</td>";
                    echo "<td>{$request['additional_notes']}</td>";
                    echo "<td>{$request['course_id']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php } else {
        echo "<div style='margin : 1rem 0; padding: 0 1rem' class='error df tw wfc '><img src='img/error.png'> It's empty here</div>";
    }
    ?>
</div>

<div class="div center">
    <div class="title">Reservations</div>

    <!-- Display reservations -->
    <?php
    if ($result_reservation->num_rows > 0) {
        ?>
        <table class="mt4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course ID</th>
                    <th>User Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($reservations as $reservation) {
                    echo "<tr>";
                    echo "<td>{$reservation['id']}</td>";
                    echo "<td>{$reservation['course_id']}</td>";
                    echo "<td>{$reservation['user_email']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php } else {
        echo "<div style='margin : 1rem 0; padding: 0 1rem' class='error df tw wfc '><img src='img/error.png'> It's empty here</div>";
    }
    ?>
</div>


<div class="footer container center ">
        <div class="df fx-s">
            <div class="df-c">
                <img src="img/Layer_2.png" class="layer" alt="" srcset="">
            </div>
            <div class="df-c footer-box">
                <div class="title-bold">
                    Information
                </div>
                <p>
                    contact@3s-spring.tn
                    +216 51 717 722
                    Menzel Abderrahman Bizerte, 7035
                    Monday - Sunday : 9AM - 10PM
                </p>
            </div>
            <div class="df-c footer-box">
                <div class="title-bold">
                    links
                </div>
                <p class="df-c">
                    <a href="">home</a>
                    <a href="">about</a>
                    <a href="">service</a>
                    <a href="">career</a>
                    <a href="">contact us</a>
                </p>
            </div>
            <div class="df-c footer-box">
                <div class="title-bold">
                    quick links
                </div>
                <p class="df-c">
                    <a href="">Management & Consulting</a><a href="">Software Development</a><a href="">Digital Marketing</a><a href="">Data Manipulation</a>
                </p>
            </div>
            <div class="df-c footer-box">
                <div class="title-bold">
                    business
                </div>
                <p>
                  Our company specialized in software
                  development, project management, digital marketing and data science.                  
                </p>
            </div>
        </div>
    </div>
    <div class="copyright container">
        <div class="wrapper">
            <div class="df">© 2024 3S SPRING. All rights Reserved. <div>Terms & Conditions</div></div>
            <div class="df">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http:
                    <path d="M15.7432 3.98403H17.9992V0.168036C16.9069 0.0544523 15.8094 -0.00162514 14.7112 3.58369e-05C11.4472 3.58369e-05 9.21524 1.99203 9.21524 5.64003V8.78402H5.53125V13.056H9.21524V24H13.6312V13.056H17.3032L17.8552 8.78402H13.6312V6.06003C13.6312 4.80003 13.9672 3.98403 15.7432 3.98403Z" fill="white"/>
                    </svg>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http:
                    <path d="M15.7432 3.98403H17.9992V0.168036C16.9069 0.0544523 15.8094 -0.00162514 14.7112 3.58369e-05C11.4472 3.58369e-05 9.21524 1.99203 9.21524 5.64003V8.78402H5.53125V13.056H9.21524V24H13.6312V13.056H17.3032L17.8552 8.78402H13.6312V6.06003C13.6312 4.80003 13.9672 3.98403 15.7432 3.98403Z" fill="white"/>
                    </svg>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http:
                    <path d="M15.7432 3.98403H17.9992V0.168036C16.9069 0.0544523 15.8094 -0.00162514 14.7112 3.58369e-05C11.4472 3.58369e-05 9.21524 1.99203 9.21524 5.64003V8.78402H5.53125V13.056H9.21524V24H13.6312V13.056H17.3032L17.8552 8.78402H13.6312V6.06003C13.6312 4.80003 13.9672 3.98403 15.7432 3.98403Z" fill="white"/>
                    </svg>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http:
                    <path d="M15.7432 3.98403H17.9992V0.168036C16.9069 0.0544523 15.8094 -0.00162514 14.7112 3.58369e-05C11.4472 3.58369e-05 9.21524 1.99203 9.21524 5.64003V8.78402H5.53125V13.056H9.21524V24H13.6312V13.056H17.3032L17.8552 8.78402H13.6312V6.06003C13.6312 4.80003 13.9672 3.98403 15.7432 3.98403Z" fill="white"/>
                    </svg>
                    
            </div>
        </div>
    </div>

 <script src="js/master.js"></script>
</body>
</html>