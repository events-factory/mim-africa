<?php
include_once("function.php");
$fetchdata = new DB_con(); 
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="img/fav.html">
  <meta name="author" content="codepixer">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta charset="UTF-8">
  <title>Field Visit</title>
  <link href="https://fonts.googleapis.com/cssff8c.css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <link rel="stylesheet" href="css/linearicons.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/nice-select.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
  
  
</head>
<body>
  <header id="header" id="home">
    <div class="container">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href=""><img src="img/image.png" alt="" title="" width="50" /></a>
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
  <section class="model-area section-gap" id="cars">
    <div class="container">
      <!-- <div class="row">
        <div class="col-10">
          <img src="img/header.jpg" alt=""  style="width: 100%">
        </div>
      </div> -->
      <div class="row d-flex justify-content-center pb-40">
        <div class="col-md-8 pb-40 header-text" style="padding-top: 35px !important">
        <h1>Trips</h1>
        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Trip</th>
                <th>Name</th>
                <th>email</th>
                <th>Phone Number</th>
                <th>Hotel</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            <?php                
              $sql=$fetchdata->getTrips();
              while($row=mysqli_fetch_array($sql))
              {    
            ?>
            <tr>
                <td><?php echo $row['1']; ?></td>
                <td><?php echo $row['2']; ?></td>
                <td><?php echo $row['3']; ?></td>
                <td><?php echo $row['4']; ?></td>
                <td><?php echo $row['5']; ?></td>
                <td><?php echo $row['6']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
        </div>
        <div class="col-md-8 pb-40 header-text" style="padding-top: 35px !important">
        <h1>Side Event</h1>
        <table id="side" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>Country</th>
                <th>Side Event</th>
                
            </tr>
        </thead>
        <tbody>
            <?php                
              $sql=$fetchdata->getSideEvent();
              
              while($row=mysqli_fetch_array($sql))
              {    
            ?>
            <tr>
                <td><?php echo $row['1']; ?></td>
                <td><?php echo $row['2']; ?></td>
                <td><?php echo $row['3']; ?></td>
                <td><?php echo $row['4']; ?></td>
               
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>
  <script>
    $(document).ready(function() {
    $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            lengthChange: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            pageLength: 25,
        });
    });
  </script>
  <script>
    $(document).ready(function() {
    $('#side').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
  </script>
 </body>
</html>