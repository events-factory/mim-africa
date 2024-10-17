<?php
include_once("function.php");
$insertTrip = new DB_con();

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $trip = $_POST['trip']; // this is the name o the person paying ?
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $hotel = $_POST['hotel'];
    $profession = $_POST['profession'];

    $totalTrip = $insertTrip->TotalTrips($trip);
    $totalTripLoc = $insertTrip->TotalLocalByTrip($trip);

    $totalAllowed = $_POST['number'];

    if(($totalTrip+1) < $totalAllowed) {
      if($profession == "Rwanda") {
        if(($totalTripLoc/$totalAllowed)*100 < 100) {
          $sql = $insertTrip->insert($trip, $name, $email, $phone_number, $hotel, $profession);
          echo "<script>alert('Slot Booked');</script>";
          // echo "<script>showCustomAlert('Slot Booked');</script>";
        }else{
          // echo "<script>alert('No available slot');</script>";
          echo "<script>showCustomAlert('No available slot');</script>";
        }
      }else{
        $sql = $insertTrip->insert($trip, $name, $email, $phone_number, $hotel, $profession);
        echo "<script>alert('Slot Booked');</script>";
        // echo "<script>showCustomAlert('Slot Booked');</script>";
      }
    }else{
      echo "<script>alert('Slot Fully Booked');</script>";
      // echo "<script>showCustomAlert('Slot Fully Booked');</script>";
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
  <!-- other CSS files -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="css/linearicons.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fxSeDGAKxPXjX2c5g5Ri3EAhVG/5Hn6vKd8Swp1IPMxG6nRH9XUv4DjdtB6+jZn6iGh3/lOo3p8xatx6zO1I5Q==" crossorigin="anonymous" />
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

  <script nonce="2b08652c-5a00-46de-b293-4fb0d7c3a425">
    (function(w, d) {
      ! function(dk, dl, dm, dn) {
        dk[dm] = dk[dm] || {};
        dk[dm].executed = [];
        dk.zaraz = {
          deferred: [],
          listeners: []
        };
        dk.zaraz.q = [];
        dk.zaraz._f = function(dp) {
          return function() {
            var dq = Array.prototype.slice.call(arguments);
            dk.zaraz.q.push({
              m: dp,
              a: dq
            })
          }
        };
        for (const dr of ["track", "set", "debug"]) dk.zaraz[dr] = dk.zaraz._f(dr);
        dk.zaraz.init = () => {
          var ds = dl.getElementsByTagName(dn)[0],
            dt = dl.createElement(dn),
            du = dl.getElementsByTagName("title")[0];
          du && (dk[dm].t = dl.getElementsByTagName("title")[0].text);
          dk[dm].x = Math.random();
          dk[dm].w = dk.screen.width;
          dk[dm].h = dk.screen.height;
          dk[dm].j = dk.innerHeight;
          dk[dm].e = dk.innerWidth;
          dk[dm].l = dk.location.href;
          dk[dm].r = dl.referrer;
          dk[dm].k = dk.screen.colorDepth;
          dk[dm].n = dl.characterSet;
          dk[dm].o = (new Date).getTimezoneOffset();
          if (dk.dataLayer)
            for (const dy of Object.entries(Object.entries(dataLayer).reduce(((dz, dA) => ({
                ...dz[1],
                ...dA[1]
              }))))) zaraz.set(dy[0], dy[1], {
              scope: "page"
            });
          dk[dm].q = [];
          for (; dk.zaraz.q.length;) {
            const dB = dk.zaraz.q.shift();
            dk[dm].q.push(dB)
          }
          dt.defer = !0;
          for (const dC of [localStorage, sessionStorage]) Object.keys(dC || {}).filter((dE => dE.startsWith("_zaraz_"))).forEach((dD => {
            try {
              dk[dm]["z_" + dD.slice(7)] = JSON.parse(dC.getItem(dD))
            } catch {
              dk[dm]["z_" + dD.slice(7)] = dC.getItem(dD)
            }
          }));
          dt.referrerPolicy = "origin";
          dt.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(dk[dm])));
          ds.parentNode.insertBefore(dt, ds)
        };
        ["complete", "interactive"].includes(dl.readyState) ? zaraz.init() : dk.addEventListener("DOMContentLoaded", zaraz.init)
      }(w, d, "zarazData", "script");
    })(window, document);
  </script>
</head>
<body>
<div id="customAlert" class="modal">
  <div class="modal-content">
    <span id="closeModal" class="close">&times;</span>
    <p id="alertMessage"></p>
  </div>
</div>
  <!-- <header id="header" id="home">
    <div class="container">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="index.php"><img src="img/image.png" alt="" title="" width="50" /></a>
        </div>
        <nav id="nav-menu-container">
        <ul class="nav-menu">
          
        </ul>
        </nav>
      </div>
    </div>
  </header> -->
  <section class="model-area section-gap" id="cars" style="background:url(img/5234064.jpg)">

    <div class="container">
      <!-- <div class="row">
        <div class="col-10">
          <img src="img/header.jpg" alt=""  style="width: 100%">
        </div>
      </div> -->
      <div class="row d-flex justify-content-center pb-40">
        <div class="col-md-8 pb-40 header-text" style="padding-top: 35px !important">
          <h1 class="text-center pb-10">Site Visits Registrations are now closed</h1>
        </div>
      </div>
      <div class="active-model-carusel">
        <div class="row align-items-center single-model item">
          <div class="col-lg-6 model-left">
            <div class="title justify-content-between d-flex">
              <h4 class="mt-20"></h4>
              <!-- <h2>30<span>Slots</span></h2> -->
            </div>
            <!-- <p>
            Located 40 kilometers south of Kigali, the new Bugesera International Airport is scheduled for completion by late 2026, with an estimated cost of $2 billion. The airport will feature a 130,000-square-meter main terminal building designed to handle 8 million passengers annually, with future expansions expected to accommodate more than 14 million. Additionally, the airport will include a cargo terminal with the capacity to process 150,000 tons of cargo per year. This development is set to position Rwanda as a significant aviation hub in Africa, contributing to both national and regional economic growth.
            
            </p>
            <button class="text-uppercase primary-btn" onclick="pickchoice('Bugesera International Airport (Limited Slots)', 41)" href="#home">Book a Slot Now</button>
           -->
          </div>
          <!-- <div class="col-lg-6 model-right">
            <img class="img-fluid field-img" src="img/bugesera.png" alt="">
          </div> -->
        </div>    

        <!-- <div class="row align-items-center single-model item">
          <div class="col-lg-6 model-left">
            <div class="title justify-content-between d-flex">
              <h4 class="mt-20">Nyabarongo II Multipurpose Dam</h4>
              <h2>80<span>Slots</span></h2>
            </div>
            <p>
              The Nyabarongo II Hydropower Plant is a vital multipurpose project for Rwanda’s renewable energy, water management, and agricultural development. 
              This hydropower project underscores Rwanda’s commitment to addressing both energy needs and environmental challenges.
            </p>
            
            <button class="text-uppercase primary-btn" onclick="pickchoice('Nyabarongo II Multipurpose Dam', 80)" href="#home">Book a Slot Now</button>
          </div>
          <div class="col-lg-6 model-right">
            <img class="img-fluid field-img" src="img/nyabarongo.jpg" alt="">
          </div>
        </div>

        <div class="row align-items-center single-model item">
          <div class="col-lg-6 model-left">
            <div class="title justify-content-between d-flex">
              <h4 class="mt-20">Norrsken House Kigali</h4>
              <h2>80<span>Slots</span></h2>
            </div>
            <p>
              Norrsken House Kigali stands as a beacon of sustainability and innovation, fostering entrepreneurship in the heart of Africa. Built on the historic premises of Ecole Belge, this 12,000-square-meter space blends Kigali’s rich heritage with forward-thinking design to create East Africa’s largest hub for entrepreneurship. 
            </p>
            <button class="text-uppercase primary-btn" onclick="pickchoice('Norrsken House Kigali', 80)" href="#home">Book a Slot Now</button>
          </div>
          <div class="col-lg-6 model-right">
            <img class="img-fluid field-img" src="img/NORRSKEN.png" alt="">
          </div>
        </div>
        <div class="row align-items-center single-model item">
          <div class="col-lg-6 model-left">
            <div class="title justify-content-between d-flex">
              <h4 class="mt-20">Amahoro Stadium</h4>
              <h2>100<span>Slots</span></h2>
            </div>
            <p>
              Amahoro stadium is a multi-purpose stadium in Kigali, Rwanda. It is the largest stadium in Rwanda with a capacity of 30,000 people. It is used mostly for football matches and it also has athletics facilities. The stadium hosted the opening ceremony and the football competition of the 2016 African Nations Championship.        
            </p>
            <button class="text-uppercase primary-btn" onclick="pickchoice('Amahoro Stadium', 100)" href="#home">Book a Slot Now</button>
          </div>
          <div class="col-lg-6 model-right">
            <img class="img-fluid field-img" src="img/amahoro.jpg" alt="">
          </div>
        </div>
        <div class="row align-items-center single-model item">
          <div class="col-lg-6 model-left">
            <div class="title justify-content-between d-flex">
              <h4 class="mt-20">Bridge to Prosperity</h4>
              <h2>100<span>Slots</span></h2>
            </div>
            <p>
            Gaseke is in Rwanda, about 30km North of Kigali, see the embedded map below to see where that is. Gaseke's Bridge to Prosperity is a suspension bridge, spanning 51m over the Mwange River. Previously all the population had to cross the bridge was a narrow metal beam which frequently got washed away during the flood season, making the river impassable. When the river cannot be safely crossed the communities are cut off from healthcare, education and markets, severely impacting their quality of life.
            </p>
            <button class="text-uppercase primary-btn" onclick="pickchoice('Bridge to Prosperity', 100)" href="#home">Book a Slot Now</button>
          </div>
          <div class="col-lg-6 model-right">
            <img class="img-fluid field-img" src="img/gaseke.jpg" alt="">
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <!-- <section class="banner-area relative" id="home"> -->
    <!-- <div class="overlay overlay-bg"></div> -->
    <!-- <div class="container">
      <div class="row fullscreen d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-md-12 header-right"> -->
          <!-- <h4 class="text-white pb-30">Book Your Spot Today! The Trip is from 8.30am</h4> -->
          <!-- <form class="form" role="form" autocomplete="off" method="POST" action="" name="insert"> -->
            <!-- <div class="form-group row">
              <div class="col-md-12 wrap-left">
                <div class="" id="default-select">
                  <select class="form-control" name="trip" required id="select-element-trip">
                    <option value="" disabled selected hidden>Field Visit Location</option>                   
                    <option value="Bugesera International Airport (Limited Slots)">Bugesera International Airport (Limited Slots)</option>
                    <option value="Nyabarongo II Multipurpose Dam">Nyabarongo II Multipurpose Dam</option>                  
                    <option value="Norrsken House Kigali">Norrsken House Kigali</option>      
                    <option value="Amahoro Stadium">Amahoro Stadium</option>  
                    <option value="Bridge to Prosperity">Bridge to Prosperity</option>         
                  </select>
                </div>
              </div>
            </div> -->
            <!-- <div class="from-group">
              <input class="form-control txt-field" type="email" id="email-filter" name="email" placeholder="Email address" required> -->
              <!-- <button id="email-filter-exist" class="btn btn-default btn-lg btn-block text-center text-uppercase">Verify</button> -->
              <!-- <div class="" id="rest-of-form">
                  <input class="form-control txt-field" type="text" id="fullname" name="name" placeholder="Your name" required>              
                  <input class="form-control txt-field" type="tel" id="phone_number" name="phone_number" placeholder="Phone number(Include Country Code)">
                  <input class="form-control txt-field" type="text" id="hotle" name="hotel" placeholder="Hotel(Where are you staying?)" required>
                  <input class="form-control txt-field" type="text" id="nationality" name="profession" placeholder="Nationality" required>
                  <input type="hidden" name="number" id="submit-formulla" value=""/>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <input type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase"  value="Confirm Booking" name="submit">
                    </div>
                  </div>
              </div> -->
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
          Copyright &copy;<script>
            document.write(new Date().getFullYear());
          </script> All rights reserved | Events Factory
        </p>
      </div>
    </div>
  </footer>
  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="js/easing.min.js"></script>
  <script src="js/hoverIntent.js"></script>
  <script src="js/superfish.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <!-- <script src="js/jquery.nice-select.min.js"></script> -->
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
  <script>
    function pickchoice(choice, number) {
      // Remove all existing options except the selected one
      // $('#select-element-trip option').remove();
      
      // Update the selected option with the new value
      $('#select-element-trip').append(`<option selected value="${choice}">${choice}</option>`);
      
      // Update the form input with the number value
      $('#submit-formulla').val(number);

      // Scroll to a div element with ID "myDiv"
      $('html, body').animate({
          scrollTop: $('#home').offset().top
      }, 1000);

    }


    // $('#email-filter-exist').on('click', function() {
    //   var email = $('#email-filter').val();
    //   if (email !== '') {
    //     var xhr = new XMLHttpRequest();
    //     xhr.addEventListener("readystatechange", function() {
    //       if(this.readyState === 4) {
    //         let res = JSON.parse(this.responseText);
    //         if(res.data) {
    //           // respinho2014@gmail.com
    //           $('#email-filter-exist').addClass('disabled');
    //           $('#fullname').val(res.data.firstName + ' ' + res.data.lastName);
    //           $('#phone_number').val(res.data.phone);
    //           $('#nationality').val(res.data.nationality)
    //           $('#rest-of-form').removeClass('disabled');
    //         }else{
    //           alert("Your email is not registered in our system. Please register first.")
    //         }
    //       }
    //     });

    //     xhr.open("GET", "https://app-ilorwanda2023.rw/api/application-by-email/"+email);
    //     xhr.setRequestHeader("Authorization", "Bearer eyJhbGciOiJIUzI1NiJ9.aWxvcndhbmRhMjAyMw.oUkLbDEWPkT96OeUu5W4mtIYXZBTeIgcvVaXGn4elBU");
    //     xhr.send();
    //   }
    // });
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7c61f86589599cb4","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>
</html>