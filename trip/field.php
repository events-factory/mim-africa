<?php
include_once("function.php");
$insertTrip = new DB_con();

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $trip = $_POST['trip'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $hotel = $_POST['hotel'];
    $profession = $_POST['profession'];

    $totalTrip = $insertTrip->TotalTrips($trip);
    $totalTripLoc = $insertTrip->TotalLocalByTrip($trip);

    $totalAllowed = $_POST['number'];

    if(($totalTrip+1) < $totalAllowed) {
      if($profession == "Rwanda") {
        if(($totalTripLoc/$totalAllowed)*100 < 30) {
          $sql = $insertTrip->insert($trip, $name, $email, $phone_number, $hotel, $profession);
          echo "<script>showCustomAlert('Slot Booked');</script>";
        }else{
          echo "<script>showCustomAlert('No available slot');</script>";
        }
      }else{
        $sql = $insertTrip->insert($trip, $name, $email, $phone_number, $hotel, $profession);
        echo "<script>showCustomAlert('Slot Booked');</script>";
      }
    }else{
      echo "<script>showCustomAlert('Slot Fully Booked');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="">
  <meta name="author" content="codepixer">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta charset="UTF-8">
  <title>Field Visit</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/nice-select.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/main.css">
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      width: 300px;
      text-align: center;
    }

    .close {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 20px;
      cursor: pointer;
    }
  </style>

<script>
// JavaScript to handle the custom alert modal
function showCustomAlert(message) {
  var modal = document.getElementById("customAlert");
  var alertMessage = document.getElementById("alertMessage");
  alertMessage.textContent = message;
  modal.style.display = "block";

  var closeModal = document.getElementById("closeModal");
  closeModal.onclick = function() {
    modal.style.display = "none";
  };

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };
}
</script>
</head>
<body>
<div id="customAlert" class="modal">
  <div class="modal-content">
    <span id="closeModal" class="close">&times;</span>
    <p id="alertMessage"></p>
  </div>
</div>

  <section class="model-area section-gap" id="cars" style="background:url(img/5234064.jpg)">
    <div class="container">
      <div class="row d-flex justify-content-center pb-40">
        <div class="col-md-8 pb-40 header-text" style="padding-top: 35px !important">
          <h1 class="text-center pb-10">Select Study Visit Location.</h1>
        </div>
      </div>
      <div class="active-model-carusel">
        <div class="row align-items-center single-model item">
          <div class="col-lg-6 model-left">
            <div class="title justify-content-between d-flex">
              <h4 class="mt-20">Bugesera International Airport</h4>
              <h2>30<span>Slots</span></h2>
            </div>
            <p>Located 40 kilometers south of Kigali, the new Bugesera International Airport is scheduled for completion by late 2026.</p>
            <button class="text-uppercase primary-btn" onclick="pickchoice('Bugesera International Airport (Limited Slots)', 41)" href="#home">Book a Slot Now</button>
          </div>
          <div class="col-lg-6 model-right">
            <img class="img-fluid field-img" src="img/bugesera.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row fullscreen d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-md-12 header-right">
          <h4 class="text-white pb-30">Book Your Spot Today! The Trip is from 8.30am</h4>
          <form class="form" role="form" autocomplete="off" method="POST" action="" name="insert">
            <div class="form-group row">
              <div class="col-md-12 wrap-left">
                <div class="" id="default-select">
                  <select class="form-control" name="trip" required id="select-element-trip">
                    <option value="" disabled selected hidden>Field Visit Location</option>
                    <option value="Bugesera International Airport (Limited Slots)">Bugesera International Airport (Limited Slots)</option>
                    <option value="Nyabarongo II Multipurpose Dam">Nyabarongo II Multipurpose Dam</option>
                    <option value="Norrsken House Kigali">Norrsken House Kigali</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="from-group">
              <input class="form-control txt-field" type="email" id="email-filter" name="email" placeholder="Email address" required>
              <div class="" id="rest-of-form">
                <input class="form-control txt-field" type="text" id="fullname" name="name" placeholder="Your name" required>              
                <input class="form-control txt-field" type="tel" id="phone_number" name="phone_number" placeholder="Phone number(Include Country Code)">
                <input class="form-control txt-field" type="text" id="hotel" name="hotel" placeholder="Hotel(Where are you staying?)" required>
                <input class="form-control txt-field" type="text" id="nationality" name="profession" placeholder="Nationality" required>
                <input type="hidden" name="number" id="submit-formulla" value=""/>
                <div class="form-group row">
                  <div class="col-md-12">
                    <input type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase" value="Confirm Booking" name="submit">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  
  <footer class="footer-area">
    <div class="container">
      <div class="row">
        <p class="mt-50 mx-auto footer-text col-lg-12">
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Events Factory
        </p>
      </div>
    </div>
  </footer>

<script>
// Function to handle selection
function pickchoice(choice, number) {
  $('#select-element-trip').append(`<option selected value="${choice}">${choice}</option>`);
  $('#submit-formulla').val(number);
  $('html, body').animate({ scrollTop: $('#home').offset().top }, 1000);
}
</script>

  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="js/easing.min.js"></script>
  <script src="js/hoverIntent.js"></script>
  <script src="js/superfish.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
