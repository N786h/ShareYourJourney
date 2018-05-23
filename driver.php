<?php
    session_start();
    if(!isset($_SESSION['username']))
        header('location:signin.php');  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ShareYourJourney</title>
        <link href="https://fonts.googleapis.com/css?family=Nova+Square" rel="stylesheet">
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
<body style="background-color: #13f798">
    
    <div>
            <header>
                <div class="login_img">
                    <img src=images/<?php echo $_SESSION['username'];?>.jpeg alt=<?php echo $_SESSION['username'];?> height=50 width=50 border=5/><br>
                    <?php echo "Welcome<br>".$_SESSION['username'];?>
                </div>
                <nav>
                    <ul>
                        <li><a href="LoginHome.php">LoginHome</a></li>
                        <li><a href="dhistory.php">History</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
                <a href="index.html"><img src="images/logo.jpg" height=100 width=100 border=5/></a>
            </header>

                
    <script type="text/javascript">
        var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        google.maps.event.addDomListener(window, 'load', function () {
            new google.maps.places.SearchBox(document.getElementById('txtSource'));
            new google.maps.places.SearchBox(document.getElementById('txtDestination'));
            directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
        });

        function GetRoute() {
            var sultanpur = new google.maps.LatLng(26.289664, 82.080574);
            var mapOptions = {
                zoom: 16,
                center: sultanpur
            }
            map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('dvPanel'));

            //DIRECTIONS AND ROUTE
            source = document.getElementById("txtSource").value;
            destination = document.getElementById("txtDestination").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //DISTANCE AND DURATION
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distance = response.rows[0].elements[0].distance.text;
                    var duration = response.rows[0].elements[0].duration.text;
                    var dvDistance = document.getElementById("dvDistance");
                    dvDistance.innerHTML = "";
                    dvDistance.innerHTML += "Distance: " + distance + "<br />";
                    dvDistance.innerHTML += "Duration:" + duration;

                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
    </script>

<section id="main" class="boxed">
<form action="DriverDb.php" method="post" id="route" class="login-form">
    <table border="0" cellpadding="0" cellspacing="3">
        <tr>
            <td>
                <label>Seat</label>
                <input type="number" name="seat" style="width: 300px" required autofocus=""><br>
                <label>Vehicle No.</label>
                <input type="text" name="VehicleNo" style="width: 300px" required><br>
                <label>Source</label>
                <input type="text" name="source" id="txtSource" style="width: 300px" required><br>
                <label>Destination</label>
                <input type="text" name="destination" id="txtDestination" style="width: 300px" required><br>
                <input type="button" value="Get Route" id="matchRoot" onclick="GetRoute()" />
                <input type="submit" name="submit" value="Next">
                <div id="dvDistance">
                </div>
            </td>
        
            <td>
                <div id="dvMap" class="dvMap" style="width: 600px; height: 500px;">
                </div>
            </td>
            <td>
                <div id="dvPanel" class="dvPanel" style="width: 400px; height: 500px;">
                </div>
            </td>
        </tr>
    </table>
    </form><br />
    </section>
</div>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</body>
</html>