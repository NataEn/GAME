<?php

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




