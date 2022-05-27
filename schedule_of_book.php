<?php
session_start();

include ('admin/access.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Budz Laundry Hub - Schedule first book</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <link
     href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap"
     rel="stylesheet"
   />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <!-- CSS File and Fonts-->

    <link rel="stylesheet" href="schedule_of_book.css" />
    <link rel="stylesheet" href="schedule_of_book.css" />
    <link
      rel="Webpage icon"
      type="device-icon/png"
      href="Navigation Bar/LOGO.png"
    />
    <style>

      
</style>
  </head>
  <body>
    <!-- Navigation Bar Section -->
    <div class="fixed-top">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">
          <img class="logo" src="Navigation Bar/LOGO.png" alt="" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav text-center">
            <li class="nav-item">
              <a class="nav-link " href="index.php" style="color:#980799;">
                Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="serviceandpricing.php" style="color:#980799;">
                Services & Prices
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="contacts.php" style="color:#980799;">
                Contacts & MapView
              </a>
            </li>

            <?php if (isset($_SESSION['auth_user'])): ?>
        <li class="nav-item dropdown">
        <a  aria-hidden="true" class="nav-link text-dark dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: #980799; font-size: 12px; display:flex; justify-content:center; align-items: center; padding-top: 13px;">
        <i class="fa fa-user fa-fw" style="color: #980799;"></i></i><?= $_SESSION['auth_user']['user_fname'] ?> <?= $_SESSION['auth_user']['user_lname'] ?></a>
            
    <div class="dropdown-menu"> 
        <a class="dropdown-item" href="user/profile.php" style="color: #980799;">My profile</a>
          <form action="logout.php" method="POST">
              <button name="logout_btn" type="submit" class="dropdown-item" style="color: #980799;">Logout</button>
           </form>
        </li>
          <?php else: ?>

         <button data-toggle="modal" data-target="#register_modal" type="button" class="btn .sign"><a style="text-decoration: none; color: #fff;">
            Sign up<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16" style="margin: 0px 0px 1.5px 5px;">
              <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
              <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg>
          </a></button>
        <?php endif; ?>
      </div>
          </ul>
          </nav>
        </div>


    <!-- Floating icon Section -->
    <nav class="side">
      <ul class="ulimage mb-0">
        <li class="hover_effect">
          <a
            href="https://www.facebook.com/budzlaundryhub/"
            target="facebook-profile"
            class="hoverA text-decoration-none"
          >
            <img src="Navigation Bar/facebook.JPG" alt="" class="side-media" />
            <span class="hoverp" style="color: #fff;">FACEBOOK</span>
          </a>
        </li>
        <li>
          <a href="#" class="hoverA text-decoration-none">
            <img
              src="Navigation Bar/messenger.png"
              alt=""
              class="side-media"
            />
            <span class="hoverp" style="color: #fff;">MESSENGER</span>
          </a>
        </li>
        <li>
          <a href="#" class="hoverA text-decoration-none">
            <img src="Navigation Bar/gmail.JPG" alt="" class="side-media" />
            <span class="hoverp" style="color: #fff;">TWITTER</span>
          </a>
        </li>
      </ul>
    </nav>

    <br />
      <br />
      <br />
      <?php include 'message.php'; ?>
      
    <!-- Schedule of Book Section -->

    <div class="row" id="contact_id">
      <div class="container mt-1">
        <h2 class="pb-2 border-bottom text-center text-transform-uppercase">
          SELECT DATE AND TIME
        </h2>
       
        <div class="row">
          <div class="col-md-6">
          <form action="bookingcode.php" name="booking_form" id="booking_form"class="form_container" method="POST">
              
           
              <div class="col-lg-6">
              <div class="form-group">
              <label style=" margin-left: 50px;
                position: absolute;
                right: -72px;
                bottom: 28px;"
                for="">(date & time):</label>
              <input
                type="datetime-local"
                id="book_date"
                name="book_date"
                min="2022-21-04"
                style="margin-left: 140px;"       
                required
              />       
                
          <?php
          $id = $_SESSION['user_id'];
          $query = "SELECT * FROM users WHERE user_id = '$id' ";
          $query_run = mysqli_query($db, $query);

          if(mysqli_num_rows($query_run) > 0)
          {
              foreach($query_run as $row)
              {
                  ?>
                  <input name="b_user_id" id="b_user_id" type="hidden" value="<?= $row['user_id']; ?>">
                  <input name="b_fname" id="b_fname" type="hidden" value="<?= $row['fname']; ?>">
                  <input name="b_lname" id="b_lname" type="hidden" value="<?= $row['lname']; ?>">
                  <input name="b_number" id="b_number" type="hidden" value="<?= $row['number']; ?>">
                  <input name="b_email" id="b_email" type="hidden" value="<?= $row['email']; ?>">
              <?php
              }
            }
            ?>
           
              </div>
              </div>
                <div class="row">
  
                  <div class="col-12">
                    <div class="form-group">
                      <textarea
                        id="b_message"
                        name="b_message"
                        class="form-control"
                        placeholder="Message (Optional)"
                        rows="3"  
                      ></textarea>
                    </div>
                  </div>
                <div class="col-12">
                  <button
                    id="sched_btn"
                    name="sched_btn"
                    type="submitt"
                    class="btn btn-primary"
                    style="margin-right: 9em;"
                  >
                    SUBMIT
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-send"
                      viewBox="0 0 16 16"
                      style="margin-left: 2px;"
                    >
                      <path
                        d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"
                      />
                    </svg>
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6 text-center">
            <img src="Book/budzimages2.png" alt="" style="width: 400px;">
          </div>
        </div>
      </div>
    </div>
    <div class="date_time_container container text-center">
            <h2 class="border-bottom" style="font-size: 30px; padding-bottom: 10px; color:#980799; font-weight: 700;">UPDATES</h1>
            
        <div class="slideshow-container d-flex justify-content-center align-items-center mt-5">
            <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="schedule&zipcode/own_pic.png" style="width:70%; height: 100%; box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px,
            rgba(0, 0, 0, 0.05) 0px 5px 10px;">
        </div>
            <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="schedule&zipcode/update.png" style="width: 50%; height: 50%; box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px,
        rgba(0, 0, 0, 0.05) 0px 5px 10px;">
        </div>
            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="schedule&zipcode/calumpang_branch.jpg" style="width:50%; box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px,
                rgba(0, 0, 0, 0.05) 0px 5px 10px;">
          </div>

        </div>
          <br>
            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
          </div>
        </div>

        <div class="footer-container border-top" style="color:#980799;">
      <h3 class="social-med-h3">Social Media Accounts:</h3>
      <ul class="links-ul">
        <li class="">
          <a href="https://www.facebook.com/budzlaundryhub/">
            <img src="Footer/facebook.JPG" alt="" class="image-footer" />
          </a>
        </li>
        <li class="">
          <a href="">
            <img src="Footer/gmail.JPG" alt="" class="image-footer" />
          </a>
        </li>
        <li class="">
          <a href="#">
            <img src="Footer/instagram.JPG" alt="" class="image-footer" />
          </a>
        </li>
        <li class="">
          <a href="">
            <img src="Footer/twitter.png" alt="" class="image-footer" />
          </a>
        </li>
      </ul>
      <footer class="py-2 my-4">
        <ul class="nav justify-content-center pb-3 mb-3">
          <li class="nav-item">
            <a href="index.php" class="nav-link px-2">Home</a>
          </li>
          <li class="nav-item">
            <a href="serviceandpricing.php" class="nav-link px-2">Services & Prices</a>
          </li>
          <li class="nav-item">
            <a href="contacts.php" class="nav-link px-2">Contact</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2">About</a>
          </li>
        </ul>
        <p class="text-center">
          &copy; Copyright © 2022 PowerWash Laundromat, Inc. All Rights Reserved
        </p>
      </footer>
    </div>
        
        <script>
            let slideIndex = 0;
            showSlides();
            
            function showSlides() {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("dot");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}    
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
              setTimeout(showSlides, 4000); // Change image every 2 seconds
            }
            </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>


<!-- signup form modal -->

<div class="modal fade" id="register_modal" tabindex="-1" 
    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTitle">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group mb-3">
        <form action="registercode.php" method="POST" id="register_form">
                <label>First Name <a style="color: red;">*</a></label>
                <input type="text" name="fname" id="fname" placeholder="Enter First Name" class="form-control"  required>
            </div>
            <div class="form-group mb-3">
                <label>Last Name</label>
                <input type="text" name="lname" id="lname" placeholder="Enter Last Name" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <label>Number</label>
                <input type="text" name="number" id="number" placeholder="Enter Number" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <label>Email <a style="color: red;">*</a></label>
                <input type="text" name="email" id="email" placeholder="Enter Email Address" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Address <a style="color: red;">*</a></label>
                <input type="text" name="address" id="address" placeholder="Enter Address" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Password <a style="color: red;">*</a></label>
                <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label>Confirm Password <a style="color: red;">*</a></label>
                <input type="password" name="cpassword" id="cpassword" placeholder="Enter Confirm Password" class="form-control"required>
            </div>
                <div class="form-group mb-3">
                <button type="submit" class="btn_register" name="btn_register">
                 Register
                </button>
                </div>
                <div class="form-group mb-3">
                    <label>Already have an Account?<a class="link" href="" data-target="#login_modal"  data-toggle="modal" class="close" data-dismiss="modal" aria-label="Close"> Login Here!</a></label>
                </div>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- modal login -->

<div class="modal fade" id="login_modal" tabindex="-1" 
    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group mb-3">
      
      <form action="logincode.php"method="POST">
            <div class="form-group mb-3">
                <label>Email</label>
                <input name="email" type="text" placeholder="Enter Email Address" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Password</label>
                <input name="password" type="password" placeholder="Enter Password" class="form-control">
            </div>
                <div class="form-group mb-3">
                    <button name="login_btn" type="submit" class="btn_login">Login Now</button>
                </div>
                <div class="form-group mb-3">
                    <label>Don't have an Account yet?<a a class="link" href="" data-target="#register_modal"  data-toggle="modal" class="close" data-dismiss="modal" aria-label="Close"> Register Now!</a></label>
                </div>
        </form>
    
      </div>
    </div>
  </div>
</div>
 </div>

