<?php
print_r($_SESSION);

include("classes/connect.php");
include("classes/signin.php");
include("classes/user.php");



//check if signed in
$signin = new Signin();
$user_data = $signin->check_signin($_SESSION['doorban_userid']);



//check if location_id is set error hendler 



// create connection credentials

$db_host = 'localhost';
$db_name = 'doorban';
$db_user = 'root';
$db_pass = '';

//create mysqli object
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

//error handler

if($mysqli->connect_error){
printf("connect failed : %s\n", $mysqli->connect_error);
exit();
}


//set question number
$number = (int)$_SESSION['location_id'];

//get question
$query = "SELECT question FROM `locations` where location_id = $number";


//get result
$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

$question = $result->fetch_assoc();

 //get choice
 $query = "SELECT * FROM `choises` where location_id = $number";


 //get results
 $choises = $mysqli->query($query) or die ($mysqli->error.__LINE__);

 // get total questions
$query = "SELECT * FROM `locations`";
//get results
$results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
$total = $results->num_rows;

    