<?php
session_start();


include("classes/connect.php");
include("classes/signin.php");
include("classes/user.php");
include('classes/q-db.php');


//print_r($_SESSION);


//check if signed in
$signin = new Signin();
$user_data = $signin->check_signin($_SESSION['doorban_userid']);

if(isset($_GET)){
    unset($_SESSION["location_id"]);
}

$pro_score = 100000;
$score = $_SESSION['score'];
$remain_score =  $pro_score-$score;

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8"/>
        <meta name="viewport" content="initial-scale=1.0">
        <title> </title>
        <link rel="stylesheet" href="css/qindex.css" type="text/css"/>
    </head>
    <body style=" background-color: #d1dffa;padding:0px;">
      
  <div>
        <div>
            <?php include("header.php");?>

        </div>
 
        <main style=" background-color: #d1dffa;">
            <div class="container" style="width:90%;">
                <div class="current" style="width:90%;text-align:left;background-color:#e69900;border-radius:4px;
                    box-shadow: 1px 1px 2px;">
                <h2> This feature is available for pro players</h2>
                  
                 Remaining points to achive the pro badge
                     <br>
                    
                     <h1 style="color: white;text-align:center;text-shadow:cornflowerblue 1px 1px 2px;"><?php echo "$remain_score"; ?></h1>
                     <br>
                     Come back in the future
                    
                  <br>
                  <br>
                     <form method="GET" action="user-map.php" style="margin-top: -14px;">        
                                    <!--submit / CHALLENGE button-->
                    <input type="submit" value="Map" name="play" style="background-color:cornflowerblue;font-size:20px;
                    height:34px;    width: 113px;text-align: center;padding: 4px;margin-top:3.5px;border-radius: 4px;float: right;border-color:#a4c0f4;"/>
                   
                    </form>
                             
            </div>
            </div>
            <br>
            <br>
        </main>

  </div>
          


<?php
include_once 'footer.php';

?>



<!--    <a href="user-map.php" class="start" style="background-color:#bbd0f6;font-size:20px;
                        width: 80px;text-align: center;margin:4px;padding: 4px;border-radius: 4px;float: right;border-color:#a4c0f4;
                            box-shadow: 1px 1px 2px;text-decoration:none;color:black;"> Map </a> 

-->