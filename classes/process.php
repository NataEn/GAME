<?php

//check if score is set error hendler 
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0 ;
}

   

//check if submit
//if($_POST){
   // $location_id = $_SESSION['location_id'];
   // $selected_choise = $_POST['choises'];
//}


 // get total questions
//$query = "SELECT * FROM `locations` where location_id = $id";
//get results
//$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
//$total = $results->num_rows;


//get correct choice
$query = "SELECT * FROM `choises` WHERE location_id = $location_id And is_corect = 1 ";

//get result
$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

//get row
$row = $result->fetch_assoc();

//set correct choice
$corect_choise = $row['id'];

//compare
if($corect_choise == $selected_choise){
    //answer is correct
    $_SESSION['score']++;
}

