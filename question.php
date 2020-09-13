<?php

session_start();

include('classes/question.php');

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
            <div class="current"> Question <?php echo $_SESSION['location_id'];?> of <?php echo $total;?></div>
            <p class="question">
                <?php echo $question['question'];?>
            </p>
            <form method="post" action="final.php">
                <ul class="choises">
                <?php while($row = $choises->fetch_assoc()): ?>
                    <li><input name="choises" type="radio" value="<?php echo $row['id'];?>"/><?php echo $row['text'];?></li> 
                <?php endwhile;?>
              
                </ul>
                <input type="submit" value="Submit"/>
                <input type="hidden" name="number" value="<?php echo $number; ?>"/>
            </form>
            </div>
        </main>


          


<?php
include_once 'footer.php';

?>