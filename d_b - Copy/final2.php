<?php
session_start();

include('classes/final2.php');
   
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
      
          <!--top bar-->
        <div>
            <?php include("header.php");?>

        </div>
 
        <div>
        <main style=" background-color: #d1dffa;display:inline-block;clear:both;width:90%;">
            <div class="container">
                <div class="current" style="width:90%;text-align:left;background-color:#e69900;border-radius:4px;
                    box-shadow: 1px 1px 2px;">
                <h2> You Are Great !</h2>
                    <p>Congrats!<br>
                     You Have Won 40 points!
                        <br>
                     
                     <br>
                     <br>
                     
                  
                     <form method="GET" action="user-map.php" style="margin-top: -14px;">        
                                    <!--submit / CHALLENGE button-->
                    <input type="submit" value="Map" name="play" style="background-color:cornflowerblue;font-size:20px;
                    height:34px;    width: 113px;text-align: center;padding: 4px;margin-top:3.5px;border-radius: 4px;float: right;border-color:#a4c0f4;"/>
                   
                    </form>



                      
                </p>    
            </div>
            </div>
            <br>
            <br>
        </main>
        </div>
<br>


<?php
include_once 'footer.php';

?>