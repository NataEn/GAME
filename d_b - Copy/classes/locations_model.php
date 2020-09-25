<?php

include("classes/connect.php");
// Gets data from URL parameters.



if(isset($_GET['add_location'])) {
    add_location();

}


if(isset($_GET['confirm_location'])) {
    confirm_location();
}


function add_location(){


    $con=mysqli_connect ("localhost", 'root', '','doorban');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }

    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $description =ucfirst($_GET['description']);
    $question =ucfirst($_GET['question']);
    $about =ucfirst($_GET['about']);
    $corect_choice = $_GET['corect_choice'];
    $userid = $_GET['userid'];

    //choicess arrey
    $choices = array();
    $choices[1] =ucfirst($_GET['choice1']);
    $choices[2] =ucfirst($_GET['choice2']);
    $choices[4] =ucfirst($_GET['choice4']);
    $choices[3] =ucfirst($_GET['choice3']);
    $choices[5] =ucfirst($_GET['choice5']);
    
   
    //not working
    //$userid = $_SESSION['doorban_userid'];
    //$userid = "SELECT FROM `members` where userid = id limit 1";
    //$userid = $_GET['userid'];
  ///

    // Inserts new row with place data.
    $query = sprintf("INSERT INTO `locations`(location_id, lat, lng, description,question,about,userid)  VALUES ('$location_id', '$lat', '$lng','$description','$question','$about','$userid')",
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng),
        mysqli_real_escape_string($con,$description));

        
    
      
    $result = mysqli_query($con,$query);
    echo"Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }



        
    //validate insert to question

    if($query){
        $last_id = mysqli_insert_id($con);
        //get choices
        foreach($choices as $choice => $value){
            //check if value existe
            if($value != ''){
                //check for right answer
                if($corect_choice == $choice){
                    //asgin 1 to correct choice
                    $is_corect = 1;
                }
                else{
                    $is_corect = 0 ; 
                }
                //choice query
                $query = "INSERT INTO `choises` (location_id,is_corect,text) VALUES ('$last_id','$is_corect','$value')";
                //run query
                $insert_row = $con->query($query) or die ($con->error.__LINE__);    
                //validate insert 
                if($insert_row){
                    continue;
                }
                else{
                    die('Error : ('.$con->errno .') '.$con->error);
                }
            }
        }
      
       // $msg = 'Question has been submited for admin confirm';
    }
}






function confirm_location(){
    $con=mysqli_connect ("localhost", 'root', '','doorban');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $location_id =$_GET['location_id'];
    $confirmed =$_GET['confirmed'];
    $question =$_GET['question'];
    $description =$_GET['description'];
    $about = $_GET['about'];

    // update location with confirm if admin confirm.
    $query = "UPDATE `locations` SET location_status = $confirmed WHERE location_id = $location_id  ";
    $result = mysqli_query($con,$query); 

    //not working!!!
    //$query = "INSERT INTO `locations` (description,question,about) VALUES ('$description','$question','$about') WHERE location_id = $location_id ";
    //$result = mysqli_query($con,$query); 
    /////////////////////////////////


    echo "Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }

}

function get_confirmed_locations(){
    $con=mysqli_connect ("localhost", 'root', '','doorban');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"SELECT location_id ,lat,lng,description,location_status,question,about AS isconfirmed FROM `locations` WHERE  location_status = 1 ");

    $rows = array();

    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }

    $indexed = array_map('array_values', $rows);
    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
function get_all_locations(){
    $con=mysqli_connect ("localhost", 'root', '','doorban');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"SELECT location_id ,lat,lng,description,location_status,question,about AS isconfirmed FROM `locations`");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
  $indexed = array_map('array_values', $rows);
  //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
function array_flatten($array) {
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        }
        else {
            $result[$key] = $value;
        }
    }
    return $result;
}



?>






