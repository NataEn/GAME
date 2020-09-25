<?php
session_start();

//print_r($_SESSION);

include("classes/connect.php");
include("classes/signin.php");
include("classes/user.php");
include('classes/q-db.php');

//print_r($_SESSION);

//check if signed in
$signin = new Signin();
$user_data = $signin->check_signin($_SESSION['doorban_userid']);


//set question number
$number = $_GET['location_id'];

//get question
$query = "SELECT question FROM `locations` where location_id = $number";


//get result
$result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

$question = $result->fetch_assoc();

//check if location has question
if ($question > ""){

    //acsses about
    $query = "SELECT about FROM `locations` where location_id = $number";
    
    //get about
    $resultd = $mysqli->query($query) or die ($mysqli->error.__LINE__);
    //show about
    $about = $resultd->fetch_assoc();
        //get url
        $query = "SELECT url FROM `locations` where location_id = $number";
    
        //get result
        $resultd = $mysqli->query($query) or die ($mysqli->error.__LINE__);
        $url = $resultd->fetch_assoc();

                //get choice
        $query = "SELECT * FROM `choises` where location_id = $number";


        //get results
        $choises = $mysqli->query($query) or die ($mysqli->error.__LINE__);

            }




            
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
 
        
        <main style=" background-color: #d1dffa;">
            <!-- about and more info-->
            <div class="container">
                <div class="current" style="width:90%;text-align:right;background-color:#d1dffa;border-radius:4px;
                    box-shadow: 1px 1px 2px;" > <?php echo $about['about'];?><br>
                    <p>
                        <!--read more button-->
                        <a style="background-color:#bbd0f6;font-size:20px;
                        width: 109px;text-align: center;padding: 4px;border-radius: 4px;float: right;border-color:#a4c0f4;
                            box-shadow: 1px 1px 2px;text-decoration:none;color:black;"
                            href="<?php  echo $url['url'];?>">Read More</a> 
                    </p>

                </div>
                      
                    <br>
            <!--quiz-->
                <div class="quiz" style="width:90%;box-shadow: 1px 1px 2px;font-size:20px;background:#e69900;
                    border-radius:4px;padding: 10px;margin: 20px 0 10px 0;">
                    <p class="question" style="text-align:center;">
                        <em>
                         <?php echo $question['question'];?> </em>
                    </p> 
                    <!--choices-->
                    <form method="GET" action="classes/process.php">
                        <ul class="choises">
                            <!--loop through choices-->
                            <?php while($row = $choises->fetch_assoc()): ?>
                            <li style="padding: 4px;"><input name="choises" type="radio" value="<?php echo $row['id_c'];?>"/> <?php echo $row['text'];?></li> 
                            <?php endwhile;?>
              
                        </ul>
                        <!--submit / play button-->
                    <input type="submit" value="Play" name="play" style="background-color:#bbd0f6;font-size:20px;
                        width: 70px;text-align: center;padding: 4px;border-radius: 4px;float: right;border-color:#a4c0f4;"/>
                    <input type="hidden" value="<?php echo $number;?>" name="location_id"/>
                    </form>
                </div>
            </div>
            <br>
            <br>
        </main>


          


<?php
include_once 'footer.php';

?>