<?php
session_start();

include('classes/final.php');
   
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
 
        
        <main style=" background-color: #d1dffa;">
            <div class="container">
                <div class="current" style="width:90%;text-align:left;background-color:#e69900;border-radius:4px;
                    box-shadow: 1px 1px 2px;">
                <h2> You Are Great !</h2>
                    <p>Congrats! For completing this point!
                        <br>
                     You Won 25<?php //echo $user_data['score'];?> Points
                     <br>
                     <br>
                     
                    <a href="user-map.php" class="start" style="background-color:#bbd0f6;font-size:20px;
                        width: 109px;text-align: center;padding: 4px;border-radius: 4px;float: right;border-color:#a4c0f4;
                            box-shadow: 1px 1px 2px;text-decoration:none;color:black;"> Map</a>
                      
                </p>    
            </div>
            </div>
            <br>
            <br>
        </main>




<?php
include_once 'footer.php';

?>