<?php
session_start();

    include("classes/connect.php");
    include("classes/signin.php");
    include("classes/user.php");

    $signin = new Signin();
    $user_data = $signin->check_signin($_SESSION['doorban_userid']);

    //get questions 
    //   $con=mysqli_connect ("localhost", 'root', '','doorban');
  
      //set questions number
      $location_id = $_SESSION['location_id'] ;
    //*** get q 
    $query = "SELECT * FROM `locations` WHERE 'location_id' =  $location_id ";
    

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
      
          <!--top bar-->
        <div>
            <?php include("header.php");?>

        </div>
 
        
        <main>
            <div class="container">
                <h2>City name :</h2> <?php //echo $city?>
                <p>  discription </p>
                <ul>
                    <li> <strong>Number of Questions:</strong></li>
                    <li> <strong>Type:</strong>Multiple choice</li>
                    <li> <strong>Estimated Time:</strong> Minutes</li>
                </ul>
                <a href="question.php?n=<?php echo 'id';?> " class="start">Start</a>
            </div>
        </main>





<?php
include_once 'footer.php';

?>