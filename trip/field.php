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
        if(($totalTripLoc/$totalAllowed)*100 < 30) {
          $sql = $insertTrip->insert($trip, $name, $email, $phone_number, $hotel, $profession);
          echo "<script>alert('Slot Booked');</script>";
        }else{
          echo "<script>alert('No available slot');</script>";
        }
      }else{
        $sql = $insertTrip->insert($trip, $name, $email, $phone_number, $hotel, $profession);
        echo "<script>alert('Slot Booked');</script>";
      }
    }else{
      echo "<script>alert('Slot Fully Booked');</script>";
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
  <header id="header" id="home">
    <div class="container">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="index.php"><img src="img/image.png" alt="" title="" width="50" /></a>
        </div>
        <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="field.php" style="color: #feffff !important;">Study Trip</a></li>
          <!-- <li><a href="side-event.php" style="color: #feffff !important;">Side Event</a></li> -->
        </ul>
        </nav>
      </div>
    </div>
  </header>
  <section class="model-area section-gap" id="cars" style="background:url(img/5234064.jpg)">

    <div class="container">
      <!-- <div class="row">
        <div class="col-10">
          <img src="img/header.jpg" alt=""  style="width: 100%">
        </div>
      </div> -->
      <div class="row d-flex justify-content-center pb-40">
        <div class="col-md-8 pb-40 header-text" style="padding-top: 35px !important">
          <h1 class="text-center pb-10">Select Study visit location.</h1>
        </div>
      </div>
      <div class="active-model-carusel">
        
      <div class="row align-items-center single-model item">
          <div class="col-lg-6 model-left">
            <div class="title justify-content-between d-flex">
              <h4 class="mt-20">Karama IDP Model Village</h4>
              <h2>40<span>Slots</span></h2>
            </div>
            <p>
            -Location: Nyarugenge  District<br>
            -Socio-economic infrastructure facilities: Accommodation of 144 families (680 households) <br>
            -Labour intensive: Agribusiness activities like livestock (Cows, poultry,..),Agakiriro<br>
            -Environmental protection: Rwanda’s efforts in community development and welfare and relocation of population from high-risk zones<br>
            </p>
            <button class="text-uppercase primary-btn" onclick="pickchoice('Karama IDP Model Village', 201)" href="#home">Book a Slot Now</button>
          </div>
          <div class="col-lg-6 model-right">
            <img class="img-fluid field-img" src="img/karama.jpg" alt="">
          </div>
        </div>

        
        
        <div class="row align-items-center single-model item">
          <div class="col-lg-6 model-left">
            <div class="title justify-content-between d-flex">
              <h4 class="mt-20">Gisozi Genocide Museum</h4>
              <h2>60<span>Slots</span></h2>
            </div>
            <p>
            The Kigali Genocide Memorial commemorates the 1994 Rwandan genocide. The remains of over 250,000 people are interred there. There is a visitor centre for students and others wishing to understand the events leading up to the genocide that occurred in Rwanda in 1994.
            </p>
            <p>
              
            </p>
            <button class="text-uppercase primary-btn" onclick="pickchoice('Gisozi Genocide Museum', 41)" href="#home">Book a Slot Now</button>
          </div>
          <div class="col-lg-6 model-right">
            <img class="img-fluid field-img" src="img/gisozigenocidememorial.png" alt="">
          </div>
        </div>

        <div class="row align-items-center single-model item">
          <div class="col-lg-6 model-left">
            <div class="title justify-content-between d-flex">
              <h4 class="mt-20">MASAKA CREAMERY FACTORY</h4>
              <h2>40<span>Slots</span></h2>
            </div>
            <p>
            Rwanda embarked on promoting the local economic development by addressing some of the domestic private sector constraints such as availability of industrial and commercial land. The Government put in place the Kigali Special Economic Zone in which Masaka Creamery factory is located 20KM from central town.
            Masaka Creamery factory started in 2016 and later shifted to Kigali Special Economic Zone in 2018. It produces milk products like, fermented milk (Ikivuguto), yoghourt and butter).
            Fresh milk is bought from Gicumbi district, being the nearest, and the highest in milk production in the country. Currently they use more than 4000liters of Milk per day. Their biggest market is private sector (super markets and shops) both in and outside Rwanda.
            </p>
            <p>
              
            </p>
            <button class="text-uppercase primary-btn" onclick="pickchoice('MASAKA CREAMERY FACTORY', 101)" href="#home">Book a Slot Now</button>
          </div>
          <div class="col-lg-6 model-right">
            <img class="img-fluid field-img" src="img/masaka.jpg" alt="">
          </div>
        </div>
        
        <div class="row align-items-center single-model item">
          <div class="col-lg-6 model-left">
            <div class="title justify-content-between d-flex">
              <h4 class="mt-20">Nyandungu Urban Waterland Eco-tourism park</h4>
              <h2>60<span>Slots</span></h2>
            </div>
            <p>
            Nyandungu Urban Wetland Ecotourism park is a 120 hectares of surface area, Rwandan tourism park located between Gasabo and Kicukiro Districts which allows sustainable travel of people to enjoy natural areas and wild animals in Nyandungu Valley.
            </p>
            <p>
              
            </p>
            <button class="text-uppercase primary-btn" onclick="pickchoice('Nyandungu Urban Waterland Eco-tourism park', 21)" href="#home">Book a Slot Now</button>
          </div>
          <div class="col-lg-6 model-right">
            <img class="img-fluid field-img" src="img/nyandungu.png" alt="">
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
          <h4 class="text-white pb-30">Book Your Spot Today!</h4>
          <form class="form" role="form" autocomplete="off" method="POST" action="" name="insert">
            <div class="form-group row">
              <div class="col-md-12 wrap-left">
                <div class="" id="default-select">
                  <select class="form-control" name="trip" required id="select-element-trip">
                    <option value="" disabled selected hidden>Field Visit Location</option>
                    <option value="Pink Mango">Pink Mango</option>
                    <option value="Muhanga ICPC">Muhanga ICPC</option>
                    <option value="Center of Excellence: Rwanda Coding Academy">Center of Excellence: Rwanda Coding Academy</option>
                    <option value="IPRC Tumba">IPRC Tumba</option>
                    <option value="Ampersand in Kigali">Ampersand in Kigali</option>
                    <option value="Karama IDP Model Village">Karama IDP Model Village</option>
                    <option value="Gisozi Genocide Museum">Gisozi Genocide Museum</option>
                    <option value="Kigali City Tour">Kigali City Tour</option>
                    <option value="Nyandungu Urban Waterland Eco-tourism park">Nyandungu Urban Waterland Eco-tourism park</option>
                    <option value="Conference Infrastructure (KCC & BK Arena)">Conference Infrastructure (KCC & BK Arena)</option>
                    <option value="MASAKA CREAMERY FACTORY">MASAKA CREAMERY FACTORY</option>                 
                  </select>
                </div>
              </div>
            </div>
            <div class="from-group">
              <input class="form-control txt-field" type="email" id="email-filter" name="email" placeholder="Email address" required>
              <!-- <button id="email-filter-exist" class="btn btn-default btn-lg btn-block text-center text-uppercase">Verify</button> -->
              <div class="" id="rest-of-form">
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