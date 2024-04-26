<?php
include_once("function.php");
$insertTrip = new DB_con();

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    $event = $_POST['event'];
    $sql = $insertTrip->event($name, $email, $nationality, $event);
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

     <link rel="shortcut icon" href="img/elements/fav.html">

     <meta name="author" content="colorlib">

     <meta name="description" content="">

     <meta name="keywords" content="">

     <meta charset="UTF-8">

     <title>Side Event</title>
     <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700" rel="stylesheet">
     <link rel="stylesheet" href="css/linearicons.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/nice-select.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="css/main.css">
     <script nonce="cf2b08a0-5665-4661-a205-8353a6380cec">
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
              <!-- <li><a href="side-event.php" style="color: #feffff !important;">Side Event</a></li> -->
            </ul>
          </nav>
        </div>
      </div>
    </header>
     <section class="banner-area relative" id="home">
         <div class="overlay overlay-bg"></div>
         <div class="container">
             <div class="row d-flex align-items-center justify-content-center">
                 <div class="about-content col-lg-12">
                     <h1 class="text-white">
                        Side Event
                     </h1>
                 </div>
             </div>
         </div>
     </section>
     <section class="contact-page-area section-gap">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <form class="form-area " class="contact-form text-right" role="form" autocomplete="off" method="POST" action="" name="event">
                         <div class="row">
                             <div class="col-lg-12 form-group">
                                 <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
                                 <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
                                 <input name="nationality" placeholder="Enter Your Nationality" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
                                 
                                    <select name="event" required class="common-input mb-20 form-control">
                                      <option value="" disabled selected hidden>Side Event</option>
                                      <option value="Breakfast Meeting on Launching the Action research for learning- TPSP (Date: 16th May; Time: 08:30 – 09:30)">Breakfast Meeting on Launching the Action research for learning- TPSP (Date: 16th May; Time: 08:30 – 09:30)</option>
                                      <option value="Social dialogue and future of Work (Date: 16th May; Time: 11:45 - 13:00)">Social dialogue and future of Work (Date: 16th May; Time: 11:45 - 13:00)</option>
                                      <option value="Center of Excellence: Rwanda Coding Academy">Center of Excellence: Rwanda Coding Academy</option>
                                      <option value="TVET and Future of Work (Date: 18th May; Time: 14:00 – 16:45)"> TVET and Future of Work (Date: 18th May; Time: 14:00 – 16:45)</option>
                                      <option value="Youth Employment and Private engagement (Date: 18th May; 11:00 – 13:00)"> Youth Employment and Private engagement (Date: 18th May; 11:00 – 13:00)</option>
                                      <option value="Building pathways to sustainable growth: Strengthening TVET and Productive Sector Linkages in Africa (16th May; Time: 10:30 – 12:00)">Building pathways to sustainable growth: Strengthening TVET and Productive Sector Linkages in Africa (16th May; Time: 10:30 – 12:00)</option>
                                    </select>                  
                                 <div class="mt-20 alert-msg" style="text-align: left;"></div>
                             </div>
                             <div class="col-lg-12 form-group">
                             <input type="submit" class="primary-btn mt-20 text-white" style="float: right;" value="Confirm Your Spot Booking" name="submit">
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
     <script src="../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="js/vendor/bootstrap.min.js"></script>
     <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
     <script src="../../../code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

     <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
     <script>
         window.dataLayer = window.dataLayer || [];

         function gtag() {
             dataLayer.push(arguments);
         }
         gtag('js', new Date());

         gtag('config', 'UA-23581568-13');
     </script>
     <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7c61f8dfb8df9cd0","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
 </body>
 </html>