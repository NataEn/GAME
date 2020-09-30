<?php 
     session_start();

     //conect classes
     include("classes/connect.php");
     include("classes/signin.php");
     include("classes/user.php");
     include("classes/add.php");
     //include("classes/image.php");

     

     $signin = new Signin();
     $userid = $signin->check_signin($_SESSION['doorban_userid']);
     $userid= $userid['userid'];
    


      
            ?>
            <html>
            <head>
                <title>Add new point | Doorban</title>
                <meta name="viewport" content="width=device-width"/>
                <link rel="stylesheet" type="text/css "href="./css/profile.css">
                <link rel="stylesheet" href="css/user-map.css" type="text/css"/>

                <!-- google API &key=    -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                <script type="text/javascript"
               
                        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyCRLmpZiLZ9e-p6wRbwGWH6_1AS5M31vSI">
                </script>
            </head>
         <body>
    

            <!--top bar-->
            <div>
            <?php include("header.php");?>

            </div>


    <div id="map"></div>
    <script>
        //alert("When you add a new point you accept the add rules of the game , for more information check the ruls page ");
        /**
         * Create new map
         */
        var infowindow;
        var map;
        var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
        var myOptions = {
            zoom: 3,
            center: new google.maps.LatLng(46.87916, -3.32910),
            mapTypeId: 'roadmap'
        };
        map = new google.maps.Map(document.getElementById('map'), myOptions);

        /**
         * Global marker object that holds all markers.
         * @type {Object.<string, google.maps.LatLng>}
         */
        var markers = {};

        /**
         * Concatenates given lat and lng with an underscore and returns it.
         * This id will be used as a key of marker to cache the marker in markers object.
         * @param {!number} lat Latitude.
         * @param {!number} lng Longitude.
         * @return {string} Concatenated marker id.
         */
        var getMarkerUniqueId= function(lat, lng) {
            return lat + '_' + lng;
        };

        /**
         * Creates an instance of google.maps.LatLng by given lat and lng values and returns it.
         * This function can be useful for getting new coordinates quickly.
         * @param {!number} lat Latitude.
         * @param {!number} lng Longitude.
         * @return {google.maps.LatLng} An instance of google.maps.LatLng object
         */
        var getLatLng = function(lat, lng) {
            return new google.maps.LatLng(lat, lng);
        };

        /**
         * Binds click event to given map and invokes a callback that appends a new marker to clicked location.
         */
        var addMarker = google.maps.event.addListener(map, 'click', function(e) {
            var lat = e.latLng.lat(); // lat of clicked point
            var lng = e.latLng.lng(); // lng of clicked point
            var markerId = getMarkerUniqueId(lat, lng); // an that will be used to cache this marker in markers object.
            var marker = new google.maps.Marker({
                position: getLatLng(lat, lng),
                map: map,
                animation: google.maps.Animation.DROP,
                id: 'marker_' + markerId,
                html: "    <div  id='info_"+markerId+"'>\n" +
                "        <table  class=\"map1\">\n" +
                "                <tr><td><a>Description:</a></td></tr>\n" +   
                "                <tr><td><textarea id='manual_description' placeholder='Write the name of the place or other description'></textarea></td></tr>\n" +
                "                <tr><td><a>Question:</a></td></tr>\n" + 
                "                <tr><td><input  id='question' placeholder='Write a Question'/></td></tr>\n" + 
                "                <tr><td><a>Choice1:</a></td></tr>\n" + 
                "                <tr><td><input  id='choice1' placeholder='Choice1'/></td></tr>\n" + 
                "                <tr><td><a>Choice2:</a></td></tr>\n" + 
                "                <tr><td><input  id='choice2' placeholder='Choice2'/></td></tr>\n" + 
                "                <tr><td><a>Choice3:</a></td></tr>\n" + 
                "                <tr><td><input  id='choice3' placeholder='Choice3'/></td></tr>\n" + 
                "                <tr><td><a>Choice4:</a></td></tr>\n" + 
                "                <tr><td><input  id='choice4' placeholder='Choice4'/></td></tr>\n" +    
                "                <tr><td><a>Correct Choice:</a></td></tr>\n" + 
                "                <tr><td><input type='number' id='corect_choice' placeholder='Correct Choice 1/2/3/4?'/></td></tr>\n" + 
                "                <tr><td><a>About:</a></td></tr>\n" + 
                "                <tr><td><input  id='about' placeholder='Add about '/></td></tr>\n" + 
   
                "                <tr><td><input type='hidden' id='userid'  value='<?php echo $userid;?>' /></td></tr>\n" + 
                "               <tr></td><td><input id='button1' type='submit' value='Save' onclick='saveDataLocation("+lat+","+lng+")'/></td></tr>\n" +
                "        </table>\n" +
                "    </div>"
            });                        
            markers[markerId] = marker; // cache marker in markers object
            bindMarkerEvents(marker); // bind right click event to marker
            bindMarkerinfo(marker); // bind infowindow with click event to marker
        });

        /**
         * Binds  click event to given marker and invokes a callback function that will remove the marker from map.
         * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
         */
        var bindMarkerinfo = function(marker) {
            google.maps.event.addListener(marker, "click", function (point) {
                var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                var marker = markers[markerId]; // find marker
                infowindow = new google.maps.InfoWindow();
                infowindow.setContent(marker.html);
                infowindow.open(map, marker);
                // removeMarker(marker, markerId); // remove it
            });
        };

        /**
         * Binds right click event to given marker and invokes a callback function that will remove the marker from map.
         * @param {!google.maps.Marker} marker A google.maps.Marker instance that the handler will binded.
         */
        var bindMarkerEvents = function(marker) {
            google.maps.event.addListener(marker, "rightclick", function (point) {
                var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng.lng()); // get marker id by using clicked point's coordinate
                var marker = markers[markerId]; // find marker
                removeMarker(marker, markerId); // remove it
            });
        };

        /**
         * Removes given marker from map.
         * @param {!google.maps.Marker} marker A google.maps.Marker instance that will be removed.
         * @param {!string} markerId Id of marker.
         */
        var removeMarker = function(marker, markerId) {
            marker.setMap(null); // set markers setMap to null to remove it from map
            delete markers[markerId]; // delete marker instance from markers object
        };


        /**
         * loop through (Mysql) dynamic locations to add markers to map.
         */
        var i ; var confirmed = 0;
        for (i = 0; i < location.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon :   locations[i][4] === '1' ?  red_icon  : purple_icon,
                html: "<div>\n" +
                "<table class=\"map1\">\n" +
                "<tr>\n" +
                "<td><a>Description:</a></td>\n" +
                "<td><textarea disabled id='manual_description' placeholder='Description'>"+locations[i][3]+"</textarea></td></tr>\n" +
                "</table>\n" +
                "</div>"
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow = new google.maps.InfoWindow();
                    confirmed =  locations[i][4] === '1' ?  'checked'  :  0;
                    $("#confirmed").prop(confirmed,locations[i][4]);
                    $("#location_id").val(locations[i][0]);
                    $("#description").val(locations[i][3]);
                    $("#question").val(locations[i][5]);
                    $("#about").val(locations[i][6]);
                    $("#userid").val(locations[i][7]);
                    $("#corect_choice").val(locations[i][2]);
                    $("#choice1").val(locations[i][3]);
                    $("#choice2").val(locations[i][3]);
                    $("#choice3").val(locations[i][3]);
                    $("#choice4").val(locations[i][3]);
                    
                    $("#form").show();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

        /**
         * SAVE save marker from map.
         * @param lat  A latitude of marker.
         * @param lng A longitude of marker.
         */
        function saveDataLocation(lat,lng) {
            var description = document.getElementById('manual_description').value;
            var question = document.getElementById('question').value;
            var about = document.getElementById('about').value;
            var userid = document.getElementById('userid').value;
            var corect_choice = document.getElementById('corect_choice').value;
            var choice1 = document.getElementById('choice1').value;
            var choice2 = document.getElementById('choice2').value;
            var choice3 = document.getElementById('choice3').value;
            var choice4 = document.getElementById('choice4').value;
           
            var url = 'classes/locations_model.php?add_location&description=' + description + '&lat=' + lat + '&lng=' + lng + '&question=' + question  + '&about=' + about + '&userid=' + userid + '&corect_choice=' + corect_choice + '&choice1=' + choice1 + '&choice2=' + choice2+ '&choice3=' + choice3+ '&choice4=' + choice4;
            downloadUrl(url, function(data, responseCode) {
                if (responseCode === 200  && data.length > 1) {
                    var markerId = getMarkerUniqueId(lat,lng); // get marker id by using clicked point's coordinate
                    var manual_marker = markers[markerId]; // find marker
                    manual_marker.setIcon(purple_icon);
                    infowindow.close();
                    infowindow.setContent("<div style=' color: purple; font-size: 15px;'> Waiting for admin confirm!!</div>");
                    infowindow.open(map, manual_marker);

                    //direct to location question form 
                    window.location.href = "add_location_image.php";
     

                }else{
                    console.log(responseCode);
                    console.log(data);
                    infowindow.setContent("<div style='color: red; font-size: 25px;'>Inserting Errors</div>");
                }
            });
        }

        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    callback(request.responseText, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }


    </script>



        <script>
        var x = document.getElementById("map");
        function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
        }

        function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
        }



         function showError(error) {
            switch(error.code) {
            case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
            case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
            case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
            case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
        }
        }


           function showPosition(position) {
                var latlon = position.coords.latitude + "," + position.coords.longitude;

                var img_url = "https://maps.googleapis.com/maps/api/staticmap?center=
                "+latlon+"&zoom=14&size=400x300&sensor=false&key=YOUR_KEY";

                document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
                }
                </script>




<?php
include_once 'footer.php';

?>

