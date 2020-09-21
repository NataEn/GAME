<?php
session_start();
print_r($_SESSION);

include("classes/connect.php");
include("classes/signin.php");
include("classes/user.php");
include('classes/q-db.php');


//check if signed in
$signin = new Signin();
$user_data = $signin->check_signin($_SESSION['doorban_userid']);


//location_id 
//$location_id = $_POST['location_id'];


//set question number
$number = $_GET['location_id'];

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


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8"/>
        <meta name="viewport" content="initial-scale=1.0">
        <title> </title>
        <link rel="stylesheet" href="css/qindex.css" type="text/css"/>
    </head>
    <body>
      
  
        <div>
            <?php include("header.php");?>

        </div>
 
        
        <main>
            <div class="container">
            <div class="current"> Question <?php echo $_GET['location_id'];?> </div>
            <p class="question">
                <?php echo $question['question'];?>
            </p>
            <form method="POST" action="classes/process.php">
                <ul class="choises">
                <?php while($row = $choises->fetch_assoc()): ?>
                    <li><input name="choises" type="radio" value="<?php echo $row['id'];?>"/><?php echo $row['text'];?></li> 
                <?php endwhile;?>
              
                </ul>
                <input type="submit" value="Submit"/>
                <input type="hidden" name="number" value="<?php echo $results; ?>"/>
            </form>
            </div>
        </main>


          


<?php
include_once 'footer.php';

?>