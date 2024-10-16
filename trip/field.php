<?php
include_once("function.php");
$insertTrip = new DB_con();

// Fetch total allowed slots based on the trip selected (could be from DB or a predefined value)
function getTotalAllowedSlots($trip) {
    // Example logic to fetch total slots, replace with your DB logic
    switch ($trip) {
        case "Bugesera International Airport (Limited Slots)":
            return 30;
        case "Nyabarongo II Multipurpose Dam":
            return 80;
        case "Norrsken House Kigali":
            return 80;
        case "Amahoro Stadium":
            return 100;
        case "Bridge to Prosperity":
            return 100;
        default:
            return 0; // Default case
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $trip = $_POST['trip'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $hotel = $_POST['hotel'];
    $profession = $_POST['profession'];

    // Fetch the total number of booked trips and local trips
    $totalTrip = $insertTrip->TotalTrips($trip);
    $totalTripLoc = $insertTrip->TotalLocalByTrip($trip);

    // Get the total allowed slots dynamically based on the trip
    $totalAllowed = getTotalAllowedSlots($trip);

    // Check if there are available slots before booking
    if (($totalTrip + 1) <= $totalAllowed) {
        if ($profession == "Rwanda") {
            // Check if local slots are still available
            if (($totalTripLoc / $totalAllowed) * 100 < 100) {
                // Insert the booking into the database
                $sql = $insertTrip->insert($trip, $name, $email, $phone_number, $hotel, $profession);
                echo "<script>showCustomAlert('Slot Booked');</script>";
            } else {
                // No local slots available
                echo "<script>showCustomAlert('No available local slots');</script>";
            }
        } else {
            // Non-local user booking
            $sql = $insertTrip->insert($trip, $name, $email, $phone_number, $hotel, $profession);
            echo "<script>showCustomAlert('Slot Booked');</script>";
        }
    } else {
        // No available slots at all
        echo "<script>showCustomAlert('Slot Fully Booked');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- (existing head content) -->
</head>
<body>
    <div id="customAlert" class="modal">
        <div class="modal-content">
            <span id="closeModal" class="close">&times;</span>
            <p id="alertMessage"></p>
        </div>
    </div>

    <section class="model-area section-gap" id="cars">
        <!-- (existing section content) -->
        <form class="form" role="form" method="POST" action="" name="insert">
            <div class="form-group row">
                <div class="col-md-12 wrap-left">
                    <div id="default-select">
                        <select class="form-control" name="trip" required id="select-element-trip" onchange="updateAvailableSlots()">
                            <option value="" disabled selected hidden>Field Visit Location</option>
                            <option value="Bugesera International Airport (Limited Slots)">Bugesera International Airport (Limited Slots)</option>
                            <option value="Nyabarongo II Multipurpose Dam">Nyabarongo II Multipurpose Dam</option>
                            <option value="Norrsken House Kigali">Norrsken House Kigali</option>
                            <option value="Amahoro Stadium">Amahoro Stadium</option>
                            <option value="Bridge to Prosperity">Bridge to Prosperity</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="from-group">
                <input class="form-control txt-field" type="email" name="email" placeholder="Email address" required>
                <input class="form-control txt-field" type="text" name="name" placeholder="Your name" required>
                <input class="form-control txt-field" type="tel" name="phone_number" placeholder="Phone number">
                <input class="form-control txt-field" type="text" name="hotel" placeholder="Hotel" required>
                <input class="form-control txt-field" type="text" name="profession" placeholder="Nationality" required>
                <input type="hidden" name="number" id="totalSlots" value=""/>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase" value="Confirm Booking" name="submit">
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script>
        // Function to dynamically update the total slots available
        function updateAvailableSlots() {
            var trip = document.getElementById("select-element-trip").value;
            var totalSlots = 0;

            switch (trip) {
                case "Bugesera International Airport (Limited Slots)":
                    totalSlots = 30;
                    break;
                case "Nyabarongo II Multipurpose Dam":
                    totalSlots = 80;
                    break;
                case "Norrsken House Kigali":
                    totalSlots = 80;
                    break;
                case "Amahoro Stadium":
                    totalSlots = 100;
                    break;
                case "Bridge to Prosperity":
                    totalSlots = 100;
                    break;
                default:
                    totalSlots = 0;
            }

            document.getElementById("totalSlots").value = totalSlots;
        }
    </script>
</body>
</html>