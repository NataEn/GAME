<?php

            include("classes/locations_model.php");
            

?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
</head>
<body>
<style>

    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
 /* Always set the map height explicitly to define the size of the div
 * element that contains the map. */
    #map {
        height: 100%;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>




<div id="map"></div>

<!------ Include the above in your HEAD tag ---------->
<script>
    var map;
    var marker;
    var infowindow;
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
    var locations = <?php get_all_locations(); ?>;

    function initMap() {
        var france = {lat: 46.87916, lng: -3.32910};
        infowindow = new google.maps.InfoWindow();
        map = new google.maps.Map(document.getElementById('map'), {
            center: france,
            zoom: 3
        });


        var i ; var confirmed = 0;
        for (i = 0; i < locations.length; i++) {

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon :   locations[i][4] === '1' ?  red_icon  : purple_icon,
                html: document.getElementById('form')
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    confirmed =  locations[i][4] === '1' ?  'checked'  :  0;
                    $("#confirmed").prop(confirmed,locations[i][4]);
                    $("#location_id").val(locations[i][0]);
                    $("#description").val(locations[i][3]);
                    $("#question").val(locations[i][5]);
                    $("#about").val(locations[i][6]);
                    $("#form").show();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }

    function saveDataLocation() {
        var confirmed = document.getElementById('confirmed').checked ? 1 : 0;
        var location_id = document.getElementById('location_id').value;
        var description = document.getElementById('description').value;
        var question = document.getElementById('question').value;
        var about = document.getElementById('about').value;
        var url = 'classes/locations_model.php?confirm_location&location_id=' + location_id + '&confirmed=' + confirmed + '&description=' +description+ '&question=' + question  + '&about=' +about  ;
        downloadUrl(url, function(data, responseCode) {
            if (responseCode === 200  && data.length > 1) {
                infowindow.close();
                window.location.reload(true);
            }else{
                infowindow.setContent("<div style='color: purple; font-size: 25px;'>Inserting Errors</div>");
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

<div style="display: none" id="form">
    <table class="map1">
        <tr>
            
            <td><a>Description:</a></td>
            <td><textarea   name='description' id='description' placeholder='Description'></textarea></td>
        </tr>
        <tr>
            <td><a>question:</a></td>
            <td><textarea name='question' id='question' placeholder='Question'></textarea></td>
        </tr>
            <td><a>about:</a></td>
            <td><textarea name='about' id='about' placeholder='About'></textarea></td>
        </tr>
        <tr>
            <td><b>location id:</b></td>
            <td><input name="location_id"  id='location_id'/></td>
        </tr>
        <tr>
            <td><b>Confirm Location ?:</b></td>
            <td><input id='confirmed' type='checkbox' name='confirmed'></td>
        </tr>
        <tr><td></td><td><input type='button' value='Save' onclick='saveDataLocation()'/></td></tr>
    </table>
</div>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyCRLmpZiLZ9e-p6wRbwGWH6_1AS5M31vSI&callback=initMap">
</script>