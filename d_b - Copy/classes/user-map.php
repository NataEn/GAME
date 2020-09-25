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
    // update location with location_status if admin location_status.
    $query = mysqli_query($con,"SELECT location_id ,lat,lng,description,location_status,question AS isconfirmed FROM `locations` WHERE  location_status = 1 ");

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



/*
if(isset($_GET['location_id'])) {
    add_location();

}*/

   // $_SESSION['location_id']=$_POST['location_id'];

