<?php
    define('DB_SERVER','localhost');
    define('DB_USER','smartbookings');
    define('DB_PASS' ,'aime1995@');
    define('DB_NAME', 'fieldtrip');

    class DB_con
    {
        function __construct()
        {
            $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            $this->dbh = $con;
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        }
        public function insert($trip, $name, $email, $phone_number, $hotel, $profession)
        {
            $stmt = $this->dbh->prepare("INSERT INTO trips (trip, name, email, phone_number, hotel, profession) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $trip, $name, $email, $phone_number, $hotel, $profession);
            $ret = $stmt->execute();
            $stmt->close();
            return $ret;
        }
        public function event($name, $email, $nationality, $event)
        {
            $stmt = $this->dbh->prepare("INSERT INTO sideevent (name, email, nationality, event) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $nationality, $event);
            $ret = $stmt->execute();
            $stmt->close();
            return $ret;
        }
        public function getSideEvent()
        {
            $result = mysqli_query($this->dbh, "select * from sideevent");
            return $result;
        }
        
        public function getTrips()
        {
            $result = mysqli_query($this->dbh, "SELECT * FROM trips WHERE trip IN ('Bugesera International Airport (Limited Slots)', 'Nyabarongo II Multipurpose Dam', 'Norrsken House Kigali')");
            return $result;
        }

           
        public function TotalTrips($trip)  
        {
                $stmt = $this->dbh->prepare("SELECT COUNT(*) as trip_count FROM trips WHERE trip = '$trip' ;");
                $stmt->execute();
                $stmt->bind_result($count);
                $stmt->fetch();
                $stmt->close();
                return $count;
        }
        public function TotalLocalByTrip($trip)  
        {
            $stmt = $this->dbh->prepare("SELECT COUNT(*) as trip_count FROM trips WHERE trip = '$trip' AND profession = 'Rwanda'");
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
            return $count;
        }

    }   
?>
