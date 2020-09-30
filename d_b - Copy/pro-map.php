<?php
session_start();


    include("classes/user-map.php");

// check if member is elegeble to play pro map new cordinations
$score = $_SESSION['score'];

if($score < 100000){
header("Location: add_sorry.php");
}

    


?>

<!DOCTYPE html>
<html>
<head>
    <title>Play Map | Doorban</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/user-map.css" type="text/css"/>
    </head>
<body>
 <!-- google API &key=  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyCRLmpZiLZ9e-p6wRbwGWH6_1AS5M31vSI"></script>
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRLmpZiLZ9e-p6wRbwGWH6_1AS5M31vSI&libraries=places"></script>

 <!--top bar-->
 <div>
      <?php include("header.php");?>

 </div>


    <div id="map"></div>
    <script>
        /**
         * Create new map
         */
        var infowindow;
        var map;
        var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
        
        var locations = <?php get_confirmed_locations() ?>;
        var myOptions = {
            zoom: 7,
            center: new google.maps.LatLng(31.87916, 35.32910),
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
         * loop through (Mysql) dynamic locations to add markers to map.
         */
        var i ; var confirmed = 0;
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon :   locations[i][4] === '1' ?  red_icon  : purple_icon,
                html: "<div id='window_loc'>\n" +
                "<form method='GET' action='question.php'>\n" +
                "<table class=\"map1\">\n" +
                "<tr>\n" +
                "<td><input type='hidden'  id='manual_description'/>"+locations[i][3]+"</td></tr>\n" +
                "<tr>\n" +
                "<td><textarea disabled  id='question' placeholder='Question'>"+locations[i][5]+"</textarea></td></tr>\n" +
                "<tr>\n" +
                "<td><input type='hidden' name='location_id' id='location_id' value="+locations[i][0]+" /></td></tr>\n" +
                "<tr>\n" +
                "<td><input type='hidden' name=userid' id='userid' value="+locations[i][7]+" /></td></tr>\n" +
                "<td><input id='button1' name='play' type='submit' value='play'/> </td></tr>\n" +
                "</table>\n" +
                "</form>\n" +
                "</div>"
            });


            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow = new google.maps.InfoWindow();
                    confirmed =  locations[i][4] === '1' ?  'checked'  :  0;
                    $("#confirmed").prop(confirmed,locations[i][4]);
                    $("#location_id").val(locations[i][0]);
                    $("#description").val(locations[i][3]);
                    $("#userid").val(locations[i][7]);
                    $("#form").show();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
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





<?php
include_once 'footer.php';

?>

