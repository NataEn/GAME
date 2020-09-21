<?php

include('q-db.php'); 


//check if score is set error hendler 
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0 ;
}

   

//check if submit
if($_POST){
  
    $selected_choise = $_GET['choises'];   
}


$location_id = $_GET['location_id']; 
//get correct choice
$query = "SELECT * FROM `choises` WHERE location_id = '$location_id' And is_corect = 1 ";

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
    header("Location: ../final.php");
}

else{
header ("Location: ../question.php"."Try again");
}

