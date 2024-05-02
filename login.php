<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="img/Layer_2.png">
    
    <title>3SPRING auth</title>
    <link rel="stylesheet" href="css/normalise.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <?php
  if(isset($_GET['pw']) && $_GET['pw'] == 'false') {
    echo '<div class="success error df tw "><img src="img/error.png"> wrong password</div>';
  }else if(isset($_GET['email']) && $_GET['email'] == 'false') {
    echo '<div class="success error df tw "><img src="img/error.png"> no user found !</div>';
  }
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
        <a href="landing.php">Home</a><a href="about.php">About Us</a><a href="coursedetails.php">Course</a
        ><a href="courses.php">Pages</a><a href="blog.php">Blog</a><a href="contact.php">Contact Us</a>
      </div>
      <div class="search df">
        <input type="text" name="" id="" />
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
    <div class="df jc-c auth">
        <img src="img/smiling-woman-with-afro-posing-pink-sweater 1.jpg" alt="" srcset="">
        <main action="" class="login px3">
            <div class="form--wrapper center">
                <div class="">
                    <div class="formspacer">
                        <div class="form--buttons df sa">
                            <div id="animate" class="transanimation activeform"></div>
                            <div class="ta-c" id="loginbtn">login</div>
                            <div id="signupbtn" class="ta-c">signup</div>
                        </div>
                        

                        <form class="loginform activeauthform df-c" action="loginconfigs.php" method="POST">
                          <h4>Hello again</h4>
                          <div class="title">welcome back</div>
                          <div class="spacer"></div>
                          <div class="spacer"></div>
                          <div class="df-c">
                              <div class="input__container" id="input">
                                  <div class="input-txt-div">
                                      <input type="email" name="email" placeholder="Enter your email" autocomplete="off" id="email">
                                      <label for="email">Email Address</label>
                                  </div>
                              </div>
                              <div class="input__container" id="input">
                                  <div class="input-txt-div">
                                      <input type="password" name="password" placeholder="Enter your password" autocomplete="off" id="pw">
                                      <label for="pw">Password</label>
                                  </div>
                              </div>
                          </div>
                          <div class="spacer"></div>
                          <div class="spacer"></div>
                          <button class="btn w-100" type="submit">Log in</button>
                          <div class="wrapper">
                            <div class="df">
                              <input id="cbx14" class="inp-cbx" type="checkbox" style="display: none">
                    <label class="cbx" for="cbx14">
                      <span>
                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                          <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                      </span>
                      <span>remember me</span>
                    </label>
                            </div>
                            <a href="">forget passord?</a>
                          </div>
                          </form>
                      

                        <div class="signupform">

                          <form action="signupconfigs.php" class=" df-c" method="post" >
                              <h4>Create account</h4>
                          <div class="title">Welcome! enter your details and start creating</div>
                          <div class="spacer"></div>
                          <div class="spacer"></div>
                          <div class="input__container" id="input">
                            <div class="input-txt-div">
                              <input type="text" name="username" placeholder="Choose a username" autocomplete="off" id="un"> <label for="un">
                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10 3.625C7.58375 3.625 5.625 5.58375 5.625 8C5.625 10.4162 7.58375 12.375 10 12.375C12.4162 12.375 14.375 10.4162 14.375 8C14.375 5.58375 12.4162 3.625 10 3.625ZM4.375 8C4.375 4.8934 6.8934 2.375 10 2.375C13.1066 2.375 15.625 4.8934 15.625 8C15.625 11.1066 13.1066 13.625 10 13.625C6.8934 13.625 4.375 11.1066 4.375 8Z" fill="#BDBDBD"/>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0001 13.625C8.57374 13.625 7.17251 14.0005 5.93728 14.7137C4.70205 15.427 3.67634 16.4528 2.96327 17.6881C2.79071 17.9871 2.40848 18.0896 2.10953 17.917C1.81058 17.7444 1.70812 17.3622 1.88068 17.0632C2.70345 15.6379 3.88696 14.4542 5.31223 13.6312C6.7375 12.8083 8.3543 12.375 10.0001 12.375C11.6459 12.375 13.2627 12.8083 14.688 13.6312C16.1132 14.4542 17.2968 15.6379 18.1195 17.0632C18.2921 17.3622 18.1896 17.7444 17.8907 17.917C17.5917 18.0896 17.2095 17.9871 17.0369 17.6881C16.3239 16.4528 15.2982 15.427 14.0629 14.7137C12.8277 14.0005 11.4265 13.625 10.0001 13.625Z" fill="#BDBDBD"/>
                                  </svg> username
  
                              </label>
                            </div>
                          </div>
                          <div class="input__container" id="input">
                            <div class="input-txt-div">
                              <input type="email" name="email" placeholder="Enter your email" autocomplete="off" id="email_signup"><label for="un1"> 
                                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.875 4.875C1.875 4.52982 2.15482 4.25 2.5 4.25H17.5C17.8452 4.25 18.125 4.52982 18.125 4.875V15.5C18.125 15.8315 17.9933 16.1495 17.7589 16.3839C17.5245 16.6183 17.2065 16.75 16.875 16.75H3.125C2.79348 16.75 2.47554 16.6183 2.24112 16.3839C2.0067 16.1495 1.875 15.8315 1.875 15.5V4.875ZM3.125 5.5V15.5H16.875V5.5H3.125Z" fill="#BDBDBD"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.03928 4.45268C2.27253 4.19823 2.66788 4.18104 2.92233 4.41428L10 10.9021L17.0777 4.41428C17.3321 4.18104 17.7275 4.19823 17.9607 4.45268C18.194 4.70713 18.1768 5.10248 17.9223 5.33573L10.4223 12.2107C10.1834 12.4298 9.81663 12.4298 9.57768 12.2107L2.07768 5.33573C1.82323 5.10248 1.80604 4.70713 2.03928 4.45268Z" fill="#BDBDBD"/>
                                    </svg>email adress</label>
                            </div>
                          </div>
                          <div class="input__container" id="input">
                            <div class="input-txt-div">
                              <input type="password" name="password" placeholder="Choose a password" autocomplete="off" id="pw_signup"><label for="un2"> 
                                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10.5C9.48223 10.5 9.0625 10.9197 9.0625 11.4375C9.0625 11.9553 9.48223 12.375 10 12.375C10.5178 12.375 10.9375 11.9553 10.9375 11.4375C10.9375 10.9197 10.5178 10.5 10 10.5ZM7.8125 11.4375C7.8125 10.2294 8.79188 9.25 10 9.25C11.2081 9.25 12.1875 10.2294 12.1875 11.4375C12.1875 12.6456 11.2081 13.625 10 13.625C8.79188 13.625 7.8125 12.6456 7.8125 11.4375Z" fill="#BDBDBD"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 12.375C10.3452 12.375 10.625 12.6548 10.625 13V14.875C10.625 15.2202 10.3452 15.5 10 15.5C9.65482 15.5 9.375 15.2202 9.375 14.875V13C9.375 12.6548 9.65482 12.375 10 12.375Z" fill="#BDBDBD"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 8C2.5 7.30964 3.05964 6.75 3.75 6.75H16.25C16.9404 6.75 17.5 7.30964 17.5 8V16.75C17.5 17.4404 16.9404 18 16.25 18H3.75C3.05964 18 2.5 17.4404 2.5 16.75V8ZM16.25 8H3.75V16.75H16.25V8Z" fill="#BDBDBD"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2.375C9.41984 2.375 8.86344 2.60547 8.4532 3.0157C8.04297 3.42594 7.8125 3.98234 7.8125 4.5625V7.375C7.8125 7.72018 7.53268 8 7.1875 8C6.84232 8 6.5625 7.72018 6.5625 7.375V4.5625C6.5625 3.65082 6.92466 2.77648 7.56932 2.13182C8.21398 1.48716 9.08832 1.125 10 1.125C10.9117 1.125 11.786 1.48716 12.4307 2.13182C13.0753 2.77648 13.4375 3.65082 13.4375 4.5625V7.375C13.4375 7.72018 13.1577 8 12.8125 8C12.4673 8 12.1875 7.72018 12.1875 7.375V4.5625C12.1875 3.98234 11.957 3.42594 11.5468 3.0157C11.1366 2.60547 10.5802 2.375 10 2.375Z" fill="#BDBDBD"/>
                                    </svg>password</label>
                            </div>
                          </div>
                          <div class="input__container" id="input">
                            <div class="input-txt-div">
                              <input type="password" name="confirm_password" placeholder="Confirm your password" autocomplete="off" id="confirm_pw"><label for="un3"> 
                                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 10.5C9.48223 10.5 9.0625 10.9197 9.0625 11.4375C9.0625 11.9553 9.48223 12.375 10 12.375C10.5178 12.375 10.9375 11.9553 10.9375 11.4375C10.9375 10.9197 10.5178 10.5 10 10.5ZM7.8125 11.4375C7.8125 10.2294 8.79188 9.25 10 9.25C11.2081 9.25 12.1875 10.2294 12.1875 11.4375C12.1875 12.6456 11.2081 13.625 10 13.625C8.79188 13.625 7.8125 12.6456 7.8125 11.4375Z" fill="#BDBDBD"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 12.375C10.3452 12.375 10.625 12.6548 10.625 13V14.875C10.625 15.2202 10.3452 15.5 10 15.5C9.65482 15.5 9.375 15.2202 9.375 14.875V13C9.375 12.6548 9.65482 12.375 10 12.375Z" fill="#BDBDBD"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 8C2.5 7.30964 3.05964 6.75 3.75 6.75H16.25C16.9404 6.75 17.5 7.30964 17.5 8V16.75C17.5 17.4404 16.9404 18 16.25 18H3.75C3.05964 18 2.5 17.4404 2.5 16.75V8ZM16.25 8H3.75V16.75H16.25V8Z" fill="#BDBDBD"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10 2.375C9.41984 2.375 8.86344 2.60547 8.4532 3.0157C8.04297 3.42594 7.8125 3.98234 7.8125 4.5625V7.375C7.8125 7.72018 7.53268 8 7.1875 8C6.84232 8 6.5625 7.72018 6.5625 7.375V4.5625C6.5625 3.65082 6.92466 2.77648 7.56932 2.13182C8.21398 1.48716 9.08832 1.125 10 1.125C10.9117 1.125 11.786 1.48716 12.4307 2.13182C13.0753 2.77648 13.4375 3.65082 13.4375 4.5625V7.375C13.4375 7.72018 13.1577 8 12.8125 8C12.4673 8 12.1875 7.72018 12.1875 7.375V4.5625C12.1875 3.98234 11.957 3.42594 11.5468 3.0157C11.1366 2.60547 10.5802 2.375 10 2.375Z" fill="#BDBDBD"/>
                                    </svg>confirm password</label>
                            </div>
                          </div>
                          
                          
                          <div class="spacer"></div>
                          <div class="spacer"></div>
                          
                          <button class="btn w-100">sign up</button>
                          <div class="wrapper">
                            <div class="df">
                              <input id="cbx13" class="inp-cbx" type="checkbox" style="display: none">
                    <label class="cbx" for="cbx13">
                      <span>
                        <svg width="12px" height="10px" viewBox="0 0 12 10">
                          <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                      </span>
                      <span>remember me</span>
                    </label>
                            </div>
                            <a href="">forget passord?</a>
                          </div>
      
      
                          </form>
                        </div>


                    </div>
                   

                  
                    
                </div>

            </div>
        </main>
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
</body>
</html>