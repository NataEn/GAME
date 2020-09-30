<?php

include("classes/connect.php");
include("classes/signin.php");
include("classes/user.php");



$signin = new Signin();
$user_data = $signin->check_signin($_SESSION['doorban_userid']);



function get_confirmed_locations(){

    $con=mysqli_connect ("localhost", 'root', '','doorban');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $userid = $_SESSION['doorban_userid'];
    
    // update location with location_status if admin location_status.
    $query = mysqli_query($con,"SELECT * FROM `locations` WHERE userid=$userid");
    $rows = array();

    while($r = mysqli_fetch_assoc($query)) {        
        $rows[] = $r;

    }
    
    $indexed = array_map('array_values', $rows);
    //  $array = array_filter($indexed);
 

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }

    }


