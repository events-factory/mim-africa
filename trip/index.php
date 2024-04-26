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
    $sql = $insertTrip->insert($trip, $name, $email, $phone_number, $hotel, $profession);
    if($sql)
    {
        echo "<script>alert('Slot Booked');</script>";
    }
    else
    {
        echo "<script>alert('Slot not Booked');</script>";
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
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="css/linearicons.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
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
          <li class="menu-active"><a href="field.php" style="color: #feffff !important;">Field Trip</a></li>
        </ul>
        </nav>
      </div>
    </div>
  </header>

  <section class="banner-home relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row fullscreen d-flex align-items-center justify-content-center">
        <div class="banner-content col-lg-12 col-md-6 ">
          <h1 class="text-white text-uppercase" style="margin: 15% auto;">
            Book Your Slot
          </h1>
          <a href="field.php" class="primary-btn text-uppercase">Field Trip</a>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/easing.min.js"></script>
  <script src="js/hoverIntent.js"></script>
  <script src="js/superfish.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>