<?php

require("mapdb.php");
include("qadd.php");
include("locations_model.php");


    // Gets data from URL parameters.

if(isset($_GET['add_location'])) {
  add_location();
}

function add_location(){


    $con=mysqli_connect ("localhost", 'root', '','doorban');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }

    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $description =$_GET['description'];
  
 
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO `locations`(id, lat, lng, description)  VALUES ('$id', '$lat', '$lng','$description');",
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng),
        mysqli_real_escape_string($con,$description));
      
      
    $result = mysqli_query($con,$query);
    echo"Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}

 

//problem with intert on same row 
//need to fix this

 //get userid 
 $userid = $_SESSION['doorban_userid'];

  // get total questions
  $query = "SELECT * FROM `questions`";
  //get results
  $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
  $total = $results->num_rows;
  $question_number = $total+1;
 
 
   
  //insert userid
 $sql = "INSERT INTO `locations` (userid,question_number) VALUE ('$userid','$question_number')";
 
 if ($con->query($sql) === TRUE) {
   echo "New record created successfully";
 } else {
   echo "Error: " . $sql . "<br>" . $con->error;
 }

