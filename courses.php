<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>courses</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" type="image" href="img/Layer_2.png">
</head>
<body>
<?php
$host = 'localhost';  
$dbname = 'e-learning'; 
$user = 'root';    
$pass = '';        

$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM courses";
$stmt = $conn->prepare($sql);
$stmt->execute();
$courses_result = $stmt->get_result();

if ($courses_result->num_rows > 0) {
    $courses = array();

    while ($row = $courses_result->fetch_assoc()) {
        $course_item = array(
            "id" => $row['id'],
            "title" => $row['title'],
            "image" => $row['image'],
            "due_date" => $row['due_date'],
            "level" => $row['level'],
            "amount" => $row['amount'],
            "places" => $row['places'],
            "lessons" => $row['lessons'],
            "duration" => $row['duration']
        );
        $courses[] = $course_item;
    }
} else {
    echo "0 results";
}

$stmt->close();
$conn->close();
?>
  <div class="progress-wrap float">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
    <nav class="nav--bar df container">
        <img src="img/Layer_2.png" alt="" class="layer" srcset="" />
        <div class="links df">
        <a href="landing.php">Home</a><a href="about.php">About Us</a><a href="courses.php">Courses</a
          ><a href="blog.php">Blog</a><a href="contact.php">Contact Us</a>
        </div>
        <div class="nav-profile df">
      <?php
session_start();
if (isset($_SESSION['email'])) {
    // If session exists, display user's name and image
    $name = $_SESSION['name'];
    $profile_image = $_SESSION['profile_image'];
?>
    <div class="user-info df">
        <img src="<?php echo $profile_image; ?>" alt="Profile Image">
        <div class="name">
            <?php if ($_SESSION['role'] == 0): ?>
                <a href="profil.php"><?php echo $name; ?></a>
            <?php else: ?>
                <a href="admin.php"><?php echo $name; ?></a>
            <?php endif; ?>
        </div>
        <div class="btn">
            <a href="logout.php">logout</a>
        </div>
    </div>
<?php } else { ?>
    <div class="btn">
        <a href="login.php">login now</a>
    </div>
<?php } ?>

</div>
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


    <div class="page container center">
      <div class="df-c">
        <div class="title">Course</div>
        <div class="title2">home > course</div>
    </div>
      <img src="img/dots.png" alt="" class="dots transitions" srcset="" />
  </div>

    <div class="filter--courses container" id="">
    <div class="c-left df-c">

        
<div class="filter">
    <div class="search df">
        <input type="text" name="" id="">
        <svg
          width="56"
          height="56"
          viewBox="0 0 56 56"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <rect y="0.5" width="56" height="55" rx="5" fill="#8B54FF" />
          <g clip-path="url(#clip0_10017_2160)">
            <path
              d="M33.75 27.7656C33.75 29.5625 33.1641 31.2422 32.1875 32.5703L37.1094 37.5312C37.6172 38 37.6172 38.8203 37.1094 39.289C36.6406 39.7968 35.8203 39.7968 35.3516 39.289L30.3906 34.3281C29.0625 35.3437 27.3828 35.8906 25.625 35.8906C21.1328 35.8906 17.5 32.2578 17.5 27.7656C17.5 23.3125 21.1328 19.6406 25.625 19.6406C30.0781 19.6406 33.75 23.3125 33.75 27.7656ZM25.625 33.3906C28.7109 33.3906 31.25 30.8906 31.25 27.7656C31.25 24.6797 28.7109 22.1406 25.625 22.1406C22.5 22.1406 20 24.6797 20 27.7656C20 30.8906 22.5 33.3906 25.625 33.3906Z"
              fill="white"
            />
          </g>
          <defs>
            <clipPath id="clip0_10017_2160">
              <rect
                width="21"
                height="21"
                fill="white"
                transform="translate(17.5 19.1406)"
              />
            </clipPath>
          </defs>
        </svg>
    </div>
</div>

<div class="categories boxing">
    <div class="h4 underlined-title">categories</div>
    <ul class="df-c mt4">
        <li ><input id="beginner" class="inp-cbx" type="checkbox" style="display: none">
          <label class="cbx" for="beginner">
            <span>
              <svg width="12px" height="10px" viewBox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>Beginner</span>
          </label>
        </li>
        <li><input id="intermediate" class="inp-cbx" type="checkbox" style="display: none">
          <label class="cbx" for="intermediate">
            <span>
              <svg width="12px" height="10px" viewBox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>intermediate</span>
          </label></li>
        <li><input id="advanced" class="inp-cbx" type="checkbox" style="display: none">
          <label class="cbx" for="advanced">
            <span>
              <svg width="12px" height="10px" viewBox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>advanced</span>
          </label></li>
    </ul>
</div>

<div class="price-level boxing df-c">
  <div class="h4 underlined-title">price level</div>
    <div>
      <ul class="df-c">
        <li><input id="paid" class="inp-cbx" type="checkbox" style="display: none">
          <label class="cbx" for="paid">
            <span>
              <svg width="12px" height="10px" viewBox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>free</span>
          </label></li>
        <li><input id="free" class="inp-cbx" type="checkbox" style="display: none">
          <label class="cbx" for="free">
            <span>
              <svg width="12px" height="10px" viewBox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>paid</span>
          </label></li>
      </ul>
      
    </div>
    <div>
      
    </div>
</div>

<div class="duration boxing df-c">
    <div class="underlined-title">time duration</div>

    <div class="df-c">
        <div>
          <input id="hours5" class="inp-cbx" type="checkbox" style="display: none">
          <label class="cbx" for="hours5">
            <span>
              <svg width="12px" height="10px" viewBox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>5+hours </span>
          </label>
        </div>
        <div>
          <input id="hours10" class="inp-cbx" type="checkbox" style="display: none">
          <label class="cbx" for="hours10">
            <span>
              <svg width="12px" height="10px" viewBox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>10+hours </span>
          </label>
        </div>
        <div>
          <input id="hours20" class="inp-cbx" type="checkbox" style="display: none">
          <label class="cbx" for="hours20">
            <span>
              <svg width="12px" height="10px" viewBox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>20+hours</span>
          </label>
        </div>
    </div>
</div>
</div>
    <div class="c-right">
        <div class="header ftt container df">
        <div class="df">Showing <span id="courseCount">12</span> courses of <span id="totalCount">16</span> results</div>
            <div class="df">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.80859 4.75C6.78776 5.16667 6.64193 5.52083 6.37109 5.8125C6.07943 6.08333 5.72526 6.22917 5.30859 6.25H2.30859C1.89193 6.22917 1.53776 6.08333 1.24609 5.8125C0.97526 5.52083 0.829427 5.16667 0.808594 4.75V1.75C0.829427 1.33333 0.97526 0.979167 1.24609 0.6875C1.53776 0.416667 1.89193 0.270833 2.30859 0.25H5.30859C5.72526 0.270833 6.07943 0.416667 6.37109 0.6875C6.64193 0.979167 6.78776 1.33333 6.80859 1.75V4.75ZM6.80859 12.75C6.78776 13.1667 6.64193 13.5208 6.37109 13.8125C6.07943 14.0833 5.72526 14.2292 5.30859 14.25H2.30859C1.89193 14.2292 1.53776 14.0833 1.24609 13.8125C0.97526 13.5208 0.829427 13.1667 0.808594 12.75V9.75C0.829427 9.33333 0.97526 8.97917 1.24609 8.6875C1.53776 8.41667 1.89193 8.27083 2.30859 8.25H5.30859C5.72526 8.27083 6.07943 8.41667 6.37109 8.6875C6.64193 8.97917 6.78776 9.33333 6.80859 9.75V12.75ZM8.80859 1.75C8.82943 1.33333 8.97526 0.979167 9.24609 0.6875C9.53776 0.416667 9.89193 0.270833 10.3086 0.25H13.3086C13.7253 0.270833 14.0794 0.416667 14.3711 0.6875C14.6419 0.979167 14.7878 1.33333 14.8086 1.75V4.75C14.7878 5.16667 14.6419 5.52083 14.3711 5.8125C14.0794 6.08333 13.7253 6.22917 13.3086 6.25H10.3086C9.89193 6.22917 9.53776 6.08333 9.24609 5.8125C8.97526 5.52083 8.82943 5.16667 8.80859 4.75V1.75ZM14.8086 12.75C14.7878 13.1667 14.6419 13.5208 14.3711 13.8125C14.0794 14.0833 13.7253 14.2292 13.3086 14.25H10.3086C9.89193 14.2292 9.53776 14.0833 9.24609 13.8125C8.97526 13.5208 8.82943 13.1667 8.80859 12.75V9.75C8.82943 9.33333 8.97526 8.97917 9.24609 8.6875C9.53776 8.41667 9.89193 8.27083 10.3086 8.25H13.3086C13.7253 8.27083 14.0794 8.41667 14.3711 8.6875C14.6419 8.97917 14.7878 9.33333 14.8086 9.75V12.75Z" fill="#8B54FF"/>
                    </svg>
                    Grid 
                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.60938 0.75C3.06771 0.791667 3.31771 1.04167 3.35938 1.5V3C3.31771 3.45833 3.06771 3.70833 2.60938 3.75H1.10938C0.651042 3.70833 0.401042 3.45833 0.359375 3V1.5C0.401042 1.04167 0.651042 0.791667 1.10938 0.75H2.60938ZM14.8594 1.25C15.151 1.25 15.3906 1.34375 15.5781 1.53125C15.7656 1.71875 15.8594 1.95833 15.8594 2.25C15.8594 2.54167 15.7656 2.78125 15.5781 2.96875C15.3906 3.15625 15.151 3.25 14.8594 3.25H5.85938C5.56771 3.25 5.32812 3.15625 5.14062 2.96875C4.95312 2.78125 4.85938 2.54167 4.85938 2.25C4.85938 1.95833 4.95312 1.71875 5.14062 1.53125C5.32812 1.34375 5.56771 1.25 5.85938 1.25H14.8594ZM14.8594 6.25C15.151 6.25 15.3906 6.34375 15.5781 6.53125C15.7656 6.71875 15.8594 6.95833 15.8594 7.25C15.8594 7.54167 15.7656 7.78125 15.5781 7.96875C15.3906 8.15625 15.151 8.25 14.8594 8.25H5.85938C5.56771 8.25 5.32812 8.15625 5.14062 7.96875C4.95312 7.78125 4.85938 7.54167 4.85938 7.25C4.85938 6.95833 4.95312 6.71875 5.14062 6.53125C5.32812 6.34375 5.56771 6.25 5.85938 6.25H14.8594ZM14.8594 11.25C15.151 11.25 15.3906 11.3438 15.5781 11.5312C15.7656 11.7188 15.8594 11.9583 15.8594 12.25C15.8594 12.5417 15.7656 12.7812 15.5781 12.9688C15.3906 13.1562 15.151 13.25 14.8594 13.25H5.85938C5.56771 13.25 5.32812 13.1562 5.14062 12.9688C4.95312 12.7812 4.85938 12.5417 4.85938 12.25C4.85938 11.9583 4.95312 11.7188 5.14062 11.5312C5.32812 11.3438 5.56771 11.25 5.85938 11.25H14.8594ZM0.359375 6.5C0.401042 6.04167 0.651042 5.79167 1.10938 5.75H2.60938C3.06771 5.79167 3.31771 6.04167 3.35938 6.5V8C3.31771 8.45833 3.06771 8.70833 2.60938 8.75H1.10938C0.651042 8.70833 0.401042 8.45833 0.359375 8V6.5ZM2.60938 10.75C3.06771 10.7917 3.31771 11.0417 3.35938 11.5V13C3.31771 13.4583 3.06771 13.7083 2.60938 13.75H1.10938C0.651042 13.7083 0.401042 13.4583 0.359375 13V11.5C0.401042 11.0417 0.651042 10.7917 1.10938 10.75H2.60938Z" fill="#4D5765"/>
                        </svg>
                        List                                           
            </div>
        </div>
        <div class="df-c">
        <div class="boxes--container">
          <?php foreach ($courses as $course): ?>
            <a href=<?php echo "coursedetails.php?course_id=" . $course['id']; ?> >
          <div class="box hoverimg">
            <div class="duration"><?php echo $course['duration']; ?></div>
            <img src="<?php echo $course['image']; ?>" srcset="" />
            <div class="df-c course--content">
              <div class="eval"></div>
              <div class="title2 sm">
                <?php echo $course['title']; ?>
              </div>
              <div class="df">
                <div><svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http:
      <g clip-path=" url(#clip0_6051_1572)">
                    <path
                      d="M8.55469 3.58984L6.07031 1.10547C5.77344 0.808594 5.42188 0.660156 5.01562 0.660156H1.5C1.07812 0.675781 0.726562 0.824219 0.445312 1.10547C0.164062 1.38672 0.015625 1.73828 0 2.16016V11.1602C0.015625 11.582 0.164062 11.9336 0.445312 12.2148C0.726562 12.4961 1.07812 12.6445 1.5 12.6602H7.5C7.92188 12.6445 8.27344 12.4961 8.55469 12.2148C8.83594 11.9336 8.98438 11.582 9 11.1602V4.64453C9 4.23828 8.85156 3.88672 8.55469 3.58984ZM8.03906 4.12891C8.11719 4.20703 8.17188 4.30078 8.20312 4.41016H5.625C5.39062 4.39453 5.26562 4.26953 5.25 4.03516V1.45703C5.35938 1.48828 5.45312 1.54297 5.53125 1.62109L8.03906 4.12891ZM8.25 11.1602C8.25 11.3789 8.17969 11.5586 8.03906 11.6992C7.89844 11.8398 7.71875 11.9102 7.5 11.9102H1.5C1.28125 11.9102 1.10156 11.8398 0.960938 11.6992C0.820312 11.5586 0.75 11.3789 0.75 11.1602V2.16016C0.75 1.94141 0.820312 1.76172 0.960938 1.62109C1.10156 1.48047 1.28125 1.41016 1.5 1.41016H4.5V4.03516C4.51562 4.34766 4.625 4.61328 4.82812 4.83203C5.04688 5.03516 5.3125 5.14453 5.625 5.16016H8.25V11.1602Z"
                      fill="#C7C7C7" />
                    </g>
                    <defs>
                      <clipPath id="clip0_6051_1572">
                        <rect width="9" height="13" fill="white" transform="matrix(1 0 0 -1 0 13.1602)" />
                      </clipPath>
                    </defs>
                  </svg>

                  Lesson
                  <?php echo $course['lessons']; ?>
                </div>
                <div>
                  <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http:
      <g clip-path=" url(#clip0_6051_1577)">
                    <path
                      d="M5.74219 6.66016C6.58594 6.64453 7.29688 6.35547 7.875 5.79297C8.4375 5.21484 8.72656 4.50391 8.74219 3.66016C8.72656 2.81641 8.4375 2.10547 7.875 1.52734C7.29688 0.964844 6.58594 0.675781 5.74219 0.660156C4.89844 0.675781 4.1875 0.964844 3.60938 1.52734C3.04688 2.10547 2.75781 2.81641 2.74219 3.66016C2.75781 4.50391 3.04688 5.21484 3.60938 5.79297C4.1875 6.35547 4.89844 6.64453 5.74219 6.66016ZM5.74219 1.41016C6.38281 1.42578 6.91406 1.64453 7.33594 2.06641C7.75781 2.48828 7.97656 3.01953 7.99219 3.66016C7.97656 4.30078 7.75781 4.83203 7.33594 5.25391C6.91406 5.67578 6.38281 5.89453 5.74219 5.91016C5.10156 5.89453 4.57031 5.67578 4.14844 5.25391C3.72656 4.83203 3.50781 4.30078 3.49219 3.66016C3.50781 3.01953 3.72656 2.48828 4.14844 2.06641C4.57031 1.64453 5.10156 1.42578 5.74219 1.41016ZM6.9375 7.78516H4.54688C3.40625 7.81641 2.45312 8.21484 1.6875 8.98047C0.921875 9.74609 0.523438 10.6992 0.492188 11.8398C0.492188 12.0742 0.570312 12.2695 0.726562 12.4258C0.882812 12.582 1.07812 12.6602 1.3125 12.6602H10.1719C10.4062 12.6602 10.6016 12.582 10.7578 12.4258C10.9141 12.2695 10.9922 12.0742 10.9922 11.8398C10.9609 10.6992 10.5625 9.74609 9.79688 8.98047C9.03125 8.21484 8.07812 7.81641 6.9375 7.78516ZM10.1719 11.9102H1.3125C1.26562 11.9102 1.24219 11.8867 1.24219 11.8398C1.27344 10.9023 1.59375 10.1211 2.20312 9.49609C2.82812 8.88672 3.60938 8.56641 4.54688 8.53516H6.9375C7.875 8.56641 8.65625 8.88672 9.28125 9.49609C9.89062 10.1211 10.2109 10.9023 10.2422 11.8398C10.2422 11.8867 10.2188 11.9102 10.1719 11.9102Z"
                      fill="#C7C7C7" />
                    </g>
                    <defs>
                      <clipPath id="clip0_6051_1577">
                        <rect width="10.5" height="13" fill="white" transform="matrix(1 0 0 -1 0.492188 13.1602)" />
                      </clipPath>
                    </defs>
                  </svg>
                  Students
                  <?php echo $course['places']; ?>+
                </div>
                <div> <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http:
      <g clip-path=" url(#clip0_6051_1582)">
                    <path
                      d="M6.10156 1.41016C6.41406 1.42578 6.67969 1.53516 6.89844 1.73828C7.10156 1.95703 7.21094 2.22266 7.22656 2.53516V10.7852C7.21094 11.0977 7.10156 11.3633 6.89844 11.582C6.67969 11.7852 6.41406 11.8945 6.10156 11.9102H5.35156C5.03906 11.8945 4.77344 11.7852 4.55469 11.582C4.35156 11.3633 4.24219 11.0977 4.22656 10.7852V2.53516C4.24219 2.22266 4.35156 1.95703 4.55469 1.73828C4.77344 1.53516 5.03906 1.42578 5.35156 1.41016H6.10156ZM6.10156 2.16016H5.35156C5.11719 2.17578 4.99219 2.30078 4.97656 2.53516V10.7852C4.99219 11.0195 5.11719 11.1445 5.35156 11.1602H6.10156C6.33594 11.1445 6.46094 11.0195 6.47656 10.7852V2.53516C6.46094 2.30078 6.33594 2.17578 6.10156 2.16016ZM2.35156 5.91016C2.66406 5.92578 2.92969 6.03516 3.14844 6.23828C3.35156 6.45703 3.46094 6.72266 3.47656 7.03516V10.7852C3.46094 11.0977 3.35156 11.3633 3.14844 11.582C2.92969 11.7852 2.66406 11.8945 2.35156 11.9102H1.60156C1.28906 11.8945 1.02344 11.7852 0.804688 11.582C0.601562 11.3633 0.492188 11.0977 0.476562 10.7852V7.03516C0.492188 6.72266 0.601562 6.45703 0.804688 6.23828C1.02344 6.03516 1.28906 5.92578 1.60156 5.91016H2.35156ZM2.35156 6.66016H1.60156C1.36719 6.67578 1.24219 6.80078 1.22656 7.03516V10.7852C1.24219 11.0195 1.36719 11.1445 1.60156 11.1602H2.35156C2.58594 11.1445 2.71094 11.0195 2.72656 10.7852V7.03516C2.71094 6.80078 2.58594 6.67578 2.35156 6.66016ZM7.97656 4.03516C7.99219 3.72266 8.10156 3.45703 8.30469 3.23828C8.52344 3.03516 8.78906 2.92578 9.10156 2.91016H9.85156C10.1641 2.92578 10.4297 3.03516 10.6484 3.23828C10.8516 3.45703 10.9609 3.72266 10.9766 4.03516V10.7852C10.9609 11.0977 10.8516 11.3633 10.6484 11.582C10.4297 11.7852 10.1641 11.8945 9.85156 11.9102H9.10156C8.78906 11.8945 8.52344 11.7852 8.30469 11.582C8.10156 11.3633 7.99219 11.0977 7.97656 10.7852V4.03516ZM8.72656 4.03516V10.7852C8.74219 11.0195 8.86719 11.1445 9.10156 11.1602H9.85156C10.0859 11.1445 10.2109 11.0195 10.2266 10.7852V4.03516C10.2109 3.80078 10.0859 3.67578 9.85156 3.66016H9.10156C8.86719 3.67578 8.74219 3.80078 8.72656 4.03516Z"
                      fill="#C7C7C7" />
                    </g>
                    <defs>
                      <clipPath id="clip0_6051_1582">
                        <rect width="10.5" height="13" fill="white" transform="matrix(1 0 0 -1 0.476562 13.1602)" />
                      </clipPath>
                    </defs>
                  </svg>
                  <pre style="visibility: hidden; width= 0" class="level <?php echo $course['level']; ?>"></pre>
                  <?php echo $course['level']; ?>
                </div>
              </div>
              <hr />
              <div class="price df">
                <div class="pricemo"><?php echo $course['amount']; ?></div> DT
                <div class="btn">Enroll Now</div>
              </div>
            </div>
          </div></a>
          <?php endforeach; ?>
        </div>
    </div>
    
  
    <div class="df jc-c">
      <div class="badg-box ta-c"><p>01</p></div>
      <div class="badg-box ta-c"><p>02</p></div>
      <div class="badg-box ta-c"><p>03</p></div>
      <div class="badg-box ta-c"><svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.78125 0.890625L14.2812 6.14062C14.4271 6.28646 14.5 6.46354 14.5 6.67188C14.5 6.88021 14.4271 7.05729 14.2812 7.20312L8.78125 12.4531C8.40625 12.7448 8.05208 12.7448 7.71875 12.4531C7.42708 12.0781 7.42708 11.724 7.71875 11.3906L11.875 7.42188H1.25C0.791667 7.38021 0.541667 7.13021 0.5 6.67188C0.541667 6.21354 0.791667 5.96354 1.25 5.92188H11.875L7.71875 1.95312C7.42708 1.61979 7.42708 1.26562 7.71875 0.890625C8.05208 0.598958 8.40625 0.598958 8.78125 0.890625Z" fill="#0F2239"/>
          </svg>
          </div>
  </div>
  </div>
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
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.7432 3.98403H17.9992V0.168036C16.9069 0.0544523 15.8094 -0.00162514 14.7112 3.58369e-05C11.4472 3.58369e-05 9.21524 1.99203 9.21524 5.64003V8.78402H5.53125V13.056H9.21524V24H13.6312V13.056H17.3032L17.8552 8.78402H13.6312V6.06003C13.6312 4.80003 13.9672 3.98403 15.7432 3.98403Z" fill="white"/>
                  </svg>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.7432 3.98403H17.9992V0.168036C16.9069 0.0544523 15.8094 -0.00162514 14.7112 3.58369e-05C11.4472 3.58369e-05 9.21524 1.99203 9.21524 5.64003V8.78402H5.53125V13.056H9.21524V24H13.6312V13.056H17.3032L17.8552 8.78402H13.6312V6.06003C13.6312 4.80003 13.9672 3.98403 15.7432 3.98403Z" fill="white"/>
                  </svg>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.7432 3.98403H17.9992V0.168036C16.9069 0.0544523 15.8094 -0.00162514 14.7112 3.58369e-05C11.4472 3.58369e-05 9.21524 1.99203 9.21524 5.64003V8.78402H5.53125V13.056H9.21524V24H13.6312V13.056H17.3032L17.8552 8.78402H13.6312V6.06003C13.6312 4.80003 13.9672 3.98403 15.7432 3.98403Z" fill="white"/>
                  </svg>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.7432 3.98403H17.9992V0.168036C16.9069 0.0544523 15.8094 -0.00162514 14.7112 3.58369e-05C11.4472 3.58369e-05 9.21524 1.99203 9.21524 5.64003V8.78402H5.53125V13.056H9.21524V24H13.6312V13.056H17.3032L17.8552 8.78402H13.6312V6.06003C13.6312 4.80003 13.9672 3.98403 15.7432 3.98403Z" fill="white"/>
                  </svg>
                  
          </div>
      </div>
  </div>
  <script src="js/master.js"></script>
  <script src="js/courses.js"></script>
</body>
</html>