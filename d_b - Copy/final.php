<?php
session_start();

include('classes/final.php');

//print_r($_SESSION);
$location_id = $_SESSION['location_id']; 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8"/>
        <meta name="viewport" content="initial-scale=1.0">
        <title>YEY | DoorBan </title>
        <link rel="stylesheet" href="css/qindex.css" type="text/css"/>
        <link rel="stylesheet" href="css/final.css" type="text/css"/>
        <style>
   

        </style>
    </head>
    <body style=" background-color: #d1dffa;padding:0px;">
      
          <!--top bar-->
        <div>
            <?php include("header.php");?>

        </div>
 
        <div>
        <main style=" background-color: #d1dffa;">
            <div class="container" style="width:90%;">
                <div class="current" style="width:90%;text-align:left;background-color:#e69900;border-radius:4px;
                    box-shadow: 1px 1px 2px;">
                <h2> You Are Great !</h2>
                    <p>Congrats! For completing this point!
                      <br>
                      You Won 25<?php //echo $user_data['score'];?> Points
                      <br>
                      <br>
                      
                      <a href="user-map.php" class="start" style="background-color:#bbd0f6;font-size:20px;
                          width: 80px;text-align: center;margin:4px;padding: 4px;border-radius: 4px;float: right;border-color:#a4c0f4;
                              box-shadow: 1px 1px 2px;text-decoration:none;color:black;"> Map </a> 
                    
                      <form method="GET" action="challenge.php" style="margin-top: -14px;">        
                                      <!--submit / CHALLENGE button-->
                      <input type="submit" value="Challenge" name="play" style="background-color:cornflowerblue;font-size:20px;
                      height:34px;    width: 113px;text-align: center;padding: 4px;margin-top:3.5px;border-radius: 4px;float: right;border-color:#a4c0f4;"/>
                      <input type="hidden" value="<?php echo $location_id;?>" name="location_id"/>
                      </form>



                      </p>  
                     
            </div>

                      <br>
                      <br>
                    
                <!-- The four columns image slider-->
                <div class="slid">
                      <div class="column">
                        <img src="image/IMG_20180119_140806_HDR.jpg" alt="Alps" style="width:100%" onclick="myFunction(this);">
                      </div>
                      <div class="column">
                        <img src="image/IMG_20180120_104809_HDR.JPG" alt="Alps" style="width:100%" onclick="myFunction(this);">
                      </div>
                      <div class="column">
                        <img src="image/20180904_092335.JPG" alt="Beach" style="width:100%" onclick="myFunction(this);">
                      </div>
                     
                  </div>
                  
                  <div class="containern">
                      <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                      <img id="expandedImg" style="width:100%">
                      <div id="imgtext"></div>
                  </div>




            </div>
            </main>

            

           
            <br>
            <br>
            <br>
            <br>
        
        
</div>




<?php
include_once 'footer.php';

?>



<script>


  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }

  //slider
  function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
  }
  </script>