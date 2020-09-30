<?php
session_start();
include('q-db.php'); 
include("connect.php");
include("signin.php");
include("user.php");


//print_r($_SESSION);

//check if signed in
$signin = new Signin();
$user_data = $signin->check_signin($_SESSION['doorban_userid']);



//var_dump($_GET['choises']);


$location_id = $_GET['location_id']; 
    //get userid
$userid = $user_data['userid'];   
$play = $_GET['play'];
//check if submit
if ($play > ""){
  
$selected_choise = $_GET['choises'];   


//get correct choice
$query = "SELECT * FROM challenge_choices WHERE location_id = $location_id and is_corect=1 ";

//get result
$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

//get row
$row = $result->fetch_assoc();

//set correct choice
$corect_choise = $row['id_c'];


//if corect answer
if($corect_choise == $selected_choise){

        $corect = 1;
        $query = "INSERT INTO user_corect_question (location_id,userid,corect) VALUES ('$location_id','$userid','$corect')";
        // save to db
        $DB = new Database();
        $DB->save($query);

      
                  //get user score
          $query="SELECT score FROM `members` WHERE userid = $userid";
          //get result
          $result = $mysqli->query($query) or die ($mysqli->error.__LINE__);
          $row = mysqli_fetch_array($result);
          //echo $row['score'];

          //points for corect answer
          $score = 40;
          //user score+ new points
          $_SESSION['score'] = $score + $row['score'];
          //save new score
          $new_score= $_SESSION['score'];
          $query = "UPDATE `members` SET score='$new_score' WHERE userid=$userid ";
          //get result
          $result = $mysqli->query($query) or die ($mysqli->error.__LINE__);
         
          //redirect to score
          header("Location: ../final2.php") ;

               
    }
else{
    header ("Location: ../tryagain.php");
    echo $_GET['location_id'];
}

}

else{
    header ("Location: ../tryagain.php");
    echo $_GET['location_id'];
}
