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
</head>
<body>
<div id="customAlert" class="modal">
  <div class="modal-content">
    <span id="closeModal" class="close">&times;</span>
    <p id="alertMessage"></p>
  </div>
</div>

<?php
include_once("function.php");
$insertTrip = new DB_con();

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $trip = $_POST['trip']; // this is the name of the person paying ?
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
