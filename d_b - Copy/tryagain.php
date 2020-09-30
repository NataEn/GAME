<?php
session_start();

include('classes/tryagain.php');


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8"/>
        <meta name="viewport" content="initial-scale=1.0">
        <title>Try Again | DoorBan </title>
        <link rel="stylesheet" href="css/qindex.css" type="text/css"/>
    </head>
    <body>
      
          <!--top bar-->
        <div>
            <?php include("header.php");?>

        </div>
 
        
        <main style=" background-color: #d1dffa;">
            <div class="container" style="width:90%;">
                <div class="current" style="width:90%;text-align:left;background-color:#e69900;border-radius:4px;
                    box-shadow: 1px 1px 2px;">
                <h2> Try Again !</h2>
                    <p>
                     <br>
                     <br>
                     
                    <a href="user-map.php" class="start" style="background-color:#bbd0f6;font-size:20px;
                        width: 80px;text-align: center;margin:4px;padding: 4px;border-radius: 4px;float: right;border-color:#a4c0f4;
                            box-shadow: 1px 1px 2px;text-decoration:none;color:black;"> Map </a> 
                    
                           
                                    <!--back / Try again button -->
                                    <!-- only pro for member-->
                                    <!--
                    <input type="submit" onclick="goBack()" value="Try again" name="play" style="background-color:cornflowerblue;font-size:20px;
                    height:34px;    width: 113px;text-align: center;padding: 4px;margin-top:3.5px;border-radius: 4px;float: right;border-color:#a4c0f4;"/>
                    <input type="hidden" value="<?php echo $location_id;?>" name="location_id"/>
                                    -->



                </p>    
            </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
          
        </main>



        <script>function goBack() {window.history.back();}</script>

<?php
include_once 'footer.php';

?>